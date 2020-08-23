<?php

namespace App\Http\ViewComposers;

use App\Models\Config\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MenuComposer
{
    /**
     * Logged-in user.
     * 
     * @var object
     */
	protected $user;

    /**
     * List menu that user can access.
     * 
     * @var array
     */
    protected $access;

    /**
     * List of view where sidebar is not shown.
     * 
     * @var array
     */
    protected $exclude = [
        './login',
        'auth.login',
        'auth.logout',
        'auth.register',
        'auth.verify',
        'auth.passwords.email',
        'auth.passwords.reset',
        'errors::404',
        'errors::419',
        'errors::illustrated-layout'
    ];

	/**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = Auth::user();
        $this->Config  = new Config();
    }
    
    public function compose(View $view)
    {
        if(!in_array($view->getName(), $this->exclude)) {
            $auth = $this->user['group_id'];
            $data = [
                'menu'      => $this->Config->getMenu($auth),
            ];
        
            $view->with("navigator", $this->render($data));
            //$view->with("navigator", $auth);
        }

    }

    private function rendxer($model)
    {
        $html = '';
        foreach($model as $menu) if($this->authorize($menu['permission'])){
            $html .= $this->createList($menu, 1, $menu["child"]);

            if ($menu["child"] != null) {
                $html .= "<ul class='treeview-menu'>";

                foreach($menu["child"] as $sub) if($this->authorize($sub['permission'])){
                    $html .= $this->createList($sub, 2, $sub["child"]);

                    if($sub["child"] != null) {
                        $html .= "<ul class='treeview-menu'>";

                        foreach($sub["child"] as $subChild) if($this->authorize($subChild['permission'])){
                            $html .= $this->createList($subChild, 3, null);
                        }
                        $html .= "</ul>";
                    }
                    $html .= "</li>";
                }
                $html .= "</ul>";
            }
            $html .= "</li>";
        }

        return $html;
    }
    
    private function render($data)
    {
        $auth = $this->user['group_id'];
        $menu = $this->Config->getMenu($auth);
        $menu_l2 = $this->Config->getMenu_l2($auth);
        
        $html = '';
        foreach($menu as $menu1) {
        
        if($menu1->has_child == 'Y'){
            $html .= "<li class=' nav-item'><a href='#'><i class=' $menu1->icon '></i><span class='menu-title' data-i18n='nav.chartist.main'> $menu1->menu_name </span></a>
                      <ul class='menu-content'>";
                    foreach($menu_l2 as $menu2) {
                        if ($menu2->parent_id == $menu1->id){
                            $html .= "<li><a class='menu-item' href=' $menu2->uri ' data-i18n='nav.chartist.chartist_line_charts'> $menu2->menu_name </a></li>";

                        }
                    }
            $html .= "</ul>";
            $html .= "</li>";
    
        } else {
            $html .= "<li class=' nav-item'><a href=' $menu1->uri '><i class=' $menu1->icon '></i><span class='menu-title' data-i18n='nav.changelog.main'> $menu1->menu_name </span></a></li>";

        }
        }

        return $html;
    }
}