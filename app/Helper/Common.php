<?php

namespace App\Helper;

use App\Models\Master\Periode;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
//use Litipk\BigNumbers\Decimal;
//use PhpOffice\PhpSpreadsheet\Shared\Date;

class Common {
    /**
     * generate id by nourut dan prefixjenis
     * @param $prefixJenis
     * @param $noUrut
     * @return string
     */
    static function idFromGET(){
        return self::idFromArray('id', $_GET);
    }
    
    static function generateId($prefixJenis, $noUrut){
        $noUrut++; // TODO : be careful for collision
        $newId = $prefixJenis . sprintf("%05s", $noUrut);
        $random = rand(11,99);

        return $newId . $random;
    }

    static function generateIdbyUnit($prefixJenis, $noUrut){
        $newNoUrut = $noUrut + 1;
        $newId = $prefixJenis . sprintf("%04s", $newNoUrut);
        //$newId = $noUrut;
        //$random = rand(1,99);
        return $newId;
    }

    static function generateOdrIdbyUnit($prefixJenis, $noUrut){

        $newNoUrut = $noUrut + 1;
        $newId = $prefixJenis . sprintf("%05s", $newNoUrut);

        return $newId;
    }

    static function generateTempIdbyUnit($prefixJenis, $noUrut){

        $newNoUrut = $noUrut + 1;
        $newId = $prefixJenis . sprintf("%05s", $newNoUrut);

        return $newId;
    }

}
