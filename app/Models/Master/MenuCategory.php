<?php

namespace App\Models\Master;

use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class MenuCategory extends Model
{
    protected $table = 'menu_category';
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
  
  public static function getCategory(){

    $value=DB::table('menu_category')
    ->orderBy('id', 'asc')
    ->where('cat_status', '=', '1')
    ->get(); 

    return $value;
  }

  public function getMaxCatId(string $prefixJenis)
    {
      
      return $this
      ->selectRaw("max(cat_cd) as maxId")
      ->where("cat_cd", "like", "$prefixJenis%")
      ->first();
            
    }

  public function generateCatId(string $prefixJenis)
    {
        $max = $this->getMaxCatId($prefixJenis)->maxId;
        $noUrut = (int) substr($max, 4, 3);

        return Common::generateIdbyUnit($prefixJenis, $noUrut);
    }

    public function getCatForMenu(){
      $unit = Auth::user()->unit;
      return DB::select("SELECT mc.cat_cd, mc.cat_text FROM menu_category mc
      WHERE mc.cat_unit = '$unit'");
  }
}



