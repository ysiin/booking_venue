<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = ['id', 'venue_id', 'rombongan_id', 'tanggal_sewa', 'jam_mulai', 'jam_selesai' ,'bukti_transfer' ];

    public function venue()
    {
        return $this->belongsTo(venue::class);
    }

    public function rombongan()
    {
        return $this->belongsTo(rombongan::class);
    }
    

    public function item()
    {
        return $this->belongsToMany(item::class, 'pemesanan_item')->withPivot('quantity', 'harga');
    }

}
