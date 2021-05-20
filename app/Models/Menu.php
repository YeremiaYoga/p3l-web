<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menus";
    public $timestamps =false;
    protected $fillable = [
        'nama_menu', 'deskripsi_menu','kategori', 'harga', 'hapus', 'gambar'
    ];
    
    use HasFactory;
}
