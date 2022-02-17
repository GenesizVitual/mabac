<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alternatif;
use App\Models\Student;
use App\Models\PekerjaanOrtu;
use App\Models\PenghasilanOrtu;
use App\Models\Tanggungan;
use App\Http\Controllers\Metode;

class AlternatifController extends Controller
{
    //
    use Metode;
    
    public function index()
    {
        $siswa = Student::all();
        $pekerjaan = PekerjaanOrtu::all();
        $penghasilan = PenghasilanOrtu::all();
        $tanggungan = Tanggungan::all();
        $alternatif = Alternatif::all();
        $mabac = $this->RunMetode();
        $method = 'post';
        return view('alternatif.index', compact(['siswa','pekerjaan','penghasilan','tanggungan','alternatif','method','mabac']));
    }
    
    
    public function edit($id)
    {
        $siswa = Student::all();
        $pekerjaan = PekerjaanOrtu::all();
        $penghasilan = PenghasilanOrtu::all();
        $tanggungan = Tanggungan::all();
        $alternatif = Alternatif::all();
        $alternatif_dipilih = Alternatif::findOrFail($id);
        $mabac = $this->RunMetode();
        $method = 'put';
        return view('alternatif.index', compact(['siswa','pekerjaan','penghasilan','tanggungan','alternatif','alternatif_dipilih','method','mabac']));
    }

    public function store(Request $req)
    {
        $this->validate($req,[
            'AL'=> 'required',
            'K01'=> 'required',
            'K02'=> 'required',
            'K03'=> 'required',
        ]);

        $data = $req->except(['_token','_method']);
        $model = new Alternatif($data);
        if($model->save()){
            return redirect()->back()->with('message_success','Data baru telah ditambahkan');
        }else{
            return redirect()->back()->with('message_fail','Gagal menambahkan data baru');    
        }
    }
    
    public function update(Request $req, $id)
    {
        $this->validate($req,[
            'AL'=> 'required',
            'K01'=> 'required',
            'K02'=> 'required',
            'K03'=> 'required',
        ]);

        $data = $req->except(['_token','_method']);
        $model = Alternatif::findOrFail($id);
        if($model->update($data)){
            return redirect('penentuan-kriteria')->with('message_success','Data baru telah diubah');
        }else{
            return redirect('penentuan-kriteria')->with('message_fail','Gagal mengubah data');    
        }
    }
    
    public function destroy(Request $req, $id)
    {
        $model = Alternatif::findOrFail($id);
        if($model->delete()){
            return redirect('penentuan-kriteria')->with('message_success','Data baru telah dihapus');
        }else{
            return redirect('penentuan-kriteria')->with('message_fail','Gagal menghapus data');    
        }
    }


    public function preview()
    {
        $siswa = Student::all();
        $mabac = $this->RunMetode();
        return view('laporan.index', compact(['siswa','mabac']));
    }
    
    public function cetak()
    {
        $siswa = Student::all();
        $mabac = $this->RunMetode();
        return view('laporan.print', compact(['siswa','mabac']));
    }
    
}
