<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBank extends Model
{
    use HasFactory;
    protected $table = 'tm_bank';
    protected $fillable = [
        'id_member',
        'nama_bank', 'atas_nama', 'no_rekening',
    ];
}
