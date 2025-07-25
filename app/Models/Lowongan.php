<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan',
        'posisi',
        'lokasi',
        'deskripsi',
        'kualifikasi',
        'tanggal_kadaluarsa',
        'kontak',
    ];
}
