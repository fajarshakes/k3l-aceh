<?php

namespace App\Exports;

use App\Apar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class AparExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $value = DB::table('peta_apar')->select('id_apar', 'lokasi_apar','merk','type','kapasitas','tgl_expired')->get();
        return $value;
    }
}
