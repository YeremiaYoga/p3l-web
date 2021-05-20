<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpesanan extends Model
{
    protected $fillable = [
        'hapus', 'id_menu', 'id_pesanan', 'status', 'jumlah_pesanan'
    ];
    public $timestamps = false;
    use HasFactory;
}
