<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenghasilanOrtu;

class PenghasilanOrtuController extends Controller
{
    public function index()
    {
        $model = PenghasilanOrtu::all();
        return view('penghasilan_ortu.index', compact(['model']));
    }

    public function create()
    {
        $method = 'post';
        return view('penghasilan_ortu.form', compact(['method']));
    }

    public function store(Request $req)
    {
        # code...
        $this->validate($req, [
            'penghasilan' => 'required',
            'bobot' => 'required'
        ]);

        $data = $req->except(['_token']);
        $model = new PenghasilanOrtu($data);
        if ($model->save()) {
            return redirect('penghasilan-ortu')->with('message_success', '' . $model->penghasilan . ' telah disimpan');
        } else {
            return redirect()->back()->with('message_fail', 'Gagal, menyimpan penghasilan ' . $req->penghasilan . '');
        }
    }

    public function edit($id)
    {
        $model = PenghasilanOrtu::findOrFail($id);
        $method = 'put';
        return view('penghasilan_ortu.form', compact(['model', 'method']));
    }

    public function update(Request $req, $id)
    {
        # code...
        $this->validate($req, [
            'penghasilan' => 'required',
            'bobot' => 'required'
        ]);


        $data = $req->except(['_token']);
        $model = PenghasilanOrtu::findOrFail($id);
        if ($model->update($data)) {
            return redirect('penghasilan-ortu')->with('message_success', $model->penghasilan . ' telah disimpan');
        } else {
            return redirect()->back()->with('message_fail', 'Gagal, mengubah data penghasilan ' . $req->penghasilan . '');
        }
    }

    public function destroy(Request $req, $id)
    {
        # code...  
        $model = PenghasilanOrtu::findOrFail($id);
        if ($model->delete()) {
            return redirect('penghasilan-ortu')->with('message_success', $model->penghasilan . ' telah dihapus');
        } else {
            return redirect()->back()->with('message_fail', 'Gagal, menghapus data penghasilan ' . $req->penghasilan . '');
        }
    }
}
