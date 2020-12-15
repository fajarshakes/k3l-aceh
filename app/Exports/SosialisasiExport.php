<?php

namespace App\Exports;

use App\Sosialisasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class SosialisasiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $value = DB::table('peta_sosialisasi')->select('tanggal', 'unit','lokasi','judul','deskripsi','pic_sosialisasi')->get();
        return $value;
    }
}
