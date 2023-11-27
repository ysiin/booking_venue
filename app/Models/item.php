<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    protected $table = 'item';
    protected $fillable = ['id', 'nama_item','quantity', 'harga' ];


    public function pemesanan()
    {
        return $this->belongsToMany(pemesanan::class, 'pemesanan_item')->withPivot('quantity');
    }
}
