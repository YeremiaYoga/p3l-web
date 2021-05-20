<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $fillable = [
        'nama_bahan', 'jumlah_bahan', 'ukuran_penyajian','unit','id_menu'
    ];
    use HasFactory;
}
