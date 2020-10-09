<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Master\User;
use App\Models\Master\MasterModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;

class ProfileController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        $this->Model       = new User();
        $this->ModelMaster = new MasterModel();
    }

    public function index(Request $request)
    {
        $myId = Auth::user()->id;
        $group_id = Auth::user()->group_id;
        $pers_no = Auth::user()->pers_no;

        if ($group_id == 7){
            $detVendor   = $this->ModelMaster->getVendorDet($pers_no);
        } else {
            $detVendor   = '';
        }

        $data = [
            'userdata'   => $this->Model->get_userdata($myId),                      
            'vendordata' => $detVendor,              
         ];
         
        return view('profile/profile', $data);
        
    }

    public function update_company(Request $request)
    {
        $company_id = $request->company_id;

        $rules = array(
            'address' =>  'required',
            'pic_name' =>  'required',
            'pic_position' =>  'required',
            'pic_contact' =>  'required',
        );

        $messages = [
            'address.required' => 'Alamat Harus diisi .!',
            'pic_name.required' => 'Nama PIC Harus diisi .!',
            'pic_position.required' => 'Jabatan PIC Harus diisi .!',
            'pic_contact.required' => 'Kontak PIC Harus diisi .!',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        /*
        if ($wp_desc == 'NORMAL' && $unitap_wp != $unitap)
        {
            return response()->json(['errors' => 'Diluar otoritas approval unit.!']);
        } else if  (($wp_desc == 'EMERGENCY' && $group_id != 3))
        {
            return response()->json(['errors' => 'Diluar otoritas approval unit.!']);
        }
        */
        

        $update = DB::table('master_vendor')
        ->where('ID', $company_id)
        ->update([
            'ADDRESS'       => $request->address,
            'PIC_NAME'      => $request->pic_name,
            'PIC_POSITION'  => $request->pic_position,
            'PIC_PHONE'     => $request->pic_contact,
        ]);

        return redirect('/profile') -> with('status', 'Data Berhasil Diupdate .!');

    }
    
}
