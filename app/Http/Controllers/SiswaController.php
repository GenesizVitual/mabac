<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $model_siswa = Student::all();
        return view('siswa.index', compact(['model_siswa']));
    }

    public function create()
    {
        $method = 'post';
        return view('siswa.form', compact(['method']));
    }

    public function store(Request $req)
    {
        # code...
        $this->validate($req, [
            'kode'=> 'required|unique:students,kode',
            'name'=> 'required'
        ]);
   
        $data = $req->except(['_token']);
        $model = new Student($data);
        if($model->save()){
            return redirect('siswa')->with('message_success','Siswa atas nama :'.$model->name.' telah disimpan');
        }else{
            return redirect()->back()->with('message_fail','Gagal, menyimpan data siswa dengan nama'.$req->name.'');    
        }
    }

    public function edit($id)
    {
        $model_siswa = Student::findOrFail($id);
        $method = 'put';
        return view('siswa.form', compact(['model_siswa','method']));
    }
    
    public function update(Request $req, $id)
    {
        # code...
        $this->validate($req, [
            'kode'=> 'required|unique:students,kode',
            'name'=> 'required'
        ]);
   
        $data = $req->except(['_token']);
        $model = Student::findOrFail($id);
        if($model->update($data)){
            return redirect('siswa')->with('message_success','Siswa atas nama :'.$model->name.' telah diubah');
        }else{
            return redirect()->back()->with('message_fail','Gagal, mengubah data siswa dengan nama'.$req->name.'');    
        }
    }

    public function destroy(Request $req, $id)
    {
        # code...  
        $model = Student::findOrFail($id);
        if($model->delete()){
            return redirect('siswa')->with('message_success','Siswa atas nama :'.$model->name.' telah dihapus');
        }else{
            return redirect()->back()->with('message_fail','Gagal, menghapus data siswa dengan nama'.$req->name.'');    
        }
    }
}
