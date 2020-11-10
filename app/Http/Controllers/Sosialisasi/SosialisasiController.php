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
use App\Exports\SosialisasiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


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
        $data = [
            'markers'         => collect($this->wpModel->getMarkers())->toArray(),
            'list'            => $this->wpModel->getUnit(),
            // 'tahun'           => $this->wpModel->getTahunSosialisasi(),
         ];
         
         return view('sosialisasi/index', $data);     
    }

    public function add(Request $request)
    {
        return view('sosialisasi/add');
    }

    public function list_index(Request $request)
    {
        $year = date('Y');

        $b_area = Auth::user()->unit;

        // if (Auth::user()->unit == '6101'){
        //     $add_conditions = '';
        // } else {
        //     $getunit = $_GET['unit'];
        //     $gettahun = $_GET['tahun'];
        //     $add_conditions = 'AND ps.unit = ' . Auth::user()->unit;
        // }

        if (!isset($_GET['unit'])){
            $unit = Auth::user()->unit;
        } else {
            $getunit = $_GET['unit'];
            $gettahun = $_GET['tahun'];
            
            if ($getunit == 6100){
                $unit = '61';
                $add_conditions = '';
            } else {
                $unit = $getunit;
                $add_conditions = 'AND YEAR ( ps.tanggal ) = ' . $gettahun;
            }
        }

        $sql = "SELECT
                    mu.UNIT_NAME AS nama_unit,
                    ps.judul,
                    ps.tanggal,
                    ps.lokasi,
                    ps.pic_sosialisasi,
                    ps.jam_mulai,
                    ps.jam_selesai,
                    ps.id,
                    ps.ul_code
                FROM
                    peta_sosialisasi ps
                    LEFT JOIN master_unit mu ON ps.unit = mu.BUSS_AREA 
                WHERE
                    -- YEAR ( ps.tanggal ) = '$year'
                    mu.BUSS_AREA  like '%$unit%'
                    $add_conditions";
        $v = DB::select($sql);
            
        return Datatables::of($v)
            ->addColumn('action', function($data){
                /*
                $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm btn-icon"><i class="la la-pencil-square"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm btn-icon"><i class="la la-trash-o"></i> </button>';
                */
                if ($data->ul_code == Auth::user()->unitap) {
                $button =
                "<span class='dropdown'>
                    <button id='btnSearchDrop1' type='button' data-toggle='dropdown' aria-haspopup='true'
                    aria-expanded='false' class='btn btn-blue dropdown-toggle btn-sm'><i class='la la-check-circle'></i></button>
                    <span aria-labelledby='btnSearchDrop4' class='dropdown-menu mt-1 dropdown-menu-right'>
                        <a name='approve_modal' id='$data->id'  class='view dropdown-item'><i class='ft-eye'></i> VIEW</a>
                        <a name='edit_modal' id='$data->id' class='edit dropdown-item'><i class='ft-edit-2'></i> EDIT DATA</a>
                        <div class='dropdown-divider'></div>
                        <a id='$data->id' class='delete dropdown-item'><i class='ft-trash'></i> DELETE</a>
                    </span>
                </span>";
                } else {
                $button =
                "<span class='dropdown'>
                    <button id='btnSearchDrop1' type='button' data-toggle='dropdown' aria-haspopup='true'
                    aria-expanded='false' class='btn btn-blue dropdown-toggle btn-sm'><i class='la la-check-circle'></i></button>
                    <span aria-labelledby='btnSearchDrop4' class='dropdown-menu mt-1 dropdown-menu-right'>
                        <a name='approve_modal' id='$data->id'  class='view dropdown-item'><i class='ft-eye'></i> VIEW</a>
                    </span>
                </span>";
                }
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

        $markers = ($this->wpModel->getMarkers())->toArray();
        //$markers = $this->wpModel->getMarkers()->pluck("longitude", "latitude");
        
        return response()->json(['markers'.$markers]);
    }

    public function markers(Request $request)
    {   
        $markers = ($this->wpModel->getMarkers())->toArray();
        //$markers = $this->wpModel->getMarkers()->pluck("longitude", "latitude");
        
        return response()->json(['markers' => $markers]);
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
            'photo'         =>  'required',
            'presentasi'    =>  'required',
        );
        
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        $photo       = $request->file('photo');
        $nama_photo   = 'EVIDENCE_' . time() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('files/sosialisasi/'), $nama_photo);

        $presentasi = $request->file('presentasi');
        $nama_presentasi = "PRESENTASI_" . time() . '.' . $presentasi->getClientOriginalExtension();
        $presentasi->move(public_path('files/sosialisasi/'), $nama_presentasi);
   
        $store = DB::table('peta_sosialisasi')->insert([
            'unit'          => Auth::user()->unit,
            'ul_code'       => Auth::user()->unitap,
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
            'photo'         => $nama_photo,
            'presentasi'    => $nama_presentasi,
            'user_input'    => Auth::user()->username,
            'tgl_input'     => date('Y-m-d'),
        ]);

        return response()->json(['success' => 'Data Added successfully.']);
    }
   
    public function get_detail_sosialisasi()
    {
        $id = $_GET['id'];
        $data = DB::table('peta_sosialisasi')
        ->select('peta_sosialisasi.*')
        ->where('peta_sosialisasi.id','=',$id)
        ->get();
        
        return response()->json(['data' => $data]);
    }

    public function sosialisasi_delete(Request $request)
    {
        $data = DB::table('peta_sosialisasi')
        ->where('id', $request->del_hidden_id)
        //->leftJoin('menu_category', 'menu.cat_cd', '=', 'menu_category.cat_cd')
        //->where('id','=',$id)
        ->delete();
        return response()->json(['success' => 'Data is successfully deleted']);
    }

    public function edit_sosialisasi(Request $request, $id)
    {
        $data = [
            'sosialisasi'            => $this->wpModel->getDetailSosialisasi($id),
         ];

        return view('sosialisasi/edit-sosialisasi', $data);
    }

    public function view(Request $request, $id)
    {
        $data = [
            'sosialisasi'            => $this->wpModel->getDetailSosialisasi($id),
         ];

        return view('sosialisasi/view-sosialisasi', $data);
    }

    public function update_sosialisasi(Request $request)
    {
        $photo = $request->file('photo');
        if (!empty($photo)) {
            $nama_photo =  $request->old_photo;
            $photo->move(public_path('files/sosialisasi'), $nama_photo);
            // $update_photo = "`file_sop`= $new_photo";
        } else {
            $nama_photo = $request->old_photo;
        }

        $presentasi = $request->file('presentasi');
        if (!empty($presentasi)) {
            $nama_presentasi =  $request->old_presentasi;
            $presentasi->move(public_path('files/sosialisasi'), $nama_presentasi);
            // $update_presentasi = "`file_sop`= $new_presentasi";
        } else {
            $nama_presentasi = $request->old_presentasi;
        }

        $store = DB::table('peta_sosialisasi')
        ->where('id', $request->update_id)
        ->update([
            'lokasi'            => $request->lokasi,
            'judul'             => $request->judul,
            'deskripsi'         => $request->deskripsi,
            'jml_peserta'       => $request->jml_peserta,
            'pic_sosialisasi'   => $request->pic_sosialisasi,
            'tanggal'           => $request->tanggal,
            'jam_mulai'         => $request->jam_mulai,
            'jam_selesai'       => $request->jam_selesai,
            'latitude'          => $request->latitude,
            'longitude'         => $request->longitude,
            'photo'             => $nama_photo,
            'presentasi'        => $nama_presentasi,
        ]);
        return response()->json(['success' => 'Data Added successfully.']);
    }

    // public function get_markers_sosialisasi()
    // {
    //     $markers = $this->wpModel->getMarkers();
        
    //     return response()->json([$markers]);
    // }

    public function get_markers_sosialisasi(Request $request)
    {
        $data = [
            // 'detail'            => $this->wpModel->getDetailTemplate($id_template),
            // 'tbl_hirarc'        => $this->wpModel->getHirarcTemplate($id_template),
            // 'tbl_jsa'           => $this->wpModel->getJsaTemplate($id_template),
            'markers'         => collect($this->wpModel->getMarkers())->toArray(),
            // 'peralatan1'         => array($this->wpModel->getPeralatanTemplate($id_template)),
            // 'unitType'          => $this->wpModel->getUnitType(),
            // 'selectedID'        => $this->wpModel->getDetailTemplate($id_template)->jenis_template,
            // 'arraylist'        => array("Sepatu Keselamatan","on","Helm","Earplug","Sarung Tangan 20KV","Kotak P3K","Radio Telekomunikasi"),
         ];

        return view('sosialisasi/index', $data);
    }

    public function export(Request $request)
    {
        return Excel::download(new SosialisasiExport, 'sosialisasi.xlsx');
    }
}