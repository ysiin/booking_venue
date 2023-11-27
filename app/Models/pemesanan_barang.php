<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan_item extends Model
{
    use HasFactory;
    protected $table = 'pemesanan_item';
    protected $fillable = ['id', 'pemesanan_id', 'item_id', 'quantity', 'harga' ];

}
