<?php

namespace App\Http\Controllers;

use App\Models\ModelUsers;
use Illuminate\Http\Request;

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
        if($cek){
            if(password_verify($request->get('password'), $cek->password)) {
                \Session::put('datauser', $cek);
                return redirect('/dashboard-admin');
            }else{
                return redirect()->route('login-admin')->with('info', 'Password Salah.');
            }
        }else{
            return redirect()->route('login-admin')->with('info', 'Username dan password tidak terfaftar.');
        }
    }
    public function checkloginMember(Request $request)
    {
        $cek = ModelUsers::where('username', $request->get('username'))->first();
        if($cek){
            if(password_verify($request->get('password'), $cek->password)) {
                \Session::put('datauser', $cek);
                return redirect('/dashboard-member');
            }else{
                return redirect()->route('login-admin')->with('info', 'Password Salah.');
            }
        }else{
            return redirect()->route('login-admin')->with('info', 'Username dan password tidak terfaftar.');
        }
    }

    public function logout()
    {
        \Session::forget('datauser') ;
        return redirect('/');
    }
    public function logoutadmin()
    {
        \Session::forget('datauser') ;
        return redirect('/login-admin');
    }
}
