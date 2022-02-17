<?php
namespace App\Http\Controllers;
use App\Http\Controllers\utils\Mabac;


trait Metode{

    public function RunMetode()
    {
        # code...
        $metode = new Mabac();
        $bobot_alternatif = $metode->bobot_alternatif();
        $metode->matrix_keputusan($bobot_alternatif);
        $matrix_normalisasi = $metode->matrik_normalisasi;
        $matrik_retimbang = $metode->matrik_retimbang;
        $matrik_perbatasan = $metode->matrik_perbatasan;
        $matrik_Q = $metode->matrik_Q;
        $matrik_rangking = $metode->hasil_rangking;
        return [
            'bobot_alternatif'=>$bobot_alternatif,
            'matrix_normalisasi'=>$matrix_normalisasi,
            'matrik_retimbang'=>$matrik_retimbang,
            'matrik_perbatasan'=>$matrik_perbatasan,
            'matrik_Q'=>$matrik_Q,
            'matrik_rangking'=>$matrik_rangking,
        ];
    }
}