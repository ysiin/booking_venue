<?php

namespace App\Http\Controllers;

use App\Models\venue;
use Illuminate\Http\Request;
use Laraindo\RupiahFormat;
use Illuminate\Support\Facades\Auth;

class venueController extends Controller
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

        $data = venue::orderBy('id', 'desc')->paginate(5);        
        
        $title = 'Hapus Data Venue!';
        $text = "Yakin hapus data ini?";
        confirmDelete($title, $text);
        return view('venue.index', compact('data'))->with('data1', $data);
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

        return view('venue.create');
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
            'nama' => 'required',
            'unit' => 'required',
            'panjang' => 'required|numeric',
            'lebar' => 'required|numeric',
            'max_kapasitas' => 'required|numeric',
            'harga' => 'required|numeric',
        ],[
            'nama.required' => 'Nama venue harus diisi',
            'unit.required' => 'Unit harus diisi',
            'panjang.required' => 'Ukuran panjang venue harus diisi',
            'panjang.numeric' => 'Ukuran panjang venue harus berisikan angka',
            'lebar.required' => 'Ukuran lebar venue harus diisi',
            'lebar.numeric' => 'Ukuran lebar venue harus berisikan angka',
            'max_kapasitas.required' => 'Kapasitas venue wajib diisi',
            'max_kapasitas.numeric' => 'Kapasitas venue harus berisikan angka',
            'harga.required' => 'Harga venue wajib diisi',
            'harga.numeric' => 'Harga venue harus berisikan angka',
        ]);

        venue::create($data);
        return redirect()->to('venue')->with('toast_success', 'Berhasil ditambahkan');
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
        venue::where('id', $id)->delete();
        return redirect()->to('venue')->with('toast_success', 'Berhasil dihapus');
    }
}
