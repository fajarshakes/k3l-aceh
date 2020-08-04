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

class TemplateController extends BaseController
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
            'up_name'     => $this->wpModel->getUnitName($unit),
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

    public function approve_form(Request $request)
    {
        $id_wp = $request->id_wp;
        if ($request->group_id == 5){
            $status = 'APPROVAL_2';
            $field1 = 'user_approval3';
            $field2 = 'tgl_approval3';
        } else if ($request->group_id == 6){
            $status = 'APPROVAL_1';
            $field1 = 'user_approval2';
            $field2 = 'tgl_approval2';
        } else if ($request->group_id == 4){
            $status = 'APPROVED';
            $field1 = 'user_approval3';
            $field2 = 'tgl_approval3';
        }

        if ($request->ket_approve == 'APPROVE'){

        $update = DB::table('working_permit')
        ->where('id_wp', $id_wp)
        ->update([
            'status'   => $status,
            $field1    => Auth::user()->email,
            $field2    => date('Y-m-d'),
        ]);

        } else {

        $update = DB::table('working_permit')
        ->where('id_wp', $id_wp)
        ->update([
            'status'        => 'NEW',
            'user_reject'   => Auth::user()->email,
            'tgl_reject'    => date('Y-m-d'),
        ]);

        }

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

    public function template_store(Request $request)
    {
        $unit = Session::get('sel_unit');
        $status = Session::get('sel_status');
        $year = date('y');
        $new_id = $this->wpModel->generateWpId($unit . $year);
        
        // $unitData  = $this->wpModel->getUnitType();
        // return view('wp/add-template',
        // ['unitType' => $unitData]);

        $store = DB::table('work_permit_template')->insert([
            'id_wp'         => $new_id,
            'unit'          => $unit,
            'jenis_template' => $request->jenis_template,
            'nama_template' => $request->nama_template,
        ]);

        for($i = 0; $i < count($request['peralatan']); $i++){
            $store = DB::table('peralatan_keselamatan')->insert([
            'id_wp'         => $new_id,
            'description'   => $request['peralatan'][$i],
            ]);
        }

        for($i = 0; $i < count($request['kegiatan_hirarc']); $i++){
            $store = DB::table('tbl_hirarc')->insert([
            'id_wp'         => $new_id,
            'kegiatan'      => $request['kegiatan_hirarc'][$i],
            'potensi_bahaya'   => $request['potensi_bahaya'][$i],
            'resiko'        => $request['resiko_hirarc'][$i],
            'penilaian_konsekuensi'   => $request['penilaian_konsekuensi'][$i],
            'penilaian_kemungkinan'   => $request['penilaian_kemungkinan'][$i],
            'pengendalian_resiko'       => $request['potensi_bahaya'][$i],
            'pengendalian_konsekuensi'  => $request['pengendalian_konsekuensi'][$i],
            'pengendalian_kemungkinan'  => $request['pengendalian_kemungkinan'][$i],
            'status_pengendalian'       => $request['status_pengendalian'][$i],
            'penanggung_jawab'          => $request['penanggung_jawab'][$i],
            ]);
        }
        
        for($i = 0; $i < count($request['langkah_pekerjaan']); $i++){
            $store = DB::table('tbl_jsa')->insert([
            'id_wp'         => $new_id,
            'langkah_pekerjaan'      => $request['langkah_pekerjaan'][$i],
            'potensi_bahaya'   => $request['potensi_bahaya'][$i],
            'resiko'        => $request['resiko'][$i],
            'tindakan'        => $request['tindakan'][$i],
            ]);
        }
        
        return response()->json(['success' => 'Data Added successfully.']);
    }
   
}
