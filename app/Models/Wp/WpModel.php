<?php

namespace App\Models\Wp;

use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class WpModel extends Model
{
    protected $table = 'working_permit';
    //public $timestamps = false;
    protected $fillable = ['name', 'group_id', 'updated_at', 'expired_at', 'status'];
    

  // Fetch unit
  public function getUnit(){

    $value=DB::table('master_unit')
    ->orderBy('BUSS_AREA', 'asc')
    ->where('STATUS', '=', '1')
    ->get(); 

    return $value;
  }

  public function getUnitName(string $buss_area){

    $value=DB::table('master_unit')
    ->select('UNIT_NAME')
    ->where('BUSS_AREA', '=', $buss_area)
    ->where('STATUS', '=', '1')
    ->get(); 

    return $value;
  }

  public function getUnitType(){

    $value=DB::table('master_unit_type')
    ->orderBy('UNIT_TYPE', 'asc')
    ->where('STATUS', '=', '1')
    ->get(); 

    return $value;
  }

  public function getGroupUnit(string $buss_area){

    $value=DB::table('users_group')
    ->join('master_unit', 'users_group.UNIT_LEVEL', '=', 'master_unit.UNIT_LEVEL')
    ->select('users_group.*')
    ->where('users_group.STATUS', '=', '1')
    ->where('master_unit.BUSS_AREA', '=', $buss_area)
    ->get();
    
    return $value;
  }
  
  public static function getCategory(){

    $value=DB::table('menu_category')
    ->orderBy('id', 'asc')
    ->where('cat_status', '=', '1')
    ->get(); 

    return $value;
  }

  public function getMaxWpId(string $prefixJenis)
    {
      return $this
      ->selectRaw("max(id_wp) as maxId")
      ->where("id_wp", "like", "$prefixJenis%")
      ->first();
            
    }

  public function generateWpId(string $prefixJenis)
    {
        $max = $this->getMaxWpId($prefixJenis)->maxId;
        $noUrut = (int) substr($max, 6, 4);

        return Common::generateIdbyUnit($prefixJenis, $noUrut);
    }

    public function getCatForMenu(){
      $unit = Auth::user()->unit;
      return DB::select("SELECT mc.cat_cd, mc.cat_text FROM menu_category mc
      WHERE mc.cat_unit = '$unit'");
  }
}



