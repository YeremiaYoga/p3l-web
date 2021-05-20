<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Carbon\Carbon;

class Karyawan extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'hapus', 'nama_karyawan', 'no_telepon','jabatan','email_karyawan','password'
    ];
    
    protected $hidden = [
        'password',
    ];

    public function getCreatedAtAttribute(){
        if(!is_null($this->attributes['created_at'])){
            return Carbon::parse($this->attributes['created_at'])->format('Y-m-d H:i:s');
        }
    }

}
