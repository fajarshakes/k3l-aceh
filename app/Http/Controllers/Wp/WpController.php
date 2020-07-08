<?php

namespace App\Http\Controllers\Wp;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Master;
use App\Models\Wp\WpModel;
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
        $this->wpModel     = new WpModel();
    }
    
    public function dashboard(Request $request)
    {
        return view('wp/dashboard');
        
    
    }

    public function list(Request $request)
    {
        $unitData  = $this->wpModel->getUnitType();
        $unitList  = $this->wpModel->getUnit();
        return view('wp/list',
        ['unitType' => $unitData],
        ['unitList' => $unitList],
    );
        
    }

    public function create(Request $request)
    {

        $data = [
            'unit' => $request->session()->get('unit'),
            'type' => $request->session()->get('type'),
        ];
        return view('wp/create', $data);
        
    }

    public function submit_form(Request $request)
    {
    $type    = $request->type;
    $unit    = $request->unit;

    $request->session()->put(['type' => $type],
    ['unit' => $unit],
    );
    $session = $request->session()->all();

    return response()->json(['success' => 'Data Insert successfully.',
        'temp_id' => $session]);

    }
    

    public function template(Request $request)
    {
        return view('wp/template_index');
        
    }

    public function add_template(Request $request)
    {
        $unitData  = $this->wpModel->getUnitType();
        return view('wp/add-template',
        ['unitType' => $unitData]);
        
    }
   
}
