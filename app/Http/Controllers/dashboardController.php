<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __invoke()
    {
        $events = [];

        $pemesanan = pemesanan::with(['venue', 'rombongan'])->get();

        foreach ($pemesanan as $appointment) {
            $events[] = [
                'title' => $pemesanan->venue->nama,
                'start' => $pemesanan->jam_mulai,
                'end' => $pemesanan->jam_selesai,
            ];
        }

        return view('dashboard.index', compact('events'));
    }
}
