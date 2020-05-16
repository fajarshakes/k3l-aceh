<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Master extends Model
{
    protected $table = 'users';
    //public $timestamps = false;
    protected $fillable = ['name', 'group_id', 'updated_at', 'expired_at', 'status'];
    
    public function get_manual(string $id)
    {
        //return $this;
        $menu = DB::table('menu')
                ->where('id','=',$id)
                ->first();
        //$data = DB::select("SELECT * FROM menu WHERE id = $id");

        return $menu;
    }

    // Fetch departments
   public static function getCategory(){

    $value=DB::table('menu_category')->orderBy('id', 'asc')->get(); 

    return $value;
  }
}

