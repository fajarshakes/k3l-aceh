<?php

namespace App\Models\Sales;

use App\Helper\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sales extends Model
{
    protected $table = ['orders', 'orders_item'];
    //public $timestamps = false;
    protected $fillable = ['name', 'group_id', 'updated_at', 'expired_at', 'status'];

    public function checkPeriod(string $unit)
    {
        $value = DB::table('transaction')
          ->where('unit', '=', $unit)
          ->where('status', '=', '00')
          ->first();
        
        return $value;

    }
    
    public static function getAll($unit, $order_status, $temp_id){

        $value=DB::table('orders_item')
        ->select("orders_item.*")
        ->leftJoin("orders_temp", "orders_item.orders_id","=","orders_temp.orders_id")
        ->orderBy('orders_item.id', 'asc')
        ->where('orders_item.unit', '=', $unit)
        ->where('orders_item.status', '!=', $order_status)
        ->where('temp_id', '=', $temp_id)
        ->get(); 
    
        return $value;
      }

    public function getSalesById(string $id){

      $value = DB::table('orders_item')
                  //->select(DB::raw('*'))
                  ->where('id', '<>', $id)
                  //->groupBy('status')
                  ->get();
      
      return $value;          
      }

    public function getMaxId(string $prefixJenis)
      {
        //return $this;
        $value = DB::table('orders_item')
        //return $this
        ->selectRaw("max(orders_id) as maxId")
        ->where("orders_id", "like", "$prefixJenis%")
        ->first();

        return $value;
      }

    public function generateOdrId(string $prefixJenis)
    {
        $max = $this->getMaxId($prefixJenis)->maxId;
        $noUrut = (int) substr($max, 4, 5);

        return Common::generateOdrIdbyUnit($prefixJenis, $noUrut);
        //return $noUrut;
    }

    public function getMaxTemp(string $prefixJenis)
      {
        //return $this;
        $value = DB::table('orders_temp')
        //return $this
        ->selectRaw("max(temp_id) as maxId")
        ->where("temp_id", "like", "$prefixJenis%")
        ->first();

        return $value;
      }
    

    public function getMaxTempId(string $prefixJenis)
    {
        $max = $this->getMaxTemp($prefixJenis)->maxId;
        $noUrut = (int) substr($max, 4, 5);

        return Common::generateTempIdbyUnit($prefixJenis, $noUrut);
        //return $noUrut;
    }

    public function CheckTempId(string $temp_id)
    {
        $value = DB::table('orders_temp')
        ->selectRaw("orders_id, table_no")
        ->where("temp_id", "=", "$temp_id")
        ->first();

        return $value;
      }

    public function CheckStatusOrder(string $temp_id, $raw)
      {
          $value = DB::table('orders_item')
            ->leftJoin('orders_temp', 'orders_item.orders_id', '=', 'orders_temp.orders_id')
            //->leftJoin('answers', 'answer_question_survey.answer_id', '=', 'answers.id')
            ->selectRaw("orders_item.orders_id, orders_item.status, orders_item.table_no")
            ->where("orders_temp.temp_id", "=", "$temp_id")
            ->where("orders_item.id", "=", "$raw")
            ->first();  

          return $value;
      }

    public function getOrdersId(string $temp_id)
      {
        $value = DB::table('orders_item')
          ->leftJoin('orders_temp', 'orders_item.orders_id', '=', 'orders_temp.orders_id')
          ->selectRaw("orders_item.orders_id, orders_item.status, orders_item.table_no, orders_temp.datetime")
          ->where("orders_temp.temp_id", "=", "$temp_id")
          ->first();  
          return $value;
      }
    
    public function getConfigUnit(string $unit)
      {
        //return $this;
        $value = DB::table('config_unit')
        //return $this
        ->selectRaw("*")
        ->where("unit", "=", "$unit")
        ->first();

        return $value;
      }
    
    public function getPaymentMethod(string $method)
    {
        //$data = $this->getConfigUnit($unit)->payment_method;
        $data =  str_replace("'", '', $method);
        $data1 = json_decode($method, TRUE);

        $value = DB::table('payment_method')
          ->where('payment_status', '=', '1')
          //->whereIn('payment_id', array($data))
          ->whereIn('payment_id', [01,02,03,04])
          ->get();
        //$users = DB::table('payment_method')->whereIn('payment_id', array($method))->get();

        return $value;
        //return $data;
    }

    public function del_orders_temp(string $pathid)
    {
        $value = DB::table('orders_temp')
          ->where('temp_id', '=', $pathid)
          ->delete();
    }

    public function upd_orders_item(string $orders_id, $orders_status)
    {
        $value = DB::table('orders_item')
          ->where('orders_id', '=', $orders_id)
          ->update(['status' => $orders_status]);
    }

    public function getClosedOrder(string $period, $unit)
    {
        $value = DB::table('orders')
          ->where('status', '=', '01')
          ->where('unit', '=', $unit)
          ->where('period_date', '=', $period)
          ->get();
        
          return $value;
    }

    public function getActiveOrder(string $period, $unit, $status){

      $value = DB::table('orders_temp')
          //->where('status', '!=', $status)
          ->where('unit', '=', $unit)
          ->where('period_date', '=', $period)
          ->get();
  
      return $value;
    }
    
}