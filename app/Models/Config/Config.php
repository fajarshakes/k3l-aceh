<?php

namespace App\Models\Config;

use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Config extends Model
{
    protected $table = 'menu_category';
    protected $fillable = ['name', 'group_id', 'updated_at', 'expired_at', 'status'];
    

  public function GetTax()
    {
      $unit = Auth::user()->unit;

      $q = DB::table('config_unit')
      ->select("tax_amount as tax")
      //->leftJoin("menu_category", "menu.cat_cd","=","menu_category.cat_cd")
      //->where("menu.menu_unit", "=", Auth::user()->unit)
      ->where("unit", "=", $unit)
      ->get();

      return $q;
            
    }

    public function GetTax_(){
      $unit = Auth::user()->unit;
      return DB::select("SELECT tax_amount, tax_status FROM config_unit
      WHERE status = '1' and unit = '$unit'");
  }

  public static function GetConfig_tax($unit){

    $value=DB::table('config_unit')
    ->orderBy('id', 'asc')
    ->where('unit', '=', $unit)
    ->where('tax_status', '=', '1')
    //->where('status', '=', $order_status)
    ->first(); 

    return $value;
  }

  public static function GetConfig_disc($unit){

    $value=DB::table('config_unit')
    ->orderBy('id', 'asc')
    ->where('unit', '=', $unit)
    ->where('discount_status', '=', '1')
    //->where('status', '=', $order_status)
    ->first(); 

    return $value;
  }
}



