<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [
        'hapus', 'id_meja', 'id_pelanggan', 'id_karyawan', 'sesi', 'status','tanggal'
    ];
    use HasFactory;
}
