<?php

namespace App\Http\Controllers;

use App\Models\rombongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class rombonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() == false) {
            return redirect('/signin');
        };

        $data = rombongan::orderBy('id', 'desc')->paginate(10);
        $title = 'Hapus Data Rombongan!';
        $text = "Yakin hapus data ini?";
        confirmDelete($title, $text);
        return view('rombongan.index', compact('data'))->with('data1', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check() == false) {
            return redirect('/signin');
        };

        return view('rombongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'nama_rombongan' => 'required',
            'jumlah_rombongan' => 'required',
            'no_rekening' => 'required',
            'bukti_transfer' => 'required',
        ]);

        rombongan::create($data);
        return redirect()->to('rombongan')->with('toast_success', 'Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        rombongan::where('id', $id)->delete();
        return redirect()->to('rombongan')->with('toast_success', 'Berhasil dihapus');
    }
}
