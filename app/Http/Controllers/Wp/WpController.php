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
use App\Models\Master\User;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class WpController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        $this->wpModel     = new WpModel();
        $this->UserModel     = new User();
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

    public function detail(Request $request)
    {
        $unitData  = $this->wpModel->getUnitType();
        $unitList  = $this->wpModel->getUnit();
        return view('wp/detail',
        ['unitType' => $unitData],
        ['unitList' => $unitList],
        );
        
    }

    public function get_detail_wp()
    {
        $id = $_GET['id'];
        $data = DB::table('working_permit')
        ->select('working_permit.*')
        ->where('working_permit.id_wp','=',$id)
        ->get();
        
        return response()->json(['data' => $data]);
    }


    public function list_permohonan(Request $request)
    {
        $sql = "SELECT
                    wp.*, mu.UNIT_NAME
                FROM
                    working_permit wp LEFT JOIN master_unit mu ON wp.unit = mu.BUSS_AREA
                WHERE
                    wp.status != 'TRASH'";
        $v = DB::select($sql);
            
        return Datatables::of($v)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id_wp.'" class="edit btn btn-primary btn-sm"><i class="la la-pencil-square"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id_wp.'" class="delete btn btn-danger btn-sm"><i class="la la-trash-o"></i> </button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function submit_form(Request $request)
    {
    $type    = $request->type;
    $unit    = $request->unit;

    Session::put('sel_unit', $unit);
    Session::put('sel_type', $type);
    return response()->json(['success' => 'Unit dipilih : '.$unit,
        'temp_id' => $type]);

    }
    
    public function create(Request $request)
    {
        $unit = Session::get('sel_unit');
        $data = [
            'getManager'  => $this->UserModel->getUser($unit, 4),
            'getSpv'      => $this->UserModel->getUser($unit, 5),
            'getPj'       => $this->UserModel->getUser($unit, 6),
        ];
        
        return view('wp/create', $data);
        
    }

    public function test(Request $request)
    {   
        
        $unit = Session::get('sel_unit');
        $year = date('y');
        $new_id = $this->wpModel->generateWpId($unit . $year);
        
        return response()->json([$new_id]);
    }
    
    public function wp_store(Request $request)
    {
        $unit = Session::get('sel_unit');
        $year = date('y');
        $new_id = $this->wpModel->generateWpId($unit . $year);
        
        /*
        $rules = array(
            'cname'         =>  'required',
            'cstatus'       =>  'required',
        );
        
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }xw
        */

        $store = DB::table('working_permit')->insert([
            'id_wp'         => $new_id,
            'unit'          => $unit,
            'status'        => 'NEW',
            'tgl_pengajuan' => date('Y-m-d'),
            'detail_pekerjaan' => $request->nama_pekerjaan ,
            'manager'       => $request->manager,
            'supervisor'    => $request->supervisor,
            'pejabat_k3l'   => $request->pejabat
        ]);

        for($i = 0; $i < count($request['agenda2']); $i++){
            $store = DB::table('peralatan_keselamatan')->insert([
            'id_wp'         => $new_id,
            'description'   => $request['agenda2'][$i],
            ]);
        }
        
        // $periode = explode(' ', $request['periode']);
        for($i = 0; $i < count($request['nama_pelaksana']); $i++){
            $store = DB::table('pelaksana_pekerjaan')->insert([
                'id_wp' => $new_id,
                'nama_pelaksana' => $request['nama_pelaksana'][$i],
                'personal_no' => $request['nip_pelaksana'][$i],
                'jabatan_pelaksana' => $request['jabatan_pelaksana'][$i],
            ]);
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function approve_form(Request $request)
    {
        $id_wp = $request->id_wp;

        $update = DB::table('working_permit')
        ->where('id_wp', $id_wp)
        ->update([
            'status'         => 'APPROVAL_3',
            'tgl_approval3'  => date('Y-m-d'),
            'user_approval3' =>  Auth::user()->email
        ]);

        return response()->json(['success' => 'Data Update successfully.']);
    }

    public function delete_form(Request $request)
    {
        $id_wp = $request->id_wp;

        $update = DB::table('working_permit')
        ->where('id_wp', $id_wp)
        ->update([
            'status'         => 'TRASH',
            'tgl_delete'  => date('Y-m-d'),
            'user_delete' =>  Auth::user()->email
        ]);

        return response()->json(['success' => 'Data Update successfully.']);
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
