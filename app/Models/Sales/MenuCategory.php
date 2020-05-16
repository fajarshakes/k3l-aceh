<?php

namespace App\Models\Master;

use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class MenuCategory extends Model
{
    protected $table = 'menu_category';
    //public $timestamps = false;
    protected $fillable = ['name', 'group_id', 'updated_at', 'expired_at', 'status'];
    

    // Fetch departments
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
}



