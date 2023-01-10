<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelProduk extends Model
{
    use HasFactory;
    protected $table = 'tm_produk';
    protected $fillable = [
        'kode_produk','nama_produk', 'harga_produk', 'keuntungan_harian', 'total_keuntungan', 'masa_kontrak', 'image'
    ];
}
