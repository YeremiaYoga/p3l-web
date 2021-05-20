<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'hapus', 'nama_pelanggan', 'no_pelanggan','email_pelanggan','id_pelanggan'
    ];

    use HasFactory;
}
