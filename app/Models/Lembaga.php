<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $fillable = [
        'nama_lembaga', 'ketua', 'jumlah_anggota', 'nomor_hp', 'deskripsi', 'logo',
    ];
}
