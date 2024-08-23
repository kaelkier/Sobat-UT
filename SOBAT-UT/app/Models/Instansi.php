<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $table = 'instansi';

    protected $fillable = [
        'nama',
        'email',
        'provinsi',
        'kabupaten',
        'pic',
        'status',
        'bintang',
    ];

    public $timestamps = false; // Nonaktifkan timestamp
}
