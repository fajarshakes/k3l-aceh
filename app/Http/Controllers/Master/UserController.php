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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        $this->menu        = new User();
        $this->menuCat     = new UserCategory();
    }

    public function user(Request $request)
    {
        $unitData  = $this->menuCat->getUnit();
        return view('master_data/user_index',
            ['unitData' => $unitData]);
    }
    
    public function test(Request $request)
    {   
        
        $unitData  = $this->menuCat->getUnit(); 
        
        return response()->json([$unitData]);
    }

    public function getGroupUser(Request $request, $buss_area)
    {   
        $unitGroup  = $this->menuCat->getGroupUnit($buss_area)->pluck("GROUP_NAME", "ID");; 
        return json_encode($unitGroup);
    }
    
    public function user_datatables(Request $request)
    {
        //$unit = Auth::user()->unit;
        $sql = "SELECT
                    us.id, us.email, us.name, us.pers_no, us.position_desc,
                    mu.UNIT_NAME,
                    ug.GROUP_NAME 
                FROM
                    users us
                    LEFT JOIN master_unit mu ON us.unit = mu.BUSS_AREA
                    LEFT JOIN users_group ug ON us.group_id = ug.ID
                WHERE
                    us.STATUS = 'ACTIVE'";
        $v = DB::select($sql);
            
        return Datatables::of($v)

            //return datatables()->of(($v)->get())
            //return datatables()->of(Master::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="la la-pencil-square"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="la la-trash-o"></i> Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        //}
        //return view('master_data/menu_index', ['menu' => $menu]);
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

    public function user_store(Request $request)
    {
        $rules = array(
            'email'         =>  'required|email',
            'name'          =>  'required',
            'pers_no'       =>  'required',
            'unit_id'       =>  'required',
            'user_group'    =>  'required',
            'jabatan'    =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $username = explode("@", $request->email);
        $store = DB::table('users')->insert([
        //$form_data = array(
            //'unit'              => Auth::user()->unit,
            'unit'              => $request->unit_id,
            'username'          => $username[0],
            'name'              => $request->fullname,
            'pers_no'           => $request->pers_no,
            'email'             => $request->email,
            'group_id'          => $request->user_group,
            'position_desc'     => $request->jabatan,
            'password'          => Hash::make('Qwerty@4321'),
            'name'              => $request->name,
            'created_at'        => date('Y-m-d'),
            'status'            =>'ACTIVE',
        ]);

        //AjaxCrud::create($form_data);
        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function c_menu_store(Request $request)
    {
        $catId         = $this->menuCat->generateCatId(Auth::user()->unit);
        $rules = array(
            'cname'         =>  'required',
            'cstatus'       =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $store = DB::table('menu_category')->insert([
            'cat_unit'         => Auth::user()->unit,
            'cat_cd'           => $catId,
            'cat_text'         => $request->cname,
            'cat_status'       => $request->cstatus,
            'update_date'      => date('Y-m-d'),
            'update_by'        => Auth::user()->email,
        ]);
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
