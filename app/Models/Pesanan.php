<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'hapus', 'id_reservasi', 'status', 'total_jumlah','total_pesanan'
    ];
    public $timestamps = false;
    use HasFactory;
}
