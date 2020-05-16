<?php

namespace App\Http\Controllers\Master;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Master\Menu;
use App\Models\Master\MenuCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;

class MenuController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        $this->menu        = new Menu();
        $this->menuCat     = new MenuCategory();
    }

    public function menu(Request $request)
    {
     // Fetch category
     $categoryData  = MenuCategory::getCategory();    
     return view('master_data/menu_index',['categoryData' => $categoryData]);
    }
    
    public function menu_datatables(Request $request)
    {
        //if(request()->ajax())
        //{
            $unit = Auth::user()->unit;
            $sql = "SELECT
                    mn.*,
                    mc.cat_text 
                FROM
                    menu mn
                    LEFT JOIN menu_category mc ON mn.cat_cd = mc.cat_cd
                WHERE mn.menu_status != '0'
                AND mn.menu_unit = '$unit'
                GROUP BY
                    mn.id";
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

    public function menu_store(Request $request)
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
            'menu_unit'         => Auth::user()->unit,
            'menu_status'       => '1',
            'menu_price'        => str_replace(".", "", $request->price),
            'update_date'       => date('Y-m-d'),
            'update_by'         => Auth::user()->email,
            'image'             => $new_name,
            'menu_name'         => $request->name,
            'cat_cd'            => $request->catcd,
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

    public function menu_update(Request $request)
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

    public function c_menu_update(Request $request)
    {
        $rules = array(
            'cname'         =>  'required',
            'cstatus'       =>  'required',
        );
        
        $error = Validator::make($request->all(), $rules);
        
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        $update = DB::table('menu_category')
        ->where('id', $request->chidden_id)
        ->update([
            'cat_text'         => $request->cname,
            'cat_status'       => $request->cstatus,
            'update_date'      => date('Y-m-d'),
            'update_by'        => Auth::user()->email,
        ]);

        return response()->json(['success' => 'Data is successfully updated']);
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


    public function menu_edit_c()
    {
        $id = $_GET['id'];
        $data = DB::table('menu_category')
        ->where('id','=',$id)
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

    public function c_menu_destroy(Request $request)
    {
        $data = DB::table('menu_category')
        ->where('id', $request->del_hidden_id)
        //->leftJoin('menu_category', 'menu.cat_cd', '=', 'menu_category.cat_cd')
        //->where('id','=',$id)
        ->update([
            'update_date'       => date('Y-m-d'),
            'update_by'         => Auth::user()->email,
            'cat_status'        => '0',
        ]);
        return response()->json(['success' => 'Data is successfully deleted']);
    }

}
