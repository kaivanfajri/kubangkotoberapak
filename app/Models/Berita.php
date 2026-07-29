<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $fillable = [
        'judul', 'slug', 'kategori', 'konten', 'gambar', 'tanggal_terbit', 'status',
    ];

    protected $casts = [
        'tanggal_terbit' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul) . '-' . Str::random(5);
            }
        });
    }

    public function scopeTerbit($query)
    {
        return $query->where('status', 'Terbit');
    }
}
