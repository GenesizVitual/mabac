<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function post(Request $req)
    {
        # code...

        $this->validate($req, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $model_users = User::where('email', $req->email)->first();
        if (!empty($model_users)) {
            if (Hash::check($req->password, $model_users->password)) {
                Session::put('id_admin', $model_users->id);
                Session::put('nama_admin', $model_users->name);
                return redirect('siswa')->with('message_success', 'Selamat datang ' . $model_users->name);
            } else {
                return redirect('/')->with('message_fail', 'email dan password anda salah');
            }
        }else {
            return redirect('/')->with('message_fail', 'email dan password anda salah');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/')->with('message_success', 'Sampai bertemu lagi');
    }
}
