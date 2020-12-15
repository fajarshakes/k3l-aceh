<?php

namespace App\Http\Controllers\Apar;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Master;
use App\Models\Apar\AparModel;
use App\Models\Master\User;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Exports\AparExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class AparviewController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        //$this->middleware('auth');
        $this->AparModel     = new AparModel();
        $this->UserModel     = new User();
    }
    
    public function index(Request $request)
    {
        return view('apar/index');     
    }

    public function view(Request $request, $id)
    {
        $data = [
            'detail'        => $this->AparModel->getDetailByID($id),
         ];
        return view('apar/view-apar', $data); 
    }


    public function view_history_apar(Request $request, $idapar)
    {
        $sql = "SELECT
                    ah.*
                FROM
                    apar_history ah JOIN peta_apar pa ON ah.ID_APAR = pa.ID_APAR
                WHERE
                    ah.ID_APAR  = '$idapar'";
        $v = DB::select($sql);
            
        return Datatables::of($v)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->ID_APAR.'" class="button1 btn btn-info btn-sm btn-icon"><i class="la la-external-link"></i> ACTION</button>';
                //$button .= '&nbsp;&nbsp;';
                //$button .= '<button type="button" name="delete" id="'.$data->ID_APAR.'" class="delete btn btn-danger btn-sm btn-icon"><i class="la la-trash-o"></i> </button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function view_detail_history()
    {
        $id = $_GET['id'];
        $data = DB::table('apar_history')
        ->select('apar_history.*')
        ->where('apar_history.ID','=',$id)
        ->get();
        
        return response()->json(['data' => $data]);
    }

}