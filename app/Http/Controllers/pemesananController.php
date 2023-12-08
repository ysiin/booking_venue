<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\pemesanan;
use App\Models\rombongan;
use App\Models\venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $data = pemesanan::with('item')
            ->orderBy('id', 'desc')
            ->paginate(10);

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
        $barang = item::all();
        return view('pemesanan.create', compact('venue', 'rombongan', 'barang'));
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
            'venue_id' => [
                'required',
                Rule::unique('pemesanan')->where(function ($query) use ($request) {
                    return $query->where('venue_id', $request->venue_id)
                        ->where('tanggal_sewa', $request->tanggal_sewa)
                        ->where('status', 'approved');
                })->ignore($request->id),
            ],
            'rombongan_id' => 'required | string',
            'tanggal_sewa' =>  'required | string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'item_ids' => 'array',
            'quantity' => 'array',
            'harga' => 'array',
        ], [
            'venue_id.required' => 'Venue harus diisi',
            'venue_id.unique' => 'Venue ini sudah di isi untuk di tanggal yang sama',
            'tanggal_sewa.required' => 'Tanggal sewa harus diisi',
            'jam_mulai.required' => 'Jam mulai harus diisi',
            'jam_selesai.required' => 'Jam selesai harus diisi',
            'jam_selesai.after' => 'Jam selesai harus diisi sesudah jam mulai',
        ]);


        $pemesanan = Pemesanan::create($data);

        $itemDetails = [];
        foreach ($request->input('item_ids', []) as $key => $itemId) {
            $itemDetails[$itemId] = [
                'quantity' => $request->input('quantity.' . $key),
                'harga' => $request->input('harga.' . $key),
            ];
        }

        $pemesanan->item()->attach($itemDetails);


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
        if (Auth::check() == false) {
            return redirect('/signin');
        };

        $venue = venue::all();
        $barang = item::all();
        $data = pemesanan::with('item')
            ->where('id', $id)
            ->first();
        return view('pemesanan.edit', compact('venue', 'barang'))->with('data', $data);
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
        //validasi request untuk data pemesanan
        $request->validate([
            'venue_id' => [
                'required',
                Rule::unique('pemesanan')->where(function ($query) use ($request) {
                    return $query->where('venue_id', $request->venue_id)
                        ->where('tanggal_sewa', $request->tanggal_sewa)
                        ->where('status', 'approved');
                })->ignore($request->id),
            ],
            'tanggal_sewa' =>  'required | string',
        ], [
            'venue_id.required' => 'Venue harus diisi',
            'venue_id.unique' => 'Venue ini sudah di isi untuk di tanggal yang sama',
            'tanggal_sewa.required' => 'Tanggal sewa harus diisi',
        ]);

        //data berisikan request input dari data pemesanan
        $data = [
            'venue_id' => $request->venue_id,
            'tanggal_sewa' => $request->tanggal_sewa,
            'status' => 'pending',

        ];

        // Update atribut pemesanan dari request
        pemesanan::where('id', $id)->update($data);

        $itemDetails = [];
        foreach ($request->input('item_ids', []) as $key => $itemId) {
            //periksa apakah item_id di isi
            if (!empty($itemId)) {
                //validasi dan tambahkan Item_id yang di isi 
                $itemDetails[$itemId] = [
                    'quantity' => $request->input('quantity.' . $key),
                    'harga' => $request->input('harga.' . $key),
                ];
            }
        }

        // Cari pemesanan dengan ID tertentu
        $pemesanan = Pemesanan::find($id);
        // Sync item dengan menggunakan sync
        $pemesanan->item()->sync($itemDetails);

        return redirect()->to('pemesanan')->with('toast_success', 'Berhasil edit data');
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
        if (Auth::check() == false) {
            return redirect('/signin');
        };

        $data = pemesanan::where('id', $id);

        Alert::warning('Warning Title', 'Warning Message');
        $data->update(['status' => 'approved']);

        return redirect()->to('pemesanan/pending')->with('toast_success', 'Berhasil diverifikasi');
    }

    public function updateStatusBack(Request $request, $id)
    {
        $data = pemesanan::where('id', $id);


        Alert::warning('Warning Title', 'Warning Message');
        $data->update(['status' => 'back']);

        return redirect()->to('pemesanan/pending')->with('toast_success', 'Berhasil mengembalikan pemesanan');
    }

    public function destroyPending($id)
    {
        pemesanan::where('id', $id)->delete();
        return redirect()->to('pemesanan/pending')->with('toast_success', 'Berhasil dihapus');
    }
}
