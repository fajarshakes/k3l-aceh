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
use App\Models\Master\MasterModel;
use App\Models\Wp\WpModel;
use App\Models\Master\User;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\PeralatanKeselamatan;
use Mail; 

class WpController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        $this->wpModel     = new WpModel();
        $this->UserModel   = new User();
        $this->ModelMaster = new MasterModel();
    }
    
    public function dashboard(Request $request)
    {
        if (Auth::user()->unit == '6101'){
            $unit = '61';
        } else {
            $unit = Auth::user()->unit;
        }
    
        $data = [
            'countPermohonan'   => $this->wpModel->countPermohonan($unit),            
            'countPengerjaan'   => $this->wpModel->countPengerjaan($unit),            
            'countSelesai'      => $this->wpModel->countSelesai($unit),            
         ];
         
        return view('wp/dashboard', $data);
    }

    public function list_dashboard(Request $request)
    {
        $sql = "SELECT
                    mu.BUSS_AREA, mu.UNIT_NAME,
                    ( SELECT COUNT( id_wp ) FROM working_permit wp WHERE wp.unit = mu.BUSS_AREA AND wp.STATUS NOT IN ( 'APPROVED', 'TRASH' ) ) AS PERMOHONAN,
                    ( SELECT COUNT( id_wp ) FROM working_permit wp WHERE wp.unit = mu.BUSS_AREA AND wp.STATUS = 'APPROVED' ) AS PENGERJAAN,
                    ( SELECT COUNT( id_wp ) FROM working_permit wp WHERE wp.unit = mu.BUSS_AREA AND wp.STATUS = 'CLOSED' ) AS SELESAI 
                FROM
                    master_unit mu";
        $v = DB::select($sql);
        return Datatables::of($v)
        //->rawColumns(['action'])
        ->make(true);
    }

    public function list(Request $request)
    {
        if (Auth::user()->unit == '6101'){
            $unit = '61';
        } else {
            $unit = Auth::user()->unit;
        }
        
        $data = [
            'countPermohonan'   => $this->wpModel->countPermohonan($unit),            
            'countPengerjaan'   => $this->wpModel->countPengerjaan($unit),            
            'countSelesai'      => $this->wpModel->countSelesai($unit),            
            'unitType'          => $this->wpModel->getUnitType(),
            'unitList'          => $this->wpModel->getUnit(),        
        ];
        return view('wp/list', $data);
        
    }

    public function vendor(Request $request)
    {
        $data = [          
            'unitType'          => $this->wpModel->getUnitType(),
            'unitList'          => $this->wpModel->getUnit(),        
        ];
        return view('wp/vendor', $data);
        
    }

    public function detail(Request $request, $id_wp)
    {
        $unitData  = $this->wpModel->getUnitType();
        $unitList  = $this->wpModel->getUnit();                 
        $data = [
            'detailWp'          => $this->wpModel->getDetailWp($id_wp),
            'pelaksana_kerja'   => $this->wpModel->getPelaksanaKerja($id_wp),
            'tbl_hirarc'        => $this->wpModel->getHirarc($id_wp),
            'tbl_jsa'           => $this->wpModel->getJsa($id_wp),
            'peralatan'         => collect($this->wpModel->getPeralatan($id_wp)->pluck('description'))->toArray(),
            'peralatan1'        => array($this->wpModel->getPeralatan($id_wp)),
            'klasifikasi'       => collect($this->wpModel->getKlasifikasi($id_wp)->pluck('description'))->toArray(),
            'klasifikasi1'      => array($this->wpModel->getKlasifikasi($id_wp)),
            'prosedur'          => collect($this->wpModel->getProsedur($id_wp)->pluck('description'))->toArray(),
            'prosedur1'         => array($this->wpModel->getProsedur($id_wp)),
         ];
        
        return view('wp/detail', $data);
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
        if (Auth::user()->unit == 6101) {
            $unit_view = 61;
        } else {
            $unit_view = Auth::user()->unit;
        }

        $sql = "SELECT
                    wp.*, mu.UNIT_NAME
                FROM
                    working_permit wp LEFT JOIN master_unit mu ON wp.unit = mu.BUSS_AREA
                WHERE
                    wp.unit like '$unit_view%' AND
                    wp.status NOT IN ('APPROVED','CLOSED','TRASH')";
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

    public function list_pengerjaan(Request $request)
    {
        if (Auth::user()->unit == 6101) {
            $unit_view = 61;
        } else {
            $unit_view = Auth::user()->unit;
        }

        $sql = "SELECT
                    wp.*, mu.UNIT_NAME
                FROM
                    working_permit wp LEFT JOIN master_unit mu ON wp.unit = mu.BUSS_AREA
                WHERE
                    wp.unit like '$unit_view%' AND
                    wp.status = 'APPROVED'";
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

    public function list_selesai(Request $request)
    {
        if (Auth::user()->unit == 6101) {
            $unit_view = 61;
        } else {
            $unit_view = Auth::user()->unit;
        }

        $sql = "SELECT
                    wp.*, mu.UNIT_NAME
                FROM
                    working_permit wp LEFT JOIN master_unit mu ON wp.unit = mu.BUSS_AREA
                WHERE
                    wp.unit like '$unit_view%' AND
                    wp.status = 'CLOSED'";
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

    public function list_permohonan_vendor(Request $request)
    {
        $vendorId = Auth::user()->pers_no;

        $sql = "SELECT
                    wp.*, mu.UNIT_NAME
                FROM
                    working_permit wp LEFT JOIN master_unit mu ON wp.unit = mu.BUSS_AREA
                WHERE
                    wp.id_pelaksana = '$vendorId%' AND
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


    public function getTemplateByUnit(Request $request, $idunit)
    {   
        $listTemplate = $this->wpModel->getTemplate($idunit)->pluck("nama_template", "id_template");
        return json_encode($listTemplate);
    }

    public function getTemplateByVendor(Request $request)
    {   
        $pers_no = Auth::user()->pers_no;
        $myDPT = $this->ModelMaster->getVendorDet($pers_no)->QUALIFICATION;
        $listTemplate = $this->wpModel->getTemplateByDPT($myDPT)->pluck("nama_template", "id_template");
        return json_encode($listTemplate);
    }
    
    public function submit_form(Request $request)
    {
    
    $status      = $request->status;
    $template    = $request->template;
    $unit        = $request->unit;

    $rules = array(
        'status'     =>  'required',
        'template'   =>  'required',
        'unit'       =>  'required',
    );
    
    $error = Validator::make($request->all(), $rules);

    if($error->fails())
    {
        return response()->json(['errors' => $error->errors()->all()]);
    }

    Session::put('sel_unit', $unit);
    Session::put('sel_template', $template);
    Session::put('sel_status', $status);

    return response()->json(['success' => 'Unit dipilih : '.$unit.'</br> Template : '.$template.'</br> Status Pekerjaan : '.$status,]);

    }

    public function edit_form(Request $request)
    {
    
        $idwp       = $request->id_wp;
        $unitap_wp  = $request->ul_code;
        $unitap     = Auth::user()->unitap;
        $user_group = Auth::user()->group_id;
        $edit_role  = array('3','6','8');

        if($unitap_wp != $unitap)
            {
                return response()->json(['errors' => 'Diluar otoritas unit.!']);
            }
        else if (!in_array($user_group, $edit_role))
            {
                return response()->json(['errors' => 'Diluar otoritas edit.!']);
            }

        // For a route with the following URI: profile/{id}
        //return redirect()->route('edit_wp', ['id'=>$idwp]);
        //return view('wp/create/', $idwp);
        return response()->json(['success' => 'ID WP : '.$idwp.'</br> UNIT : '.$unitap_wp,]);

    }
    
    public function create(Request $request)
    {
        $unit = Session::get('sel_unit');
        $id_template = Session::get('sel_template');
        $status = Session::get('sel_status');
        $group_id = Auth::user()->group_id;
        $pers_no = Auth::user()->pers_no;
        $getDPT = $this->wpModel->getDetailTemplate($id_template)->qualification;

        if ($group_id == 7){
            $redirect_to = '/wp/vendor-permit';
            $detVendor   = $this->ModelMaster->getVendorDet($pers_no);
        } else {
            $redirect_to = '/wp/list-permit';
            $detVendor   = '';
        }
        
        $data = [
            'getManager'  => $this->UserModel->getUser($unit, 4),
            'getVendor'   => $this->wpModel->getVendor_byDpt(Auth::user()->comp_code, $getDPT),
            'getSpv'      => $this->UserModel->getUser($unit, 5),
            'getPj'       => $this->UserModel->getUser($unit, 6),
            'unit_l3'     => $this->wpModel->getUnit_l3($unit),
            'up_name'     => $this->wpModel->getUnitName($unit)->UNIT_NAME,
            'status'      => $status,
            'detail'      => $this->wpModel->getDetailTemplate($id_template),
            'tbl_hirarc'  => $this->wpModel->getHirarcTemplate($id_template),
            'tbl_jsa'     => $this->wpModel->getJsaTemplate($id_template),
            'peralatan'   => collect($this->wpModel->getPeralatanTemplate($id_template)->pluck('description'))->toArray(),
            'getDetVendor'=> $detVendor,
            'redirect_to'    => $redirect_to,
        ];
        
        return view('wp/create', $data);
        
    }

    public function edit_wp(Request $request, $idwp)
    {
        $detail_wp = $this->wpModel->getDetailWp($idwp);
        
        $unit = $detail_wp->unit;
        $group_id = Auth::user()->group_id;
        $pers_no = Auth::user()->pers_no;

        $data = [
            'getManager'  => $this->UserModel->getUser($unit, 4),
            'getVendor'   => $this->wpModel->getVendor(Auth::user()->comp_code),
            'getSpv'      => $this->UserModel->getUser($unit, 5),
            'getPj'       => $this->UserModel->getUser($unit, 6),
            'unit_l3'     => $this->wpModel->getUnit_l3($unit),
            'up_name'     => $this->wpModel->getUnitName($unit)->UNIT_NAME,
            'detail'      => $this->wpModel->getDetailWp($idwp),
            'tbl_hirarc'  => $this->wpModel->getHirarc($idwp),
            'pelaksana_kerja'   => $this->wpModel->getPelaksanaKerja($idwp),
            'tbl_jsa'     => $this->wpModel->getJsa($idwp),
            'peralatan'   => collect($this->wpModel->getPeralatan($idwp)->pluck('description'))->toArray(),
            'klasifikasi' => collect($this->wpModel->getKlasifikasi($idwp)->pluck('description'))->toArray(),
            'prosedur'    => collect($this->wpModel->getProsedur($idwp)->pluck('description'))->toArray(),

        ];
        
        return view('wp/edit', $data);
        
    }

    public function test(Request $request)
    {   
        if (Auth::user()->unit == '6101'){
            $unit = '61';
        } else {
            $unit = Auth::user()->unit;
        }
        $id = '6112200001';
        //$unit = $this->wpModel->getDetailWp($id)->unit;
        //$getList = $this->wpModel->getListOnWork($unit);
        
        $getwp = $this->wpModel->getDetailWp(6116200001);
        //$getRecepient  = $this->ModelMaster->getRecepient('ENDRA');
        
        //return response()->json($getRecepient->email);
        return response()->json($getwp);
        //return $unit;
    }
    
    public function wp_store(Request $request)
    {
        $rules = array(
            'unit_id' =>  'required',
            'supervisor' =>  'required',
            'pejabat' =>  'required',
            'manager' =>  'required',
            'status_pegawai' =>  'required',
            'tgl_pengajuan' =>  'required',
            'peralatan_dipadamkan' => 'required',
            'pengawas_pekerjaan' => 'required',
            'pengawas_k3l' => 'required',
            'tgl_mulai'   =>  'required',
            'jam_mulai'   =>  'required',
            'tgl_selesai'   =>  'required',
            'jam_selesai'   =>  'required',
            'klasifikasi'   =>  'required',
            'prosedur'   =>  'required',
            'nama_pelaksana' =>  'required',

            //files
            'sertifikat_kompetensi' => 'required|mimes:pdf|max:10000',
            'tenaga_ahli_k3' => 'required|mimes:pdf|max:10000',
            'surat_penunjukan' => 'required|mimes:pdf|max:10000',
            'daftar_peralatan' => 'required|mimes:pdf|max:10000',
        );
        $messages = [
            'unit_id.required' => 'Unit Harus dipilih.!',
            'supervisor.required' => 'SPV Harus dipilih.!',
            'pejabat.required' => 'PJ K3 Harus dipilih.!',
            'manager.required' => 'Manager Harus dipilih.!',
            'status_pegawai.required' => 'Status Pelaksana Harus dipilih.!',
            'tgl_pengajuan.required' => 'Tgl Pengajuan harus diisi.!',
            'peralatan_dipadamkan.required' => 'Alat Padam harus diisi.!',
            'pengawas_pekerjaan.required' => 'Pengawas harus diisi.!',
            'pengawas_k3l.required' => 'Pengawas K3 harus diisi.!',
            'tgl_mulai.required' => 'Tgl Mulai harus diisi.!',
            'jam_mulai.required' => 'Jam Mulai harus diisi.!',
            'tgl_selesai.required' => 'Jam Selesai harus diisi.!',
            'jam_selesai.required' => 'Jam Selesai harus diisi.!',
            'klasifikasi.required' => 'Klasifikasi harus dipilih.!',
            'prosedur.required' => 'Prosedur harus dipilih.!',
            'nama_pelaksana.required' => 'Pelaksana harus diisi.!',

            'sertifikat_kompetensi.required' => 'File Sertifikat harus diupload.!',
            'tenaga_ahli_k3.required' => 'File AK3 harus diupload.!',
            'surat_penunjukan.required' => 'Surat Penunjukan harus diupload.!',
            'daftar_peralatan.required' => 'File Peralatan harus diupload.!',
        ];
        
        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        $unit = Session::get('sel_unit');
        $status = Session::get('sel_status');
        $year = date('y');
        $new_id = $this->wpModel->generateWpId($unit . $year);

        $bpjs       = $request->file('bpjs');
        if (isset($bpjs)) {
        $new_bpjs   = 'BPJS_' . $new_id . '.' . $bpjs->getClientOriginalExtension();
        $bpjs->move(public_path('files/working_permit/'. date('Y')), $new_bpjs);
        } else {
            $new_bpjs= '';
        }

        $sertifikasi      = $request->file('sertifikat_kompetensi');
        if (isset($sertifikasi)) {
        $new_sertifikat   = 'SERTIFIKAT_' . $new_id . '.' . $sertifikasi->getClientOriginalExtension();
        $sertifikasi->move(public_path('files/working_permit/'. date('Y')), $new_sertifikat);
        } else {
            $new_sertifikat= '';
        }

        $ak3       = $request->file('tenaga_ahli_k3');
        if (isset($ak3)) {
        $new_ak3   = 'AK3_' . $new_id . '.' . $ak3->getClientOriginalExtension();
        $ak3->move(public_path('files/working_permit/'. date('Y')), $new_ak3);
        } else {
            $new_ak3= '';
        }

        $singeline       = $request->file('single_line_diagram');
        if (isset($singeline)) {
        $new_singline   = 'SINGLINE_' . $new_id . '.' . $singeline->getClientOriginalExtension();
        $singeline->move(public_path('files/working_permit/'. date('Y')), $new_singline);
        } else {
            $new_singline= '';
        }

        $skp       = $request->file('surat_penunjukan');
        if (isset($skp)) {
        $new_skp   = 'SKP_' . $new_id . '.' . $skp->getClientOriginalExtension();
        $skp->move(public_path('files/working_permit/'. date('Y')), $new_skp);
        } else {
            $new_skp= '';
        }

        $l_peralatan       = $request->file('daftar_peralatan');
        if (isset($l_peralatan)) {
        $new_peralatan   = 'PERALATAN_' . $new_id . '.' . $l_peralatan->getClientOriginalExtension();
        $l_peralatan->move(public_path('files/working_permit/'. date('Y')), $new_peralatan);
        } else {
            $new_peralatan= '';
        }

        $foto       = $request->file('foto_lokasi_kerja');
        if (isset($foto)) {
        $new_foto   = 'FOTO_' . $new_id . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('files/working_permit/'. date('Y')), $new_foto);
        } else {
            $new_foto= '';
        }

        $store = DB::table('working_permit')->insert([
            'id_wp'                 => $new_id,
            'unit'                  => $unit,
            'status'                => 'NEW',
            'nama_pekerjaan'        => $request->nama_pekerjaan,
            'pelaksana'             => $request->pelaksana,
            'qualification'         => $request->qualification,
            'id_pelaksana'          => $request->vendor_id,
            'alamat'                => $request->alamat,
            'nama_pj'               => $request->nama_pj,
            'jabatan'               => $request->jabatan,
            'no_telepon'            => $request->no_telepon,
            'tanda_tangan'          => $request->tanda_tangan,
            'status_pegawai'        => $request->status_pegawai,
            'ul_code'               => $request->unit_id,
            'tgl_pengajuan'         => $request->tgl_pengajuan,
            'grounding'             => $request->grounding,
            'detail_pekerjaan'      => $request->detail_pekerjaan,
            'lokasi_pekerjaan'      => $request->lokasi_pekerjaan,
            'pemadaman'             => $request->pemadaman,
            'peralatan_dipadamkan'  => $request->peralatan_dipadamkan,
            'pengawas_pekerjaan'    => $request->pengawas_pekerjaan,
            'no_pengawas_pekerjaan' => $request->no_pengawas_pekerjaan,
            'pengawas_k3l'          => $request->pengawas_k3l,
            'no_pengawas_k3'        => $request->no_pengawas_k3,
            'tgl_mulai'             => $request->tgl_mulai,
            'tgl_selesai'           => $request->tgl_selesai,
            'jam_mulai'             => $request->jam_mulai,
            'jam_selesai'           => $request->jam_selesai,
            'file_bpjs'             => $new_bpjs,
            'file_sertifikat_kompetensi' => $new_sertifikat,
            'file_ak3'              => $new_ak3,
            'file_singleline'       => $new_singline,
            'file_sk_pengawas'      => $new_skp,
            'file_list_peralatan'   => $new_peralatan,
            'file_foto_kerja'       => $new_foto,
            'manager'               => $request->manager,
            'supervisor'            => $request->supervisor,
            'pejabat_k3l'           => $request->pejabat,
            'tgl_input'             => date('Y-m-d'),
            'tahun'                 => date('Y'),
            'user_input'            => Auth::user()->username,
            'wp_desc'               => $status,
        ]);

        for($i = 0; $i < count($request['kegiatan_hirarc']); $i++){

            //formula tingkat resiko
            if ($request['penilaian_kemungkinan'][$i] == 'A' ){
                if ($request['penilaian_konsekuensi'][$i] == 1 || 2){
                    $resiko_1 = 'M';
                } else if ($request['penilaian_konsekuensi'][$i] == 3 ){
                    $resiko_1 = 'H';
                } else if ($request['penilaian_konsekuensi'][$i] == 4 || 5 ){
                    $resiko_1 = 'E';
                }
            } else if ($request['penilaian_kemungkinan'][$i] == 'B' ){
                if ($request['penilaian_konsekuensi'][$i] == 1){
                    $resiko_1 = 'L';
                } else if ($request['penilaian_konsekuensi'][$i] == 2 ){
                    $resiko_1 = 'M';
                } else if ($request['penilaian_konsekuensi'][$i] == 3 ){
                    $resiko_1 = 'H';
                } else if ($request['penilaian_konsekuensi'][$i] == 4 || 5 ){
                    $resiko_1 = 'E';
                }
            } else if ($request['penilaian_kemungkinan'][$i] == 'C' ){
                if ($request['penilaian_konsekuensi'][$i] == 1){
                    $resiko_1 = 'L';
                } else if ($request['penilaian_konsekuensi'][$i] == 2 ){
                    $resiko_1 = 'M';
                } else if ($request['penilaian_konsekuensi'][$i] == 3 || 4 ){
                    $resiko_1 = 'H';
                } else if ($request['penilaian_konsekuensi'][$i] == 5 ){
                    $resiko_1 = 'E';
                }
            } else if ($request['penilaian_kemungkinan'][$i] == 'D' ){
                if ($request['penilaian_konsekuensi'][$i] == 1 || 2){
                    $resiko_1 = 'L';
                } else if ($request['penilaian_konsekuensi'][$i] == 3 ){
                    $resiko_1 = 'M';
                } else if ($request['penilaian_konsekuensi'][$i] == 4 ){
                    $resiko_1 = 'H';
                } else if ($request['penilaian_konsekuensi'][$i] == 5 ){
                    $resiko_1 = 'E';
                }
            } else if ($request['penilaian_kemungkinan'][$i] == 'E' ){
                if ($request['penilaian_konsekuensi'][$i] == 1 || 2){
                    $resiko_1 = 'L';
                } else if ($request['penilaian_konsekuensi'][$i] == 3 ){
                    $resiko_1 = 'M';
                } else if ($request['penilaian_konsekuensi'][$i] == 4 || 5 ){
                    $resiko_1 = 'H';
                }
            }

            if ($request['pengendalian_kemungkinan'][$i] == 'A' ){
                if ($request['pengendalian_konsekuensi'][$i] == 1 || 2){
                    $resiko_2 = 'M';
                } else if ($request['pengendalian_konsekuensi'][$i] == 3 ){
                    $resiko_2 = 'H';
                } else if ($request['pengendalian_konsekuensi'][$i] == 4 || 5 ){
                    $resiko_2 = 'E';
                }
            } else if ($request['pengendalian_kemungkinan'][$i] == 'B' ){
                if ($request['pengendalian_konsekuensi'][$i] == 1){
                    $resiko_2 = 'L';
                } else if ($request['pengendalian_konsekuensi'][$i] == 2 ){
                    $resiko_2 = 'M';
                } else if ($request['pengendalian_konsekuensi'][$i] == 3 ){
                    $resiko_2 = 'H';
                } else if ($request['pengendalian_konsekuensi'][$i] == 4 || 5 ){
                    $resiko_2 = 'E';
                }
            } else if ($request['pengendalian_kemungkinan'][$i] == 'C' ){
                if ($request['pengendalian_konsekuensi'][$i] == 1){
                    $resiko_2 = 'L';
                } else if ($request['pengendalian_konsekuensi'][$i] == 2 ){
                    $resiko_2 = 'M';
                } else if ($request['pengendalian_konsekuensi'][$i] == 3 || 4 ){
                    $resiko_2 = 'H';
                } else if ($request['pengendalian_konsekuensi'][$i] == 5 ){
                    $resiko_2 = 'E';
                }
            } else if ($request['pengendalian_kemungkinan'][$i] == 'D' ){
                if ($request['pengendalian_konsekuensi'][$i] == 1 || 2){
                    $resiko_2 = 'L';
                } else if ($request['pengendalian_konsekuensi'][$i] == 3 ){
                    $resiko_2 = 'M';
                } else if ($request['pengendalian_konsekuensi'][$i] == 4 ){
                    $resiko_2 = 'H';
                } else if ($request['pengendalian_konsekuensi'][$i] == 5 ){
                    $resiko_2 = 'E';
                }
            } else if ($request['pengendalian_kemungkinan'][$i] == 'E' ){
                if ($request['pengendalian_konsekuensi'][$i] == 1 || 2){
                    $resiko_2 = 'L';
                } else if ($request['pengendalian_konsekuensi'][$i] == 3 ){
                    $resiko_2 = 'M';
                } else if ($request['pengendalian_konsekuensi'][$i] == 4 || 5 ){
                    $resiko_2 = 'H';
                }
            }

            $store = DB::table('tbl_hirarc')->insert([
            'id_wp'         => $new_id,
            'kegiatan'      => $request['kegiatan_hirarc'][$i],
            'potensi_bahaya'   => $request['potensi_bahaya'][$i],
            'resiko'        => $request['resiko_hirarc'][$i],
            'penilaian_konsekuensi'   => $request['penilaian_konsekuensi'][$i],
            'penilaian_kemungkinan'   => $request['penilaian_kemungkinan'][$i],
            'penilaian_tingkat_resiko'   => $resiko_1,
            'pengendalian_resiko'       => $request['potensi_bahaya'][$i],
            'pengendalian_konsekuensi'  => $request['pengendalian_konsekuensi'][$i],
            'pengendalian_kemungkinan'  => $request['pengendalian_kemungkinan'][$i],
            'pengendalian_tingkat_resiko'  => $resiko_2,
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
        
        for($i = 0; $i < count($request['peralatan']); $i++){
            $store = DB::table('peralatan_keselamatan')->insert([
            'id_wp'         => $new_id,
            'description'   => $request['peralatan'][$i],
            ]);
        }

        for($i = 0; $i < count($request['klasifikasi']); $i++){
            $store = DB::table('klasifikasi_pekerjaan')->insert([
            'id_wp'         => $new_id,
            'description'   => $request['klasifikasi'][$i],
            ]);
        }

        for($i = 0; $i < count($request['prosedur']); $i++){
            $store = DB::table('prosedur_pekerjaan')->insert([
            'id_wp'         => $new_id,
            'description'   => $request['prosedur'][$i],
            ]);
        }
        
        for($i = 0; $i < count($request['nama_pelaksana']); $i++){
            $store = DB::table('pelaksana_pekerjaan')->insert([
                'id_wp' => $new_id,
                'nama_pelaksana' => $request['nama_pelaksana'][$i],
                'personal_no' => $request['nip_pelaksana'][$i],
                'jabatan_pelaksana' => $request['jabatan_pelaksana'][$i],
            ]);
        }
        
        try{
            Mail::send('wp/mailbody', [
                'nama_penerima' => $request->supervisor,
                'lokasi' => $request->unit_id,
                'uraian' => $request->nama_pekerjaan,
                'pelaksana' => $request->pelaksana,
                'tglmohon' => $request->tgl_pengajuan,
                'tglkerja' => $request->tgl_mulai,
            ],
            function ($message) use ($request)
            {
                $getRecepient  = $this->ModelMaster->getRecepient($request->supervisor);
                $message->subject('PERMOHONAN WORKING PERMIT');
                $message->from('noreply@plnaceh.id');
                $message->to($getRecepient->email);
                //$message->to('FACHRULRAZI.ACH@GMAIL.COM');
            });
            return response()->json(['success' => 'Data Added successfully.']);
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
        
    }

    public function wp_update(Request $request)
    {
        $rules = array(
            'unit_id' =>  'required',
            'supervisor' =>  'required',
            'pejabat' =>  'required',
            'manager' =>  'required',
            'status_pegawai' =>  'required',
            'tgl_pengajuan' =>  'required',
            'peralatan_dipadamkan' => 'required',
            'pengawas_pekerjaan' => 'required',
            'pengawas_k3l' => 'required',
            'tgl_mulai'   =>  'required',
            'jam_mulai'   =>  'required',
            'tgl_selesai'   =>  'required',
            'jam_selesai'   =>  'required',
            'klasifikasi'   =>  'required',
            'prosedur'   =>  'required',
            'nama_pelaksana' =>  'required',
        );
        $messages = [
            'unit_id.required' => 'Unit Harus dipilih.!',
            'supervisor.required' => 'SPV Harus dipilih.!',
            'pejabat.required' => 'PJ K3 Harus dipilih.!',
            'manager.required' => 'Manager Harus dipilih.!',
            'status_pegawai.required' => 'Status Pelaksana Harus dipilih.!',
            'tgl_pengajuan.required' => 'Tgl Pengajuan harus diisi.!',
            'peralatan_dipadamkan.required' => 'Alat Padam harus diisi.!',
            'pengawas_pekerjaan.required' => 'Pengawas harus diisi.!',
            'pengawas_k3l.required' => 'Pengawas K3 harus diisi.!',
            'tgl_mulai.required' => 'Tgl Mulai harus diisi.!',
            'jam_mulai.required' => 'Jam Mulai harus diisi.!',
            'tgl_selesai.required' => 'Jam Selesai harus diisi.!',
            'jam_selesai.required' => 'Jam Selesai harus diisi.!',
            'klasifikasi.required' => 'Klasifikasi harus dipilih.!',
            'prosedur.required' => 'Prosedur harus dipilih.!',
            'nama_pelaksana.required' => 'Pelaksana harus diisi.!',
        ];
        
        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        $idwp = $request->idwp;

        $bpjs       = $request->file('bpjs');
        if (isset($bpjs)) {
        $new_bpjs   = 'BPJS_' . $new_id . '.' . $bpjs->getClientOriginalExtension();
        $bpjs->move(public_path('files/working_permit/'. date('Y')), $new_bpjs);
        $update1 = "`file_bpjs`= $new_bpjs";
        } else {
        $update1 = "";
        }

        $sertifikasi      = $request->file('sertifikat_kompetensi');
        if (isset($sertifikasi)) {
        $new_sertifikat   = 'SERTIFIKAT_' . $new_id . '.' . $sertifikasi->getClientOriginalExtension();
        $sertifikasi->move(public_path('files/working_permit/'. date('Y')), $new_sertifikat);
        $update2 = "`file_sertifikat_kompetensi`= $new_sertifikat";
        } else {
        $update2 = "";
        }

        $ak3       = $request->file('tenaga_ahli_k3');
        if (isset($ak3)) {
        $new_ak3   = 'AK3_' . $new_id . '.' . $ak3->getClientOriginalExtension();
        $ak3->move(public_path('files/working_permit/'. date('Y')), $new_ak3);
        $update3 = "`file_ak3`= $new_ak3";
        } else {
        $update3= "";
        }

        $singeline       = $request->file('single_line_diagram');
        if (isset($singeline)) {
        $new_singline   = 'SINGLINE_' . $new_id . '.' . $singeline->getClientOriginalExtension();
        $singeline->move(public_path('files/working_permit/'. date('Y')), $new_singline);
        $update4 = "`file_singline`= $new_singline";
        } else {
        $update4= '';
        }

        $skp       = $request->file('surat_penunjukan');
        if (isset($skp)) {
        $new_skp   = 'SKP_' . $new_id . '.' . $skp->getClientOriginalExtension();
        $skp->move(public_path('files/working_permit/'. date('Y')), $new_skp);
        $update5 = "`file_sk_pengawas`= $new_skp";
        } else {
        $update5= '';
        }

        $l_peralatan       = $request->file('daftar_peralatan');
        if (isset($l_peralatan)) {
        $new_peralatan   = 'PERALATAN_' . $new_id . '.' . $l_peralatan->getClientOriginalExtension();
        $l_peralatan->move(public_path('files/working_permit/'. date('Y')), $new_peralatan);
        $update6 = "`file_list_peralatan`= $new_peralatan";
        } else {
        $update6= '';
        }

        $foto       = $request->file('foto_lokasi_kerja');
        if (isset($foto)) {
        $new_foto   = 'FOTO_' . $new_id . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('files/working_permit/'. date('Y')), $new_foto);
        $update7 = "`file_foto_kerja`= $new_foto";
        } else {
        $update7= '';
        }

        $update = DB::table('working_permit')
            ->where('id_wp',$idwp)
            ->update([
            'nama_pekerjaan'        => $request->nama_pekerjaan,
            'status_pegawai'        => $request->status_pegawai,
            'ul_code'               => $request->unit_id,
            'grounding'             => $request->grounding,
            'detail_pekerjaan'      => $request->detail_pekerjaan,
            'lokasi_pekerjaan'      => $request->lokasi_pekerjaan,
            'pemadaman'             => $request->pemadaman,
            'peralatan_dipadamkan'  => $request->peralatan_dipadamkan,
            'pengawas_pekerjaan'    => $request->pengawas_pekerjaan,
            'no_pengawas_pekerjaan' => $request->no_pengawas_pekerjaan,
            'pengawas_k3l'          => $request->pengawas_k3l,
            'no_pengawas_k3'        => $request->no_pengawas_k3,
            'jam_mulai'             => $request->jam_mulai,
            'jam_selesai'           => $request->jam_selesai,
            'manager'               => $request->manager,
            'supervisor'            => $request->supervisor,
            'pejabat_k3l'           => $request->pejabat,
        ]);
        
        $delete1 = DB::table('tbl_hirarc')->where('id_wp',$idwp)->delete();
        $delete2 = DB::table('tbl_jsa')->where('id_wp',$idwp)->delete();
        $delete3 = DB::table('peralatan_keselamatan')->where('id_wp',$idwp)->delete();
        $delete4 = DB::table('klasifikasi_pekerjaan')->where('id_wp',$idwp)->delete();
        $delete5 = DB::table('prosedur_pekerjaan')->where('id_wp',$idwp)->delete();
        $delete6 = DB::table('pelaksana_pekerjaan')->where('id_wp',$idwp)->delete();
        
        for($i = 0; $i < count($request['kegiatan_hirarc']); $i++){

            //formula tingkat resiko
            if ($request['penilaian_kemungkinan'][$i] == 'A' ){
                if ($request['penilaian_konsekuensi'][$i] == 1 || 2){
                    $resiko_1 = 'M';
                } else if ($request['penilaian_konsekuensi'][$i] == 3 ){
                    $resiko_1 = 'H';
                } else if ($request['penilaian_konsekuensi'][$i] == 4 || 5 ){
                    $resiko_1 = 'E';
                }
            } else if ($request['penilaian_kemungkinan'][$i] == 'B' ){
                if ($request['penilaian_konsekuensi'][$i] == 1){
                    $resiko_1 = 'L';
                } else if ($request['penilaian_konsekuensi'][$i] == 2 ){
                    $resiko_1 = 'M';
                } else if ($request['penilaian_konsekuensi'][$i] == 3 ){
                    $resiko_1 = 'H';
                } else if ($request['penilaian_konsekuensi'][$i] == 4 || 5 ){
                    $resiko_1 = 'E';
                }
            } else if ($request['penilaian_kemungkinan'][$i] == 'C' ){
                if ($request['penilaian_konsekuensi'][$i] == 1){
                    $resiko_1 = 'L';
                } else if ($request['penilaian_konsekuensi'][$i] == 2 ){
                    $resiko_1 = 'M';
                } else if ($request['penilaian_konsekuensi'][$i] == 3 || 4 ){
                    $resiko_1 = 'H';
                } else if ($request['penilaian_konsekuensi'][$i] == 5 ){
                    $resiko_1 = 'E';
                }
            } else if ($request['penilaian_kemungkinan'][$i] == 'D' ){
                if ($request['penilaian_konsekuensi'][$i] == 1 || 2){
                    $resiko_1 = 'L';
                } else if ($request['penilaian_konsekuensi'][$i] == 3 ){
                    $resiko_1 = 'M';
                } else if ($request['penilaian_konsekuensi'][$i] == 4 ){
                    $resiko_1 = 'H';
                } else if ($request['penilaian_konsekuensi'][$i] == 5 ){
                    $resiko_1 = 'E';
                }
            } else if ($request['penilaian_kemungkinan'][$i] == 'E' ){
                if ($request['penilaian_konsekuensi'][$i] == 1 || 2){
                    $resiko_1 = 'L';
                } else if ($request['penilaian_konsekuensi'][$i] == 3 ){
                    $resiko_1 = 'M';
                } else if ($request['penilaian_konsekuensi'][$i] == 4 || 5 ){
                    $resiko_1 = 'H';
                }
            }

            if ($request['pengendalian_kemungkinan'][$i] == 'A' ){
                if ($request['pengendalian_konsekuensi'][$i] == 1 || 2){
                    $resiko_2 = 'M';
                } else if ($request['pengendalian_konsekuensi'][$i] == 3 ){
                    $resiko_2 = 'H';
                } else if ($request['pengendalian_konsekuensi'][$i] == 4 || 5 ){
                    $resiko_2 = 'E';
                }
            } else if ($request['pengendalian_kemungkinan'][$i] == 'B' ){
                if ($request['pengendalian_konsekuensi'][$i] == 1){
                    $resiko_2 = 'L';
                } else if ($request['pengendalian_konsekuensi'][$i] == 2 ){
                    $resiko_2 = 'M';
                } else if ($request['pengendalian_konsekuensi'][$i] == 3 ){
                    $resiko_2 = 'H';
                } else if ($request['pengendalian_konsekuensi'][$i] == 4 || 5 ){
                    $resiko_2 = 'E';
                }
            } else if ($request['pengendalian_kemungkinan'][$i] == 'C' ){
                if ($request['pengendalian_konsekuensi'][$i] == 1){
                    $resiko_2 = 'L';
                } else if ($request['pengendalian_konsekuensi'][$i] == 2 ){
                    $resiko_2 = 'M';
                } else if ($request['pengendalian_konsekuensi'][$i] == 3 || 4 ){
                    $resiko_2 = 'H';
                } else if ($request['pengendalian_konsekuensi'][$i] == 5 ){
                    $resiko_2 = 'E';
                }
            } else if ($request['pengendalian_kemungkinan'][$i] == 'D' ){
                if ($request['pengendalian_konsekuensi'][$i] == 1 || 2){
                    $resiko_2 = 'L';
                } else if ($request['pengendalian_konsekuensi'][$i] == 3 ){
                    $resiko_2 = 'M';
                } else if ($request['pengendalian_konsekuensi'][$i] == 4 ){
                    $resiko_2 = 'H';
                } else if ($request['pengendalian_konsekuensi'][$i] == 5 ){
                    $resiko_2 = 'E';
                }
            } else if ($request['pengendalian_kemungkinan'][$i] == 'E' ){
                if ($request['pengendalian_konsekuensi'][$i] == 1 || 2){
                    $resiko_2 = 'L';
                } else if ($request['pengendalian_konsekuensi'][$i] == 3 ){
                    $resiko_2 = 'M';
                } else if ($request['pengendalian_konsekuensi'][$i] == 4 || 5 ){
                    $resiko_2 = 'H';
                }
            }

        $store = DB::table('tbl_hirarc')->insert([
            'id_wp'         => $idwp,
            'kegiatan'      => $request['kegiatan_hirarc'][$i],
            'potensi_bahaya'   => $request['potensi_bahaya'][$i],
            'resiko'        => $request['resiko_hirarc'][$i],
            'penilaian_konsekuensi'   => $request['penilaian_konsekuensi'][$i],
            'penilaian_kemungkinan'   => $request['penilaian_kemungkinan'][$i],
            'penilaian_tingkat_resiko'   => $resiko_1,
            'pengendalian_resiko'       => $request['potensi_bahaya'][$i],
            'pengendalian_konsekuensi'  => $request['pengendalian_konsekuensi'][$i],
            'pengendalian_kemungkinan'  => $request['pengendalian_kemungkinan'][$i],
            'pengendalian_tingkat_resiko'  => $resiko_2,
            'status_pengendalian'       => $request['status_pengendalian'][$i],
            'penanggung_jawab'          => $request['penanggung_jawab'][$i],
            ]);
        }

        for($i = 0; $i < count($request['langkah_pekerjaan']); $i++){
            $store = DB::table('tbl_jsa')->insert([
            'id_wp'         => $idwp,
            'langkah_pekerjaan'      => $request['langkah_pekerjaan'][$i],
            'potensi_bahaya'   => $request['potensi_bahaya'][$i],
            'resiko'        => $request['resiko'][$i],
            'tindakan'        => $request['tindakan'][$i],
            ]);
        }
        
        for($i = 0; $i < count($request['peralatan']); $i++){
            $store = DB::table('peralatan_keselamatan')->insert([
            'id_wp'         => $idwp,
            'description'   => $request['peralatan'][$i],
            ]);
        }

        for($i = 0; $i < count($request['klasifikasi']); $i++){
            $store = DB::table('klasifikasi_pekerjaan')->insert([
            'id_wp'         => $idwp,
            'description'   => $request['klasifikasi'][$i],
            ]);
        }

        for($i = 0; $i < count($request['prosedur']); $i++){
            $store = DB::table('prosedur_pekerjaan')->insert([
            'id_wp'         => $idwp,
            'description'   => $request['prosedur'][$i],
            ]);
        }
        
        for($i = 0; $i < count($request['nama_pelaksana']); $i++){
            $store = DB::table('pelaksana_pekerjaan')->insert([
                'id_wp' => $idwp,
                'nama_pelaksana' => $request['nama_pelaksana'][$i],
                'personal_no' => $request['nip_pelaksana'][$i],
                'jabatan_pelaksana' => $request['jabatan_pelaksana'][$i],
            ]);
        }
    
    return response()->json(['success' => 'Data Updated successfully.']);
        
    }

    public function approve_form(Request $request)
    {
        $id_wp = $request->id_wp;
        $wp_desc = $request->wp_desc;
        $unitap_wp = $request->ul_code;
        $unitap = Auth::user()->unitap;
        $group_id = Auth::user()->group_id;
        
        if ($wp_desc == 'NORMAL' && $unitap_wp != $unitap)
        {
            return response()->json(['errors' => 'Diluar otoritas approval unit.!']);
        } else if  (($wp_desc == 'EMERGENCY' && $group_id != 3))
        {
            return response()->json(['errors' => 'Diluar otoritas approval unit.!']);
        }

        $detail_wp = $this->wpModel->getDetailWp($id_wp);

        if ($request->group_id == 5){
            $status = 'APPROVAL_2';
            $field1 = 'user_approval3';
            $field2 = 'tgl_approval3';
            //$recepient = $detail_wp->pejabat_k3l;
            $recepient = 'Fachrul Razi';
            $notif = 'YES';

        } else if ($request->group_id == 6){
            $status = 'APPROVAL_1';
            $field1 = 'user_approval2';
            $field2 = 'tgl_approval2';
            //$recepient = $detail_wp->manager;
            $recepient = 'Fachrul Razi';
            $notif = 'YES';

        } else if ($request->group_id == 4 && $wp_desc == 'EMERGENCY'){
            $status = 'APPROVAL_INDUK';
            $field1 = 'user_approval3';
            $field2 = 'tgl_approval3'; 
            //$recepient = 'MULIADI'; //HARD CODE
            $recepient = 'Fachrul Razi';
            $notif = 'YES';

        } else if ($request->group_id == 3 && $wp_desc == 'EMERGENCY'){
            $status = 'APPROVED';
            $field1 = 'user_approve_induk';
            $field2 = 'tgl_approve_induk'; 
            $notif = 'NO';
        } else if ($request->group_id == 4 && $wp_desc != 'EMERGENCY'){
            $status = 'APPROVED';
            $field1 = 'user_approval3';
            $field2 = 'tgl_approval3';
            $notif = 'NO';
        }
        
        if ($request->ket_approve == 'APPROVE'){

        $update = DB::table('working_permit')
        ->where('id_wp', $id_wp)
        ->update([
            'status'   => $status,
            $field1    => Auth::user()->email,
            $field2    => date('Y-m-d'),
        ]);

        if ($notif == 'YES'){
        try{
            Mail::send('wp/mailbody', [
                'nama_penerima' => $recepient,
                'lokasi' => $detail_wp->ul_code,
                'uraian' => $detail_wp->nama_pekerjaan,
                'pelaksana' => $detail_wp->pelaksana,
                'tglmohon' => $detail_wp->tgl_pengajuan,
                'tglkerja' => $detail_wp->tgl_mulai,
            ],
            function ($message) use ($detail_wp, $recepient)
            {
                $getRecepient  = $this->ModelMaster->getRecepient($recepient);
                $message->subject('APPROVAL WORKING PERMIT - [TEST]');
                $message->from('noreply@plnaceh.id');
                $message->to($getRecepient->email);
                $message->cc('FACHRULRAZI.ACH@GMAIL.COM');
            });
            return response()->json(['success' => 'Data Approved successfully.']);
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
        } else {
            return response()->json(['success' => 'Data Approved successfully.']);
        }

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

    public function closing_form(Request $request)
    {
        $id_wp      = $request->id_wp;
        $unitap_wp  = $request->ul_code;
        $unitap     = Auth::user()->unitap;
        $user_group = Auth::user()->group_id;
        $edit_role  = array('3','6','8');

        if($unitap_wp != $unitap)
            {
                return response()->json(['errors' => 'Diluar otoritas unit.!']);
            }
        else if (!in_array($user_group, $edit_role))
            {
                return response()->json(['errors' => 'Diluar otoritas edit.!']);
            }


        $update = DB::table('working_permit')
        ->where('id_wp', $id_wp)
        ->update([
            'status'        => 'CLOSED',
            'tgl_closing'   => $request->closing_date,
            'jam_closing'   => $request->closing_time,
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

    public function print_jsa(Request $request, $id_wp)
    {
        $unit = $this->wpModel->getDetailWp($id_wp)->unit;
        $data = [
            'detailWp'          => $this->wpModel->getDetailWp($id_wp),
            'pelaksana_kerja'   => $this->wpModel->getPelaksanaKerja($id_wp),
            'tbl_jsa'           => $this->wpModel->getJsa($id_wp),
            'peralatan'         => collect($this->wpModel->getPeralatan($id_wp)->pluck('description'))->toArray(),
            'peralatan1'        => array($this->wpModel->getPeralatan($id_wp)),
            'klasifikasi'       => collect($this->wpModel->getKlasifikasi($id_wp)->pluck('description'))->toArray(),
            'klasifikasi1'      => array($this->wpModel->getKlasifikasi($id_wp)),
            'prosedur'          => collect($this->wpModel->getProsedur($id_wp)->pluck('description'))->toArray(),
            'prosedur1'         => array($this->wpModel->getProsedur($id_wp)),
            'unit_detail'       => $this->wpModel->getUnitDetail($unit),

         ];
         
         return view('wp/print_jsa', $data,);

    }

    public function print_hirarc(Request $request, $id_wp)
    {
        $unit = $this->wpModel->getDetailWp($id_wp)->unit;
        $data = [
            'detailWp'          => $this->wpModel->getDetailWp($id_wp),
            'pelaksana_kerja'   => $this->wpModel->getPelaksanaKerja($id_wp),
            'tbl_hirarc'        => $this->wpModel->getHirarc($id_wp),
            'tbl_jsa'           => $this->wpModel->getJsa($id_wp),
            'unit_detail'       => $this->wpModel->getUnitDetail($unit),
            //'group'           => $v,
            
         ];
         
         return view('wp/print_hirarc', $data,);
    }

    public function print_wp(Request $request, $id_wp)
    {
        $unit = $this->wpModel->getDetailWp($id_wp)->unit;
        $data = [
            'detailWp'          => $this->wpModel->getDetailWp($id_wp),
            'pelaksana_kerja'   => $this->wpModel->getPelaksanaKerja($id_wp),
            'tbl_hirarc'        => $this->wpModel->getHirarc($id_wp),
            'tbl_jsa'           => $this->wpModel->getJsa($id_wp),
            'klasifikasi'       => collect($this->wpModel->getKlasifikasi($id_wp)->pluck('description'))->toArray(),
            'klasifikasi1'      => array($this->wpModel->getKlasifikasi($id_wp)),
            'prosedur'          => collect($this->wpModel->getProsedur($id_wp)->pluck('description'))->toArray(),
            'prosedur1'         => array($this->wpModel->getProsedur($id_wp)),
            'unit_detail'       => $this->wpModel->getUnitDetail($unit),

         ];
         
         return view('wp/print_wp', $data,);
    }

    public function mailbody()
    {
        $data = [
            'nama_penerima' => 'NAMA PENERIMA',
            'lokasi' => 'LOKASI',
            'uraian' => 'URAIAN',
            'pelaksana' => 'VENDOR',
            'tglmohon' => date('d-m-Y'),
            'tglkerja' => date('d-m-Y'),

         ];
         return view('wp/mailbody', $data,);
    }
   
}