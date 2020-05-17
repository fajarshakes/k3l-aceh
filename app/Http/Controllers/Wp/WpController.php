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
    }
    
    public function dashboard(Request $request)
    {
        return view('wp/dashboard');
        
    
    }
   
}
