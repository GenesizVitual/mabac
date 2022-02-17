<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PekerjaanOrtu;
use App\Models\PenghasilanOrtu;
use App\Models\Tanggungan;
use App\Models\Student;

class Alternatif extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function getPekerjaanOrtu()
    {
        return $this->belongsTo(PekerjaanOrtu::class,'K01');
    }
    
    public function getPenghasilanOrtu()
    {
        return $this->belongsTo(PenghasilanOrtu::class,'K02');
    }
    
    public function getTanggungan()
    {
        return $this->belongsTo(Tanggungan::class,'K03');
    } 
    
    public function getSiswa()
    {
        return $this->belongsTo(Student::class,'AL');
    }
}
