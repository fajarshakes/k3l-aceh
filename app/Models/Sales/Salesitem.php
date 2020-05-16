<?php

namespace App\Models\Sales;

use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Salesitem extends Model
{
    protected $table = ['orders_item'];
    //public $timestamps = false;
    //protected $fillable = ['name', 'group_id', 'updated_at', 'expired_at', 'status'];


  public function deleteByid(string $id){
    $value = DB::table('orders_item')
                  //->select(DB::raw('*'))
                  ->where('id', '=', $id)
                  //->groupBy('status')
                  ->delete();
    
    return $value;
  }

  public function findById(string $id){
    $value = DB::table('orders_item')
                  //->select(DB::raw('*'))
                  ->where('id', '=', $id)
                  ->first();
    
    return $value;
  }
  
  public function findOrdersItem(string $unit, $menu_id, $status, $temp_id){
    $value = DB::table('orders_item')
                  //->select(DB::raw('*'))
                  ->where('unit', '=', $unit)
                  ->where('menu_id', '=', $menu_id)
                  ->where('status', '!=', $status)
                  ->where('orders_id', '=', $temp_id)
                  ->first();
    
    return $value;
  }
    
}



