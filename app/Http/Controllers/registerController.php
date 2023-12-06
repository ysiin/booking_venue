<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ViewErrorBag;
use RealRashid\SweetAlert\Facades\Alert;

class registerController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function create()
    {
        return view('user.create');
    }


    public function store(Request $request)
    {
            

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ],[
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email ini sudah digunakan',
            'password.required' => 'Password harus diisi',

        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($data);
        return redirect('signin')->with('toast_success', 'Register Berhasil');
    }



}
