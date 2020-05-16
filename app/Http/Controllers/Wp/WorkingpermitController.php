<?php

namespace App\Http\Controllers\Wp;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Master;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;

class WorkingpermitController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard(Request $request)
    {
        return view('planning/upload');
        
    }

    public function list_rka(Request $request)
    {
        return view('planning/list_rka');
        
    }

    public function review_spi(Request $request)
    {
        return view('planning/review_spi');
        
    }

    public function rekap_usulan(Request $request)
    {
        return view('planning/rekap_usulan');
        
    }

    public function d_usulan(Request $request, $id_usulan)
    {
        return view('planning/d_usulan');
        
    }

    public function review_ditjen(Request $request)
    {
        return view('planning/review_ditjen');
        
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
