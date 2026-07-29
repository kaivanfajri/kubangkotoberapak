<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'nama_usaha', 'pemilik', 'kategori', 'alamat', 'nomor_wa',
        'jam_operasional', 'deskripsi', 'foto', 'produk_utama',
    ];

    protected $casts = [
        'produk_utama' => 'array',
    ];
}
