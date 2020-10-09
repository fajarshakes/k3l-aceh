<?php

namespace App\Models\Master;

use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class User extends Model
{
    protected $table = 'menu';
    //public $timestamps = false;
    protected $fillable = ['name', 'group_id', 'updated_at', 'expired_at', 'status'];

    public function getMenuActive($unit){
      return collect(DB::select("SELECT mn.id AS idmenu, mc.cat_text AS mngroup, mn.menu_name, mn.menu_price
      FROM menu mn
      LEFT JOIN menu_category mc ON mn.cat_cd = mc.cat_cd
      WHERE mn.menu_status = '1'
      GROUP BY
      mn.cat_cd"))
      ->keyBy("cat_cd");
  }


    
    public static function getMenuActive_x($unit){
      $q = DB::table('menu')
      ->selectRaw("menu.id AS idmenu, menu_category.cat_cd as mncategory, menu_category.cat_text AS mngroup, menu.menu_name, menu.menu_price, menu.discount_status, menu.discount_price,
                  menu.image")
      ->leftJoin("menu_category", "menu.cat_cd","=","menu_category.cat_cd")
      ->where("menu.menu_unit", "=", Auth::user()->unit)
      ->where("menu.menu_status", "=", '1')
      ->get();

      return $q;
    
    }

  public function getUser($unit, $group){

    $value=DB::table('users')
    ->orderBy('name', 'asc')
    ->where('unit', '=', $unit)
    ->where('group_id', '=', $group)
    ->get(); 

    return $value;
  }

  public function getUser_byap(string $unitap, $group){

    $value=DB::table('users')
    ->orderBy('name', 'asc')
    ->where('unitap', '=', $unitap)
    ->where('group_id', '=', $group)
    ->get(); 

    return $value;
  }

  public function get_userdata(string $id)
    {
        $value = DB::table('users')
        ->join('master_unit', 'users.unit', '=', 'master_unit.BUSS_AREA')
        ->join('users_group', 'users.group_id', '=', 'users_group.ID')
        ->select('users.*', 'users_group.GROUP_NAME', 'master_unit.UNIT_NAME')
        ->where('users.id','=',$id)
        ->first();
        
        return $value;
    }
    
}





