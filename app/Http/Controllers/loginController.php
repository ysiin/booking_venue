<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class loginController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest'])->except('logout');
    }

    public function index()
    {
        return view('login.index');
    }

    public function check(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (Auth::attempt($infologin)){
            return redirect('rombongan')->with('toast_success', 'Berhasil Login');
        }else {
            return redirect('signin')->with('toast_error', 'Username atau Password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('signin')->with('toast_success', 'Berhasil Logout');
    }
}



