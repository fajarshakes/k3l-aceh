<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeralatanKeselamatan extends Model
{
    protected $table = 'peralatan_keselamatan';
    //public $timestamps = false;
    protected $fillable = ['id', 'id_master', 'id_wp', 'description'];
}
