<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use App\Models\rombongan;
use App\Models\venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

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
        $title = 'Hapus Data Pemesanan!';
        $text = "Yakin hapus data ini?";
        confirmDelete($title, $text);

        return view('pemesanan.index', compact('data'))->with('data1', $data);
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
            'tanggal_sewa' => [ 'required',
            Rule::unique('pemesanan')->where(function ($query) use ($request) {
                return $query->where('venue_id', $request->venue_id)
                             ->where('tanggal_sewa', $request->tanggal_sewa);
            })->ignore($request->id),
        ],
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
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


    public function pending()
    {
        if (Auth::check() == false) {
            return redirect('/signin');
        };

        $data = pemesanan::where('status', 'pending')->orderBy('id', 'desc')->paginate(10);
        $title = 'Hapus data Pemesanan!';
        $text = "Yakin hapus data ini?";
        confirmDelete($title, $text,);
        return view('pemesanan.pending', compact('data'))->with('data1', $data);
    }


    public function updateStatus(Request $request, $id)
    {
        $data = pemesanan::where('id', $id);


        Alert::warning('Warning Title', 'Warning Message');
        $data->update(['status' => 'approved']);

        return redirect()->to('pemesanan/pending')->with('toast_success', 'Berhasil diverifikasi');
    }

    public function destroyPending($id)
    {
        pemesanan::where('id', $id)->delete();
        return redirect()->to('pemesanan/pending')->with('toast_success', 'Berhasil dihapus');
    }
}
