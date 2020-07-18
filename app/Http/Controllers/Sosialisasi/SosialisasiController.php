<?php

namespace App\Http\Controllers\Sosialisasi;

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


class SosialisasiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        $this->wpModel     = new WpModel();
        $this->UserModel     = new User();
    }
    
    public function index(Request $request)
    {
        return view('sosialisasi/index');     
    }

    public function add(Request $request)
    {
        return view('sosialisasi/add');
    }

    public function list_index(Request $request)
    {
        $sql = "SELECT
                    mu.UNIT_NAME AS nama_unit,
                    ps.judul,
                    ps.tanggal,
                    ps.lokasi,
                    ps.pic_sosialisasi,
                    ps.jam_mulai,
                    ps.jam_selesai,
                    ps.id 
                FROM
                    peta_sosialisasi ps
                    LEFT JOIN master_unit mu ON ps.unit = mu.BUSS_AREA 
                WHERE
                    YEAR ( ps.tanggal ) = '2020'";
        $v = DB::select($sql);
            
        return Datatables::of($v)
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="la la-pencil-square"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="la la-trash-o"></i> </button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function test(Request $request)
    {   
        
        $unit = Session::get('sel_unit');
        $year = date('y');
        $new_id = $this->wpModel->generateWpId($unit . $year);
        
        return response()->json([$new_id]);
    }
    
    public function sosialisasi_store(Request $request)
    {
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

        $store = DB::table('peta_sosialisasi')->insert([
            'unit'          => Auth::user()->unit,
            'lokasi'        => $request->lokasi,
            'judul'         => $request->judul,
            'deskripsi'     => $request->deskripsi,
            'jml_peserta'   => $request->jml_peserta,
            'pic_sosialisasi'   => $request->pic_sosialisasi,
            'tanggal'       => $request->tanggal,
            'jam_mulai'     => $request->jam_mulai,
            'jam_selesai'   => $request->jam_selesai,
            'latitude'      => $request->latitude,
            'longitude'     => $request->longitude,
            'user_input'    => Auth::user()->username,
            'tgl_input'     => date('Y-m-d'),
        ]);

        return response()->json(['success' => 'Data Added successfully.']);
        }
   
}