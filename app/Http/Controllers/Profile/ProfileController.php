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
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;
use Mail; 

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

    public function generate_token(Request $request)
    {
        $id = $request->id_user;
        $userdata   = $this->Model->get_userdata($id);
        //$token = str_random(60);
        $token = rand(000000, 999999);

        $update = DB::table('users')
        ->where('id', $id)
        ->update([
            'token'             => $token,
            'token_created_at'  => Carbon::now()
        ]);

        try{
            Mail::send('mailbody/generate_token', [
                'nama_penerima' => $userdata->name,
                'uraian' => $token,
            ],
            function ($message) use ($userdata)
            {
                $message->subject('PERMINTAAN PERUBAHAN PASSWORD');
                $message->from('noreply@plnaceh.id');
                $message->to($userdata->email);
                $message->cc('FACHRULRAZI.ACH@GMAIL.COM');
            });
            return response()->json(['success' => 'Token berhasil dikirim ke email.']);
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }

    }

    public function change_password(Request $request)
    {
        $id_user = $request->id_user;
        $token   = $request->token;

        $rules = array(
            'token' =>  'required|min:6|numeric',
            'password' => [
                'required',
                'string',
                'min:6',             // must be at least 6 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&_]/', // must contain a special character
            ],
            'password_confirmation' => 'required_with:password|same:password|min:6'

        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        $check_token   = $this->Model->check_token($id_user);
        if ($check_token->token != $token)
        {
            return response()->json(['errors' => ["Token tidak sesuai.!"],["$check_token->token"] ]);
        }

        $update = DB::table('users')
        ->where('id', $id_user)
        ->update([
            'password'      => Hash::make($request->password),
            'token'         => null,
            'token_created_at'  => null,
            'token_expired_at'  => null,
        ]);

        //return redirect('/profile') -> with('status', 'Data Berhasil Diupdate .!');
        return response()->json(['success' => 'Perubahan password sukses.']);
    }
    
}
