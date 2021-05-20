<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'hapus', 'total_makanan', 'total_minuman', 'total_side', 'total_pembayaran', 
        'pajak', 'tanggal_pembayaran', 'no_kartu', 'nama_pemilik', 'kode_verif'
    ];
    use HasFactory;
}
