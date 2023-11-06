<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rombongan extends Model
{
    use HasFactory;
    protected $table = 'rombongan';
    protected $fillable = ['nama_rombongan', 'jumlah_rombongan', 'no_rekening'];
    public $timestamps = false;
}
