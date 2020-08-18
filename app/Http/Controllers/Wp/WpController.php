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
use App\PeralatanKeselamatan;


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

    public function detail(Request $request, $id_wp)
    {
        $unitData  = $this->wpModel->getUnitType();
        $unitList  = $this->wpModel->getUnit();
        $masterPeralatan = ['Sarung Tangan Katun', 'Sarung Tangan Karet', 'Radio Telekomunikasi', 
                            'Sepatu Keselamatan', 'Pelampung / Life Vest', 'Tabung pernafasan',
                            'Kacamata', 'Sarung tangan karet', 'Earplug', 'Sarung tangan 20kV',
                            'Lain - lain'];
        
        $masterKeselamatan = ['Kotak P3K', 'Rambu Keselamatan', 'LOTO (lock out tag out)', 
                            'Radio Telekomunikasi', 'Lain - lain'];

        $masterKeselamatan = ['Kotak P3K', 'Rambu Keselamatan', 'LOTO (lock out tag out)', 
                            'Radio Telekomunikasi', 'Lain - lain'];

        $Klasifikasi = ['Pemasangan LBS/Recloser/FDI', 'Pemasangan kubikel 20KV', 'Pemeliharaan Kubikel', 
                        'Pengujian Relay Proteksi', 'Penggantian Relay Proteksi', 
                        'Pemasangan Power Meter', 'Pemasangan KWH Meter', 'Pemeliharaan RTU GH/GI', 
                        'Pemasangan Catu Daya', 'Pemasangan Radio Komunikasi', 'Pemeliharaan Radio Komunikasi', 'Sipil'];

        $Prosedur   =  ['Pemasangan dan Penggantian Cubicle 20 KV', 'Pemeliharaan Cubicle Gardu Hubung 20 KV', 'Pemasangan LBS dan RECLOSER', 
                        'Pemeliharaan RTU dan Peripheral', 'Pengujian Control Scada', 'Pemeliharaan Repeater Komunikasi',
                        'Perluasan Gardu Hubung 20 KV', 'Pengujian Alat', 'Pemasangan Proteksi'];                   

        $data = [
            'detailWp'          => $this->wpModel->getDetailWp($id_wp),
            'pelaksana_kerja'   => $this->wpModel->getPelaksanaKerja($id_wp),
            'tbl_hirarc'        => $this->wpModel->getHirarc($id_wp),
            'tbl_jsa'           => $this->wpModel->getJsa($id_wp),
            'peralatan'         => collect($this->wpModel->getPeralatan($id_wp)->pluck('description'))->toArray(),
            'peralatan1'         => array($this->wpModel->getPeralatan($id_wp)),
            'klasifikasi'       => $this->wpModel->getKlasifikasi($id_wp),
            'prosedur'          => $this->wpModel->getProsedur($id_wp),
            'mperalatan'        => $masterPeralatan,
            'mkesalamatan'      => $masterKeselamatan,
            'mklasifikasi'       => $Klasifikasi,
            'mprosedur'          => $Prosedur,
            'arraylist'        => array("Sepatu Keselamatan","on","Helm","Earplug","Sarung Tangan 20KV","Kotak P3K","Radio Telekomunikasi"),
            //'tempStatus'      => $sales->CheckTempId($temp_id),
            //'group'           => $v,
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

    public function getTemplateByUnit(Request $request, $idunit)
    {   
        $listTemplate = $this->wpModel->getTemplate($idunit)->pluck("nama_template", "id_template");
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
    
    public function create(Request $request)
    {
        $unit = Session::get('sel_unit');
        $data = [
            'getManager'  => $this->UserModel->getUser($unit, 4),
            'getSpv'      => $this->UserModel->getUser($unit, 5),
            'getPj'       => $this->UserModel->getUser($unit, 6),
            'unit_l3'     => $this->wpModel->getUnit_l3($unit),
            'up_name'     => $this->wpModel->getUnitName($unit)->UNIT_NAME,
        ];
        
        return view('wp/create', $data);
        
    }

    public function test(Request $request)
    {   
        //$unit = Session::get('sel_unit');
        $cd_unit = '6116';
        $year = date('y');
        $id_wp = '6116200031';
        //$new_id = $this->wpModel->generateWpId($unit . $year);
        //$unit = $this->wpModel->getUnitName($cd_unit)->UNIT_NAME;
        $unit = $this->wpModel->getDetailWp($id_wp);
        $idwp = '6116200031';
        // $peralatan = $this->wpModel->getPeralatan($id_wp);
        $klasifikasi = $this->wpModel->getKlasifikasi($id_wp);
        //PeralatanKeselamatan::where('id_wp', $idwp)->get();
        
        //return response()->json([$unit->UNIT_NAME]);
        return response()->json([$klasifikasi]);
    }
    
    public function wp_store(Request $request)
    {
        $unit = Session::get('sel_unit');
        $status = Session::get('sel_status');
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
            'id_wp'                 => $new_id,
            'unit'                  => $unit,
            'status'                => 'NEW',
            'nama_pekerjaan'        => $request->nama_pekerjaan,
            'pelaksana'             => $request->pelaksana,
            'alamat'                => $request->alamat,
            'nama_pj'               => $request->nama_pj,
            'jabatan'               => $request->jabatan,
            'no_telepon'            => $request->no_telepon,
            'tanda_tangan'          => $request->tanda_tangan,
            'status_pegawai'        => $request->status_pegawai,
            'ul_code'               => $request->ulp,
            'tgl_pengajuan'         => $request->tgl_pengajuan,
            'jenis_pekerjaan'       => $request->jenis_pekerjaan,
            'grounding'             => $request->grounding,
            'detail_pekerjaan'      => $request->detail_pekerjaan,
            'lokasi_pekerjaan'      => $request->lokasi_pekerjaan,
            'pemadaman'             => $request->pemadaman,
            'peralatan_dipadamkan'  => $request->peralatan_dipadamkan,
            'pengawas_pekerjaan'    => $request->pengawas_pekerjaan,
            'no_pengawas_pekerjaan' => $request->no_pengawas_pekerjaan,
            'pengawas_k3l'          => $request->pengawas_k3l,
            'no_pengawas_k3'        => $request->no_pengawas_k3l,
            'tgl_mulai'             => $request->tgl_mulai,
            'tgl_selesai'           => $request->tgl_selesai,
            'jam_mulai'             => $request->jam_mulai,
            'jam_selesai'           => $request->jam_selesai,
            'bpjs'                  => $request->bpjs,
            'sertifikat_kompetensi' => $request->sertifikat_kompetensi,
            'tenaga_ahli_k3'        => $request->tenaga_ahli_k3,
            'single_line_diagram'   => $request->single_line_diagram,
            'surat_penunjukan'      => $request->surat_penunjukan,
            'daftar_peralatan'      => $request->daftar_peralatan,
            'foto_lokasi_kerja'     => $request->foto_lokasi_kerja,
            'manager'               => $request->manager,
            'supervisor'            => $request->supervisor,
            'pejabat_k3l'           => $request->pejabat,
            'tgl_input'             => $request->tgl_input,
            'user_input'            => $request->user_input,
            'wp_desc'               => $status,
        ]);

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

    public function print_jsa(Request $request, $id_wp)
    {
        $masterPeralatan = ['Sarung Tangan Katun', 'Sarung Tangan Karet', 'Radio Telekomunikasi', 
                            'Sepatu Keselamatan', 'Pelampung / Life Vest', 'Tabung pernafasan',
                            'Kacamata', 'Sarung tangan karet', 'Earplug', 'Sarung tangan 20kV',
                            'Lain - lain'];
        
        $masterKeselamatan = ['Kotak P3K', 'Rambu Keselamatan', 'LOTO (lock out tag out)', 
                            'Radio Telekomunikasi', 'Lain - lain'];

        $masterKeselamatan = ['Kotak P3K', 'Rambu Keselamatan', 'LOTO (lock out tag out)', 
                            'Radio Telekomunikasi', 'Lain - lain'];

        $Klasifikasi = ['Pemasangan LBS/Recloser/FDI', 'Pemasangan kubikel 20KV', 'Pemeliharaan Kubikel', 
                        'Pengujian Relay Proteksi', 'Penggantian Relay Proteksi', 
                        'Pemasangan Power Meter', 'Pemasangan KWH Meter', 'Pemeliharaan RTU GH/GI', 
                        'Pemasangan Catu Daya', 'Pemasangan Radio Komunikasi', 'Pemeliharaan Radio Komunikasi', 'Sipil'];

        $Prosedur   =  ['Pemasangan dan Penggantian Cubicle 20 KV', 'Pemeliharaan Cubicle Gardu Hubung 20 KV', 'Pemasangan LBS dan RECLOSER', 
                        'Pemeliharaan RTU dan Peripheral', 'Pengujian Control Scada', 'Pemeliharaan Repeater Komunikasi',
                        'Perluasan Gardu Hubung 20 KV', 'Pengujian Alat', 'Pemasangan Proteksi'];

        $data = [
            'detailWp'          => $this->wpModel->getDetailWp($id_wp),
            'pelaksana_kerja'   => $this->wpModel->getPelaksanaKerja($id_wp),
            'tbl_hirarc'        => $this->wpModel->getHirarc($id_wp),
            'tbl_jsa'           => $this->wpModel->getJsa($id_wp),
            'peralatan'         => $this->wpModel->getPeralatan($id_wp),
            'klasifikasi'       => $this->wpModel->getKlasifikasi($id_wp),
            'prosedur'          => $this->wpModel->getProsedur($id_wp),
            'mperalatan'        => $masterPeralatan,
            'mkesalamatan'      => $masterKeselamatan,
            'mklasifikasi'       => $Klasifikasi,
            'mprosedur'          => $Prosedur,
            //'tempStatus'      => $sales->CheckTempId($temp_id),
            //'group'           => $v,
         ];
         
         return view('wp/print_jsa', $data,);

    }

    public function print_hirarc(Request $request, $id_wp)
    {
        $data = [
            'detailWp'          => $this->wpModel->getDetailWp($id_wp),
            'pelaksana_kerja'   => $this->wpModel->getPelaksanaKerja($id_wp),
            'tbl_hirarc'        => $this->wpModel->getHirarc($id_wp),
            'tbl_jsa'           => $this->wpModel->getJsa($id_wp),
            //'tempStatus'      => $sales->CheckTempId($temp_id),
            //'group'           => $v,
         ];
         
         return view('wp/print_hirarc', $data,);
    }
   
}