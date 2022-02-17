<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PekerjaanOrtu;

class PekerjaanOrtuController extends Controller
{
    public function index()
    {
        $model = PekerjaanOrtu::all();
        return view('pekerjaan_ortu.index', compact(['model']));
    }

    public function create()
    {
        $method = 'post';
        return view('pekerjaan_ortu.form', compact(['method']));
    }

    public function store(Request $req)
    {
        # code...
        $this->validate($req, [
            'pekerjaan'=> 'required',
            'bobot'=> 'required'
        ]);
   
        $data = $req->except(['_token']);
        $model = new PekerjaanOrtu($data);
        if($model->save()){
            return redirect('pekerjaan-ortu')->with('message_success',''.$model->pekerjaan.' telah disimpan');
        }else{
            return redirect()->back()->with('message_fail','Gagal, menyimpan pekerjaan '.$req->pekerjaan.'');    
        }
    }

    public function edit($id)
    {
        $model = PekerjaanOrtu::findOrFail($id);
        $method = 'put';
        return view('pekerjaan_ortu.form', compact(['model','method']));
    }
    
    public function update(Request $req, $id)
    {
        # code...
        $this->validate($req, [
            'pekerjaan'=> 'required',
            'bobot'=> 'required'
        ]);
   
   
        $data = $req->except(['_token']);
        $model = PekerjaanOrtu::findOrFail($id);
        if($model->update($data)){
            return redirect('pekerjaan-ortu')->with('message_success',$model->name.' telah disimpan');
        }else{
            return redirect()->back()->with('message_fail','Gagal, mengubah data pekerjaan '.$req->name.'');    
        }
    }

    public function destroy(Request $req, $id)
    {
        # code...  
        $model = PekerjaanOrtu::findOrFail($id);
        if($model->delete()){
            return redirect('pekerjaan-ortu')->with('message_success',$model->name.' telah dihapus');
        }else{
            return redirect()->back()->with('message_fail','Gagal, menghapus data pekerjaan '.$req->name.'');    
        }
    }
}
