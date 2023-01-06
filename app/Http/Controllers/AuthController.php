<?php

namespace App\Http\Controllers;

use App\Models\ModelMember;
use App\Models\ModelUsers;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function loginmember()
    {
        return view('login.login-member');
    }
    public function loginadmin()
    {
        return view('login.login-admin');
    }

    public function checkloginAdmin(Request $request)
    {
        $cek = ModelUsers::where('username', $request->get('username'))->first();
        if ($cek) {
            if (password_verify($request->get('password'), $cek->password)) {
                \Session::put('datauser', $cek);
                return redirect('/dashboard-admin');
            } else {
                return redirect()->route('login-admin')->with('info', 'Password Salah.');
            }
        } else {
            return redirect()->route('login-admin')->with('info', 'Username dan password tidak terfaftar.');
        }
    }
    public function checkloginMember(Request $request)
    {
        $cek = ModelMember::where('username', $request->get('username'))->first();
        if ($cek) {
            if (password_verify($request->get('password'), $cek->password)) {
                \Session::put('datauser', $cek);
                return redirect('/dashboard-member');
            } else {
                return redirect()->route('login-member')->with('info', 'Password Salah.');
            }
        } else {
            return redirect()->route('login-member')->with('info', 'Username dan password tidak terfaftar.');
        }
    }

    public function daftarmember()
    {

        return view('login.daftar-akun');
    }
    public function savemember(Request $request)
    {
        $cek = ModelMember::where('username', '=', $request->get('username'))->get();
        if (count($cek) == 1) {
            return redirect()->route('daftar-member')->with('info', "Username " . $request->get('username') . ' Sudah Terdaftar');
        } else {
            $simpan = ModelMember::create([
                'username' => $request->get('username'),
                'no_hp' => $request->get('no_hp'),
                'nama_lengkap' => $request->get('nama_lengkap'),
                'no_rekening' => '-',
                'alamat_lengkap' => $request->get('alamat_lengkap'),
                'saldo' => 0,
                'kode_referal' => '-',
                'password' => bcrypt($request->get('password')),
            ]);
            if ($simpan) {
                return redirect()->route('login-member')->with('success', 'Daftar Berhasil, Silahkan Login');
            } else {
                return redirect()->route('daftar-member')->with('info', 'Username dan password tidak terfaftar.');
            }
        }
    }

    public function logout()
    {
        \Session::forget('datauser');
        return redirect('/');
    }
    public function logoutadmin()
    {
        \Session::forget('datauser');
        return redirect('/login-admin');
    }
}
