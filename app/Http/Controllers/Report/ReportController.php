<?php

namespace App\Http\Controllers\Report;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Master;
use App\Models\Apar\AparModel;
use App\Models\Master\User;
use App\Models\Wp\WpModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;

class ReportController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        $this->AparModel     = new AparModel();
        $this->UserModel     = new User();
        $this->wpModel       = new WpModel();
    }
    
    public function apar(Request $request)
    {
        //$this->authorize('isPln');
        $myunit = Auth::user()->unit;
        if (Auth::user()->unit == '6101'){
            $unit = $this->wpModel->getUnit();
        } else {
            $unit = $this->wpModel->getMyUnit($myunit);
        }

        $data = [
            'unitList'          => $unit,        
        ];
        
        return view('report/apar', $data);
        
    }

    public function list_apar(Request $request)
    {
        
        if (!isset($_GET['unit'])){
            $unit = Auth::user()->unit;
            $add_conditions = 'AND pa.UL_CODE = ' . Auth::user()->unitap;
        } else {
            $getunit = $_GET['unit'];
            $getulp = $_GET['ulp'];
            
            if ($getunit == 6100){
                $unit = '61';
                $add_conditions = '';
            } else {
                $unit = $getunit;
                $add_conditions = 'AND pa.UL_CODE = ' . $getulp;
            }
        }

        $sql = "SELECT
                    pa.*
                FROM
                    peta_apar pa
                WHERE
                    pa.BUSS_AREA  like '%$unit%' AND
                    pa.STATUS = 'ACTIVE'
                    $add_conditions ";
        $v = DB::select($sql);
            
        return Datatables::of($v)
            ->addColumn('action', function($data){
                //$button = '<button type="button" name="edit" id="'.$data->ID_APAR.'" class="button1 btn btn-info btn-sm btn-icon"><i class="la la-external-link"></i> ACTION</button>';
                //$button .= '&nbsp;&nbsp;';
                $button = '<button type="button" name="qrcode" id="'.$data->ID_APAR.'" class="qrcode btn btn-success btn-sm btn-icon"><i class="la la-qrcode"></i> </button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function other(Request $request)
    {
        return view('report/other');
        
    }

    public function list(Request $request)
    {
        return view('dipa/list');
        
    }

    public function d_dipa(Request $request, $id)
    {
        return view('dipa/d_dipa');
        
    }

    public function revision(Request $request)
    {
        return view('dipa/revision');
        
    }
    
    public function edit(Request $request)
    {
        return view('dipa/edit');
        
    }

    public function user(Request $request)
    {
        $user = DB::table('users')
                    ->leftJoin('user_group', 'users.group_id', '=', 'user_group.id')
                    ->get();
        return view('master_data/user_index', ['user' => $user]);
        
    }

    public function user_store(Request $request)
    {
	// insert data ke table pegawai
	DB::table('users')->insert([
		'unit' => $request->unit,
		'group_id' => $request->group_id,
		'email' => $request->email,
		'password' => Hash::make('koperasi2019'),
		'name' => $request->name,
		'created_at' => date('Y-m-d'),
		'status' => 'ACTIVE'
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/master/user');
 
    }

    public function user_update(Request $request)
    {
        $category = Master::findOrFail($request->id);
        //$category->update($request->all());
        $category->update([
            'group_id' => $request->group_id,
            'name' => $request->name,
            'updated_at' => date('Y-m-d')
        ]);
       
        return back();
    }

    public function user_delete(Request $request)
    {
        $category = Master::findOrFail($request->id);
        //$category->update($request->all());
        $category->update([
            'status' => 'NOT_ACTIVE',
            'expired_at' => date('Y-m-d')
        ]);
       
        return back();
    }

    public function menu(Request $request)
    {
     // Fetch category
     $departmentData['data'] = Master::getCategory();
     
        return view('master_data/menu_index');
    }
    
    public function menu_datatables(Request $request)
    {
     $menu = DB::table('menu')
                    ->leftJoin('menu_category', 'menu.cat_cd', '=', 'menu_category.cat_cd')
                    ->get();

        if(request()->ajax())
        {
            $sql = "SELECT * FROM menu";
            $v = DB::select($sql);
            
            return Datatables::of($v)

            //return datatables()->of(($v)->get())
            //return datatables()->of(Master::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        //return view('master_data/menu_index', ['menu' => $menu]);
    }
    
    public function menu_update(Request $request)
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

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('images/pic_menu'), $new_name);

        $store = DB::table('menu')->insert([
        //$form_data = array(
            'menu_unit'         => '1000',
            'menu_status'       => '1',
            'menu_price'        => $request->price,
            'update_date'       => date('Y-m-d'),
            'update_by'         => 'admin',
            'image'             => $new_name,
            'menu_name'         => $request->name,
            'cat_cd'            => $request->catcd,
        ]);

        //AjaxCrud::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function menu_edit($id)
      
    {
        if(request()->ajax())
        {
            //$data = Master::get_manual($id);
            //$data = Master::findOrFail($request->id);
            //$data = Master::findOrFail($id);
            $data = DB::table('menu')
                    //->leftJoin('menu_category', 'menu.cat_cd', '=', 'menu_category.cat_cd')
                    ->where('id','=',$id)
                    //->first()
                    ->get();

        //return view('master_data/user_index', ['user' => $user]);
            return response()->json(['data' => $data]);
            //return response()'master_data/user_index', ['user' => $user]);

        }
    }

    public function menu_edit2()
    {
        $id = $_GET['id'];
        $data = DB::table('menu')
        ->where('id','=',$id)
        ->get();
        
        return response()->json(['data' => $data]);
    }

    public function menu_destroy($id)
    {

        $data = DB::table('menu')
                    //->leftJoin('menu_category', 'menu.cat_cd', '=', 'menu_category.cat_cd')
                    ->where('id','=',$id)
                    ->delete();
    }
    
    public function menu_store(Request $request)
    {  
        //request()->validate([
        //'name' => 'required',
        //'email' => 'required|email|unique:users',
        //'mobile_number' => 'required|unique:users'
        //]);
         
        $data = $request->all();
        //$check = Master::insert($data);

        $store = DB::table('menu')->insert([
            'menu_unit' => '1000',
            'menu_status' => '1',
            'menu_price' => $request->price,
            'update_date' => date('Y-m-d'),
            'update_by' => 'admin',
            //'image' => $request->menu_pic,
            'menu_name' => $request->name,
            'cat_cd' => $request->cat_cd,
        ]);


        $arr = array('msg' => 'Something goes to wrong. Please try again lator', 'status' => false);
        if($store){ 
        $arr = array('msg' => 'Successfully submit form using ajax', 'status' => true);
        }
        return Response()->json($arr);
       
    }
    
    public function account(Request $request)
    {
        return view('master_data/account_index');
        
    }
}
