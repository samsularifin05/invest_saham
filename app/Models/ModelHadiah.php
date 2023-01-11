<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHadiah extends Model
{
    use HasFactory;
    protected $table = 'tm_hadiah';
    protected $fillable = [
        'total_nominal_hadiah', 'kouta', 'nominal_hadiah_permember', 'kode_hadiah', 'kuota_terpenuhi'
    ];
}
