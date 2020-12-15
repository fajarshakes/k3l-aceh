<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config\Config;
use App\Models\Wp\WpModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->Config     = new Config();
        $this->wpModel    = new WpModel();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth = Auth::user()->group_id;
        if (Auth::user()->unit == '6101'){
            $unit = '61';
        } else {
            $unit = Auth::user()->unit;
        }
        $data = [
            'menu'      => ($this->Config->getMenu($auth))->toArray(),
            'countPermohonan'   => $this->wpModel->countPermohonan($unit),            
            'countPengerjaan'   => $this->wpModel->countPengerjaan($unit),            
            'countSelesai'      => $this->wpModel->countSelesai($unit),    
            'getList'           => $this->wpModel->getListOnWork($unit),    
         ];
        
        return view('index', $data);     
    }
}
