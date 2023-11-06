<?php

namespace App\Http\Controllers;

use App\Models\venue;
use Illuminate\Http\Request;
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
        return view('venue.index')->with('data1', $data);
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
            'panjang' => 'required',
            'lebar' => 'required',
            'max_kapasitas' => 'required',
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
