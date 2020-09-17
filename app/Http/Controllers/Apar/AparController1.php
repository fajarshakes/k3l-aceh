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


class AparController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        $this->AparModel     = new AparModel();
        $this->UserModel     = new User();
    }
    
    public function index(Request $request)
    {
        return view('apar/index');     
    }

    public function add(Request $request)
    {
        $data = [
            'my_ccode'      => Auth::user()->comp_code,
            'my_barea'      => Auth::user()->unit,
            'list_unit'     => $this->AparModel->list_gedung_byunit(Auth::user()->unit),
         ];
        return view('apar/add', $data);
    }

    public function input_har(Request $request, $id)
    {
        $data = [
            'my_ccode'      => Auth::user()->comp_code,
            'my_barea'      => Auth::user()->unit,
            'detail'        => $this->AparModel->getDetailByID($id),
         ];
        return view('apar/input-har', $data);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'my_ccode'      => Auth::user()->comp_code,
            'my_barea'      => Auth::user()->unit,
            'detail'        => $this->AparModel->getDetailByID($id),
            'list_unit'     => $this->AparModel->list_gedung_byunit(Auth::user()->unit),
         ];
        return view('apar/update', $data);
    }

    public function getLantaiByGedung(Request $request, $idgedung)
    {   
        $listLantai  = $this->AparModel->getLantai($idgedung)->pluck("NAMA_LANTAI", "ID_LANTAI");
        return json_encode($listLantai);
    }

    public function list_index_apar(Request $request)
    {
        $b_area = Auth::user()->unit;
        $sql = "SELECT
                    pa.*
                FROM
                    peta_apar pa
                WHERE
                    pa.BUSS_AREA  = '$b_area' AND
                    pa.STATUS = 'ACTIVE'";
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

    public function list_history_apar(Request $request, $idapar)
    {
        $b_area = Auth::user()->unit;
        $sql = "SELECT
                    ah.*
                FROM
                    apar_history ah JOIN peta_apar pa ON ah.ID_APAR = pa.ID_APAR
                WHERE
                    ah.BUSS_AREA = '$b_area' AND
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


    public function test(Request $request)
    {   
        //$unit = Session::get('sel_unit');
        //$unit = Auth::user()->unit;
        $mix_code = 'APR' . Auth::user()->unit;
        $unit = 'APR6101';
        $year = date('y');
        
        $new_id = $this->AparModel->generateIdApar($mix_code);
        //$new_id = $this->AparModel->generateIdLantai($unit);
        
        return response()->json([$new_id]);
    }
    
    public function add_store(Request $request)
    {
        /*
        $rules = array(
            'lokasi'        =>  'required',
            'judul'         =>  'required',
            'deskripsi'     =>  'required',
            'jml_peserta'   =>  'required',
            'pic_sosialisasi'   =>  'required',
            'tanggal'       =>  'required',
            'jam_mulai'     =>  'required',
            'jam_selesai'   =>  'required',
            'latitude'      =>  'required',
            'longitude'     =>  'required',
        );
        
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        */
        $mix_code = 'APR' . Auth::user()->unit;
        $new_id = $this->AparModel->generateIdApar($mix_code);
        $store = DB::table('peta_apar')->insert([
            'ID_APAR'       => $new_id,
            'COMP_CODE'     => Auth::user()->comp_code,
            'BUSS_AREA'     => Auth::user()->unit,
            'ID_GEDUNG'     => $request->idgedung,
            'ID_LANTAI'     => $request->idlantai,
            'LOKASI_APAR'   => $request->lokasi,
            'NO_URUT'       => $request->no_urut,
            'MERK'          => $request->merk,
            'TYPE'          => $request->type,
            'KAPASITAS'     => $request->kapasitas,
            'MEDIA'         => $request->media,
            'TGL_EXPIRED'   => $request->exp_date,
            'TGL_REFILL'    => $request->refill_date,
            'JADWAL_HAR'    => $request->har_date,
            'TGL_INPUT'     => date('Y-m-d'),
            'USER_INPUT'    => Auth::user()->username,
        ]);

        return view('apar/index');
        //return response()->json(['success' => 'Data Added successfully.']);
    }
    
    public function update_apar(Request $request)
    {
        /*
        $rules = array(
            'lokasi'        =>  'required',
            'judul'         =>  'required',
            'deskripsi'     =>  'required',
            'jml_peserta'   =>  'required',
            'pic_sosialisasi'   =>  'required',
            'tanggal'       =>  'required',
            'jam_mulai'     =>  'required',
            'jam_selesai'   =>  'required',
            'latitude'      =>  'required',
            'longitude'     =>  'required',
        );
        
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        */

        $store = DB::table('peta_apar')
        ->where('ID_APAR', $request->id_apar)
        ->update([
            'ID_GEDUNG'     => $request->idgedung,
            'ID_LANTAI'     => $request->idlantai,
            'LOKASI_APAR'   => $request->lokasi,
            'NO_URUT'       => $request->no_urut,
            'MERK'          => $request->merk,
            'TYPE'          => $request->type,
            'KAPASITAS'     => $request->kapasitas,
            'MEDIA'         => $request->media,
            'TGL_EXPIRED'   => $request->exp_date,
            'TGL_REFILL'    => $request->refill_date,
            'JADWAL_HAR'    => $request->har_date,
        ]);

        return view('apar/index');
        //return response()->json(['success' => 'Data Added successfully.']);
    }

    public function add_history(Request $request)
    {
        
        $store = DB::table('apar_history')->insert([
            'ID_APAR'       => $request->IDAPAR,
            'BUSS_AREA'     => Auth::user()->unit,
            'CHECK_DEADLINE'=> $request->JADWAL_HAR,
            'CHECK_AT'      => date('Y-m-d'),
            'CHECK_BY'      => $request->CHECK_BY,
            'URAIAN_1'      => $request->URAIAN_1,
            'URAIAN_2'      => $request->URAIAN_2,
            'URAIAN_3'      => $request->URAIAN_3,
            'URAIAN_4'      => $request->URAIAN_4,
            'URAIAN_5'      => $request->URAIAN_5,
            'URAIAN_6'      => $request->URAIAN_6,
            'URAIAN_7'      => $request->URAIAN_7,
            'URAIAN_8'      => $request->URAIAN_8,
            'STATUS_ALL'    => $request->STATUS_ALL,
            'NOTE'          => $request->NOTE
        ]);

        $update = DB::table('peta_apar')
        ->where('ID_APAR', $request->IDAPAR)
        ->update([
            'JADWAL_HAR'   => $request->HAR_DATE,
        ]);

        //return view('apar/index');
        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function master(Request $request)
    {
        $data = [
            'my_ccode'      => Auth::user()->comp_code,
            'my_barea'      => Auth::user()->unit,
            'list_unit'     => $this->AparModel->list_gedung_byunit(Auth::user()->unit),
         ];
        return view('apar/master', $data);     
    }

    public function list_master_gedung(Request $request)
    {
        $sql = "SELECT
                    mg.*, mu.UNIT_NAME
                FROM
                    master_gedung mg LEFT JOIN master_unit mu ON mg.BUSS_AREA = mu.BUSS_AREA
                WHERE
                    mg.STATUS = 1";
        $v = DB::select($sql);
            
        return Datatables::of($v)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->ID_GEDUNG.'" class="edit btn btn-primary btn-sm"><i class="la la-pencil-square"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->ID_GEDUNG.'" class="delete btn btn-danger btn-sm"><i class="la la-trash-o"></i> </button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function list_master_lantai(Request $request)
    {
        $sql = "SELECT
                    mgd.*, mg.NAMA_GEDUNG, mu.UNIT_NAME
                FROM
                    master_gedung_detail mgd
                    LEFT JOIN master_gedung mg ON mg.ID_GEDUNG = mgd.ID_GEDUNG
                    LEFT JOIN master_unit mu ON mg.BUSS_AREA = mu.BUSS_AREA
                WHERE
                    mg.STATUS = 1";
        $v = DB::select($sql);
            
        return Datatables::of($v)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->ID_LANTAI.'" class="edit btn btn-primary btn-sm"><i class="la la-pencil-square"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->ID_LANTAI.'" class="delete btn btn-danger btn-sm"><i class="la la-trash-o"></i> </button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
    public function apar_add_gedung(Request $request)
    {
        $unit = Auth::user()->unit;
        $new_id = $this->AparModel->generateIdGedung($unit);
        
        $rules = array(
            'namagedung'        =>  'required',
        );
        
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        $store = DB::table('master_gedung')->insert([
            'ID_GEDUNG'     =>  $new_id,
            'COMP_CODE'     => Auth::user()->comp_code,
            'BUSS_AREA'     => Auth::user()->unit,
            'NAMA_GEDUNG'   => $request->namagedung,
            'STATUS'        => '1',
            'CREATED_AT'    => date('Y-m-d'),
            'CREATED_BY'    => Auth::user()->username,
        ]);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function apar_add_lantai(Request $request)
    {
        $id_gedung = $request->idgedung;
        $new_id    = $this->AparModel->generateIdLantai($id_gedung);
        
        $rules = array(
            'namalantai'        =>  'required',
            'idgedung'        =>  'required',
        );
        
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        $store = DB::table('master_gedung_detail')->insert([
            'ID_LANTAI'     =>  $new_id,
            'ID_GEDUNG'     =>  $id_gedung,
            'COMP_CODE'     => Auth::user()->comp_code,
            'BUSS_AREA'     => Auth::user()->unit,
            'NAMA_LANTAI'   => $request->namalantai,
            'STATUS'        => '1',
            'CREATED_AT'    => date('Y-m-d'),
            'CREATED_BY'    => Auth::user()->username,
        ]);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function get_detail_history()
    {
        $id = $_GET['id'];
        $data = DB::table('apar_history')
        ->select('apar_history.*')
        ->where('apar_history.ID','=',$id)
        ->get();
        
        return response()->json(['data' => $data]);
    }

    public function delete_apar(Request $request)
    {
        $id = $request->ID;
        $delete = DB::table('peta_apar')
        ->where('ID_APAR', $id)
        ->update([
            'STATUS'     =>  'TRASH',
            ]);

        return view('apar/index');
        //return response()->json(['success' => 'Data Update successfully.']);
    }
    
    public function delete_history(Request $request)
    {
        $id = $request->ID;
        $delete = DB::table('apar_history')->where('ID', $id)->delete();

        return response()->json(['success' => 'Data Update successfully.']);
    }

    public function export(Request $request)
    {
        return Excel::download(new AparExport, 'apar.xlsx');
    }

}