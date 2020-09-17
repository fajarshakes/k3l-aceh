<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apar extends Model
{
    protected $table = "peta_apar";

    protected $fillable = ['id_apar','lokasi_apar','merk','type'];
}
