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

  public function getUnit_l3(string $buss_area){

    $value=DB::table('master_unit_l3')
    ->orderBy('UL_CODE', 'asc')
    ->where('STATUS', '=', '1')
    ->where('BUSS_AREA', '=', $buss_area)
    ->get(); 

    return $value;
  }

  public function XgetUnitName(string $buss_area){

    $value=DB::table('master_unit')
    ->select('UNIT_NAME')
    ->where('BUSS_AREA', '=', $buss_area)
    ->where('STATUS', '=', '1')
    ->get(); 

    return $value;
  }

  public function getUnitName(string $buss_area){

    $value=DB::table('master_unit')
    ->select('UNIT_NAME')
    ->where('BUSS_AREA', '=', $buss_area)
    ->where('STATUS', '=', '1')
    ->first(); 

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
  
  public static function getDetailWp(string $id_wp){

    $value=DB::table('working_permit')
    ->where('id_wp', '=', $id_wp)
    ->first();

    return $value;
  }

  public static function getPelaksanaKerja(string $id_wp){

    $value=DB::table('pelaksana_pekerjaan')
    ->where('id_wp', '=', $id_wp)
    ->get();

    return $value;
  }

  public static function getHirarc(string $id_wp){

    $value=DB::table('tbl_hirarc')
    ->where('id_wp', '=', $id_wp)
    ->get();

    return $value;
  }

  public static function getJsa(string $id_wp){

    $value=DB::table('tbl_jsa')
    ->where('id_wp', '=', $id_wp)
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


  public function getMaxWpTemplate(string $comp_code)
    {
      //return $this
      $value=DB::table('working_permit_template')
      ->selectRaw("max(id_template) as maxId")
      ->where("id_template", "like", "$comp_code%")
      ->first();

      return $value;
            
    }

  public function generateTemplateId(string $comp_code)
  {
      $max = $this->getMaxWpTemplate($comp_code)->maxId;
      $noUrut = (int) substr($max, 4, 4);

      return Common::generateId4Digit($comp_code, $noUrut);
  }

  public function getCatForMenu(){
      $unit = Auth::user()->unit;
      return DB::select("SELECT mc.cat_cd, mc.cat_text FROM menu_category mc
      WHERE mc.cat_unit = '$unit'");
  }

  public function getTemplate(string $idunit)
  {

    $value=DB::table('working_permit_template')
    ->join('master_unit', function ($join) {
      $join->on('working_permit_template.comp_code', '=', 'master_unit.COMP_CODE'); //perlu perbaikan
           //->where('working_permit_template.jenis_template', '=', 'master_unit.UNIT_TYPE');
      })
    ->select('working_permit_template.id_template', 'working_permit_template.nama_template', 'master_unit.UNIT_TYPE')
    ->where('master_unit.BUSS_AREA', '=', $idunit)
    ->get();
    
    return $value;
  }

}



