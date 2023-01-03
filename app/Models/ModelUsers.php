<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelUsers extends Model
{
    use HasFactory;
    protected $table = 'tm_users';
    protected $fillable = [
        'username', 'level', 'password',
    ];
}
