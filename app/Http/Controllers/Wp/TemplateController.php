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

    public function detail(Request $request)
    {
        $unitData  = $this->wpModel->getUnitType();
        $unitList  = $this->wpModel->getUnit();
        return view('wp/detail',
        ['unitType' => $unitData],
        ['unitList' => $unitList],
        );
        
    }

    public function list_template(Request $request)
    {
        $comp_code = Auth::user()->comp_code;
        $sql = "SELECT
                    wpt.*
                FROM
                    working_permit_template wpt
                WHERE
                    wpt.status = 1
                    AND wpt.comp_code = '$comp_code'";
        $v = DB::select($sql);
            
        return Datatables::of($v)
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id_template.'" class="edit btn btn-primary btn-sm"><i class="la la-pencil-square"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id_template.'" class="delete btn btn-danger btn-sm"><i class="la la-trash-o"></i> </button>';
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

    public function test(Request $request)
    {   
        //$unit = Session::get('sel_unit');
        $comp_code = Auth::user()->comp_code;
        $year = date('y');
        $new_id = $this->wpModel->generateTemplateId($comp_code);
        
        return response()->json([$new_id]);
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

    public function template_store(Request $request)
    {
        $comp_code = Auth::user()->comp_code;
        $year = date('y');
        $new_id = $this->wpModel->generateTemplateId($comp_code);

        $store = DB::table('working_permit_template')->insert([
            'id_template'    => $new_id,
            'comp_code'      => $comp_code,
            'tahun'          => $year,
            'jenis_template' => $request->jenis_template,
            'nama_template'  => $request->nama_template,
            'status'         => 1,
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
            'potensi_bahaya'   => $request['potensi_bahaya_hirarc'][$i],
            'resiko'        => $request['resiko_hirarc'][$i],
            'penilaian_konsekuensi'   => $request['nilai_konsekuensi_hirarc'][$i],
            'penilaian_kemungkinan'   => $request['nilai_kemungkinan_hirarc'][$i],
            'pengendalian_resiko'       => $request['pengendalian_resiko_hirarc'][$i],
            'pengendalian_konsekuensi'  => $request['kendali_konsekuensi'][$i],
            'pengendalian_kemungkinan'  => $request['kendali_kemungkinan'][$i],
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
