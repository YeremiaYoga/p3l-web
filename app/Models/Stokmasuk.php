<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stokmasuk extends Model
{
    protected $fillable = [
        'id_bahan', 'hapus', 'jumlah_masuk', 'sisa_stok', 'harga_bahan'
    ];
    use HasFactory;
}
