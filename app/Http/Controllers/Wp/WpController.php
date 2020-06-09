<?php

namespace App\Http\Controllers\Wp;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Master;
use App\Models\Master\UserCategory;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;

class WpController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        $this->menuCat     = new UserCategory();
    }
    
    public function dashboard(Request $request)
    {
        return view('wp/dashboard');
        
    
    }

    public function list(Request $request)
    {
        return view('wp/list');
        
    }

    public function create(Request $request)
    {
        return view('wp/create');
        
    }
    
    public function template(Request $request)
    {
        return view('wp/template_index');
        
    }

    public function add_template(Request $request)
    {
        $unitData  = $this->menuCat->getUnitType();
        return view('wp/add-template',
        ['unitType' => $unitData]);
        
    }
   
}
