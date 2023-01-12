<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMember extends Model
{
    use HasFactory;
    protected $table = 'tm_member';
    protected $fillable = [
        'username', 'nama_lengkap', 'no_hp', 'no_rekening', 'alamat_lengkap', 'password','password_pernarikan','saldo','kode_referal'
    ];
}
