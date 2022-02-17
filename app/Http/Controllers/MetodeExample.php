<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\utils\Mabac;

class MetodeExample extends Controller
{
    //
    public function index()
    {
        $methode = new Mabac();
        $bobot_alternatif = $methode->bobot_alternatif();
        $methode->matrix_keputusan($bobot_alternatif);
    }
}
