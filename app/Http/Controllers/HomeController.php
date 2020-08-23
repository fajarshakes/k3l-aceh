<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config\Config;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth = Auth::user()->group_id;
        $data = [
            'menu'      => ($this->Config->getMenu($auth))->toArray(),
         ];
        
        return view('index', $data);     
    }
}
