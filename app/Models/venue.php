<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venue extends Model
{
    use HasFactory;
    protected $table = 'venue';
    protected $fillable = ['nama', 'unit', 'panjang', 'lebar', 'max_kapasitas', 'harga'];
}