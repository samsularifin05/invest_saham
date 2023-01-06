<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPembelian extends Model
{
    use HasFactory;
    protected $table = 'tt_pembelian_paket';
    protected $fillable = [
        'id_produk','id_member','id_detail_paket', 'tanggal_mulai', 'tanggal_selesai', 'status_pembayaran'
    ];
}
