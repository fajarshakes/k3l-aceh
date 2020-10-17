<?php

namespace App\Models\Apar;

use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AparModel extends Model
{
    protected $table = 'peta_apar';
    //public $timestamps = false;
    protected $fillable = ['name', 'group_id', 'updated_at', 'expired_at', 'status'];


  public function getMaxGedungId(string $prefixJenis)
    {
      //return $value
      $value=DB::table('master_gedung')
      ->selectRaw("max(ID_GEDUNG) as maxId")
      ->where("ID_GEDUNG", "like", "$prefixJenis%")
      ->first();

      return $value;
      //return $value->maxId;
            
    }

  public function generateIdGedung(string $prefixJenis)
    {
        $max = $this->getMaxGedungId($prefixJenis)->maxId;
        $noUrut = (int) substr($max, 4, 2);

        return Common::generateId2Digit($prefixJenis, $noUrut);
    }
  
    public function list_gedung_ui(string $unit)
    {
      $value=DB::table('master_gedung')
      ->orderBy('ID_GEDUNG', 'asc')
      ->where('STATUS', '=', '1')
      ->where('BUSS_AREA', '=', $unit)
      //->where('UL_CODE', '=', $unitap)
      ->get(); 
  
      return $value;
    }
    
    public function list_gedung_byunit(string $unitap)
    {
      $value=DB::table('master_gedung')
      ->orderBy('ID_GEDUNG', 'asc')
      ->where('STATUS', '=', '1')
      //->where('BUSS_AREA', '=', $buss_area)
      ->where('UL_CODE', '=', $unitap)
      ->get(); 
  
      return $value;
    }
  
  public function getMaxLantaiId(string $prefixJenis)
    {
      //return $value
      $value=DB::table('master_gedung_detail')
      ->selectRaw("max(ID_LANTAI) as maxId")
      ->where("ID_GEDUNG", "like", "$prefixJenis%")
      ->first();

      return $value;
      //return $value->maxId;
            
    }

  public function generateIdLantai(string $prefixJenis)
    {
        $max = $this->getMaxLantaiId($prefixJenis)->maxId;
        $noUrut = (int) substr($max, 6, 2);

        return Common::generateId2Digit($prefixJenis, $noUrut);
    }

  public function getLantai(string $idgedung)
    {

      $value=DB::table('master_gedung_detail')
      ->join('master_gedung', 'master_gedung_detail.ID_GEDUNG', '=', 'master_gedung.ID_GEDUNG')
      ->select('master_gedung_detail.*')
      ->where('master_gedung_detail.STATUS', '=', '1')
      ->where('master_gedung_detail.ID_GEDUNG', '=', $idgedung)
      ->get();
      
      return $value;
    }

  public function getMaxAparId(string $prefixJenis)
    {
      //return $value
      $value=DB::table('peta_apar')
      ->selectRaw("max(ID_APAR) as maxId")
      ->where("ID_APAR", "like", "$prefixJenis%")
      ->first();

      return $value;
      //return $value->maxId;
            
    }

  public function generateIdApar(string $prefixJenis)
    {
        $max = $this->getMaxAparId($prefixJenis)->maxId;
        $noUrut = (int) substr($max, 7, 4);

        return Common::generateId4Digit($prefixJenis, $noUrut);
    }
  
  public static function getDetailByID(string $id){

      $value=DB::table('peta_apar')
      ->join('master_gedung', 'peta_apar.ID_GEDUNG', '=', 'master_gedung.ID_GEDUNG')
      ->join('master_gedung_detail', 'peta_apar.ID_LANTAI', '=', 'master_gedung_detail.ID_LANTAI')
      ->select('peta_apar.*', 'master_gedung.NAMA_GEDUNG', 'master_gedung_detail.NAMA_LANTAI')
      ->where('ID_APAR', '=', $id)
      ->first();
  
      return $value;
    }
  
  

}



