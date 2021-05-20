<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stokkeluar extends Model
{
    protected $fillable = [
        'id_bahan', 'hapus', 'jumlah_keluar', 'jenis_keluar'
    ];
    use HasFactory;
}
