<?php

namespace App\Http\Controllers\Master;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Master\User;
use App\Models\Master\UserCategory;
use App\Models\Master\MasterModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;

class VendorController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        $this->menu        = new User();
        $this->menuCat     = new UserCategory();
        $this->Master      = new MasterModel();
    }

    public function vendor(Request $request)
    {
        $unitData  = $this->menuCat->getUnit();
        $url = "http://localhost:1000/api/vendor_list.php";
        $json = json_decode(file_get_contents($url), true);
    

        $data = [
            'vendor_json'  => $json['vendorData'],
            'unitData'      => $unitData,
        ];
        
        return view('master_data/vendor_index', $data);
    }
    
    public function api_vendor_detail(Request $request, $buss_area)
    {   
        $url = "http://localhost:1000/api/vendor_detail.php?id=$buss_area";
        $json = json_decode(file_get_contents($url), true);

        return $json;
        
    }

    public function get_vendor_detail(Request $request, $id)
    {   
        $data  = $this->Master->getVendorDet($id);
        return json_encode($data);
        
    }

    
    public function test(Request $request)
    {   
        
        $unitData  = $this->menuCat->getUnit(); 
        $url = "http://localhost:1000/api/vendor_list.php";
        $json = json_decode(file_get_contents($url), true);

        
        
        return response()->json([$json]);
        //return json_encode($json);
        //return $json;
        //return json_encode($json);
        
    }

    public function getGroupUser(Request $request, $buss_area)
    {   
        //$unitGroup  = $this->menuCat->getGroupUnit($buss_area);
        $unitGroup  = $this->menuCat->getGroupUnit($buss_area)->pluck("GROUP_NAME", "ID");
        return json_encode($unitGroup);
    }
    
    public function vendor_datatables(Request $request)
    {
        $comp_code = Auth::user()->comp_code;
        $sql = "SELECT
                    *
                FROM
                    master_vendor
                WHERE
                    COMP_CODE = '$comp_code'";
        $v = DB::select($sql);
            
        return Datatables::of($v)
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->ID.'" class="edit btn btn-primary btn-sm"><i class="la la-pencil-square"></i> Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->ID.'" class="delete btn btn-danger btn-sm"><i class="la la-trash-o"></i> Delete</button>';
                return $button;
                })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function c_menu_datatables(Request $request)
    {
        if(request()->ajax())
        {
            $unit = Auth::user()->unit;
            $sql = "SELECT * FROM menu_category
                    WHERE cat_unit = '$unit'
                    AND cat_status != '0'";
            $v = DB::select($sql);
            
            return Datatables::of($v)

            //return datatables()->of(($v)->get())
            //return datatables()->of(Master::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="c_edit btn btn-primary btn-sm"><i class="la la-pencil-square"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="c_delete btn btn-danger btn-sm"><i class="la la-trash-o"></i> Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

    }

    public function vendor_store(Request $request)
    {
        $rules = array(
            'email'          =>  'required|email',
            'alamat'         =>  'required',
            'pic_name'       =>  'required',
            'pic_position'   =>  'required',
            'pic_contact'    =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $username = explode("@", $request->email);
        $store1 = DB::table('master_vendor')->insert([
            'COMP_CODE'      => Auth::user()->comp_code,
            'SAP_NO'         => $request->nosap,
            'VENDOR_NAME'    => $request->nama_perusahaan,
            'SIPAT_ID'       => $request->nosipat,
            'ADDRESS'        => $request->alamat,
            'PIC_NAME'       => $request->pic_name,
            'PIC_POSITION'   => $request->pic_position,
            'PIC_PHONE'      => $request->pic_contact,
            'EMAIL'          => $request->email,
            'CREATED_AT'     => date('Y-m-d'),
            'CREATED_BY'     => Auth::user()->username,
            ]);

        $lastid = DB::getPdo()->lastInsertId();
            
        $store2 = DB::table('users')->insert([
            'comp_code'         => Auth::user()->comp_code,
            'unit'              => Auth::user()->unit,
            'username'          => $username[0],
            'name'              => $request->nama_perusahaan,
            'pers_no'           => $lastid,
            'email'             => $request->email,
            'group_id'          => 7,
            'position_desc'     => 'ADMIN PERUSAHAAN',
            'password'          => Hash::make('Vendor@4321'),
            'created_at'        => date('Y-m-d'),
            'created_by'        => Auth::user()->username,
            'status'            => 'ACTIVE',
        ]);

        

        //AjaxCrud::create($form_data);
        return response()->json(['success' => 'Data Added successfully.']);
    }

   

    public function user_update(Request $request)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $rules = array(
                'name'          =>  'required',
                'catcd'         =>  'required',
                'image'         =>  'required|image|max:2048'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/pic_menu'), $image_name);
        }
        else
        {
            $rules = array(
                'name'          =>  'required',
                'catcd'         =>  'required',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $update = DB::table('menu')
        ->where('id', $request->hidden_id)
        ->update([
        //$form_data = array(
            'menu_price'        => str_replace(".", "", $request->price),
            'update_date'       => date('Y-m-d'),
            'update_by'         => Auth::user()->email,
            'image'             => $image_name,
            'menu_name'         => $request->name,
            'cat_cd'            => $request->catcd,
        ]);
        
        //AjaxCrud::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function get_userdata()
    {
        $id = $_GET['id'];
        $data = DB::table('users')
        ->join('master_unit', 'users.unit', '=', 'master_unit.BUSS_AREA')
        ->join('users_group', 'users.group_id', '=', 'users_group.ID')
        ->select('users.unit', 'users.email', 'users.name', 'users.pers_no', 'users.position_desc', 'users.group_id', 'users_group.GROUP_NAME')
        ->where('users.id','=',$id)
        ->get();
        
        return response()->json(['data' => $data]);
    }

    public function menu_destroy(Request $request)
    {
        $data = DB::table('menu')
        ->where('id', $request->del_hidden_id)
        //->leftJoin('menu_category', 'menu.cat_cd', '=', 'menu_category.cat_cd')
        //->where('id','=',$id)
        ->update([
            'update_date'       => date('Y-m-d'),
            'update_by'         => Auth::user()->email,
            'menu_status'       => '0',
        ]);
        return response()->json(['success' => 'Data is successfully deleted']);
    }

}
