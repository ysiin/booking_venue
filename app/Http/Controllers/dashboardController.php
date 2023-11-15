<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
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
        
        return view('dashboard.index');
    }

    public function listEvent()
    {
        $events = [];

        $appointments = pemesanan::where('status', 'approved')->with(['venue', 'rombongan'])->get();

        foreach ($appointments as $item) {
            
            if( $item->venue->unit == 1){
                $unit = "Dufan";
            } elseif ( $item->venue->unit == 2 ) {
                $unit = "Sea World";
            } elseif ($item->venue->unit == 3) {
                $unit = "Samudra";
            } elseif ($item->venue->unit == 4) {
                $unit = "Atlantis";
            } elseif ($item->venue->unit == 5) {
                $unit = "Jakarta Bird Land";
            } else {
                $unit = "Pantai Ancol";
            }

            $start = Carbon::parse($item->tanggal_sewa . ' ' . $item->jam_mulai);
            $end = Carbon::parse($item->tanggal_sewa . ' ' . $item->jam_selesai);


            $events[] = [
                'title' => $item->venue->nama . ' (' . $unit . ') ' . ' ' . $item->rombongan->nama_rombongan,
                'start' => $start,
                'end' => $end,
            ];
        };

        return response()->json($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
