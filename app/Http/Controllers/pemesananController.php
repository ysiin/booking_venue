<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use App\Models\rombongan;
use App\Models\venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pemesananController extends Controller
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

        $data = pemesanan::orderBy('id', 'desc')->paginate(10);
        return view('pemesanan.index')->with('data1', $data);
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

        $venue = venue::all();
        $rombongan = rombongan::all();
        return view('pemesanan.create', compact('venue', 'rombongan'));
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
            'venue_id' => 'required',
            'rombongan_id' => 'required',
            'tanggal_sewa' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
        pemesanan::create($data);
        return redirect()->to('pemesanan')->with('toast_success', 'Berhasil ditambahkan');
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
        pemesanan::where('id', $id)->delete();
        return redirect()->to('pemesanan')->with('toast_success', 'Berhasil dihapus');
    }
}
