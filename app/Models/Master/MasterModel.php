<?php

namespace App\Models\Master;

use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class MasterModel extends Model
{
    protected $table = 'menu_category';
    //public $timestamps = false;
    protected $fillable = ['name', 'group_id', 'updated_at', 'expired_at', 'status'];
    
    
    public function getVendorDet(string $id){

      $value=DB::table('master_vendor')
      ->select('*')
      ->where('ID', '=', $id)
      ->first();
      
      return $value;
    }

    public function getRecepient(string $name){

      $value=DB::table('users')
      ->where('name', '=', $name)
      ->where('status', '=', 'ACTIVE')
      ->first(); 
  
      return $value;
    }

}



