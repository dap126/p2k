<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal_melapor',
        'lokasi_kerusakan',
        'deskripsi_kerusakan',
         'status',
        'user_id'
    ];
}
