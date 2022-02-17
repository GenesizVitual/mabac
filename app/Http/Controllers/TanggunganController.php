<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggungan;

class TanggunganController extends Controller
{
    public function index()
    {
        $model = Tanggungan::all();
        return view('tanggungan.index', compact(['model']));
    }

    public function create()
    {
        $method = 'post';
        return view('tanggungan.form', compact(['method']));
    }

    public function store(Request $req)
    {
        # code...
        $this->validate($req, [
            'tanggungan' => 'required',
            'bobot' => 'required'
        ]);

        $data = $req->except(['_token']);
        $model = new Tanggungan($data);
        if ($model->save()) {
            return redirect('tanggungan')->with('message_success', '' . $model->tanggungan . ' telah disimpan');
        } else {
            return redirect()->back()->with('message_fail', 'Gagal, menyimpan tanggungan ' . $req->tanggungan . '');
        }
    }

    public function edit($id)
    {
        $model = Tanggungan::findOrFail($id);
        $method = 'put';
        return view('tanggungan.form', compact(['model', 'method']));
    }

    public function update(Request $req, $id)
    {
        # code...
        $this->validate($req, [
            'tanggungan' => 'required',
            'bobot' => 'required'
        ]);


        $data = $req->except(['_token']);
        $model = Tanggungan::findOrFail($id);
        if ($model->update($data)) {
            return redirect('tanggungan')->with('message_success', $model->tanggungan . ' telah disimpan');
        } else {
            return redirect()->back()->with('message_fail', 'Gagal, mengubah data tanggungan ' . $req->tanggungan . '');
        }
    }

    public function destroy(Request $req, $id)
    {
        # code...  
        $model = Tanggungan::findOrFail($id);
        if ($model->delete()) {
            return redirect('tanggungan')->with('message_success', $model->tanggungan . ' telah dihapus');
        } else {
            return redirect()->back()->with('message_fail', 'Gagal, menghapus data tanggungan ' . $req->tanggungan . '');
        }
    }
}
