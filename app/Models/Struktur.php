<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    protected $fillable = [
        'nama', 'jabatan', 'kategori', 'foto', 'urutan',
    ];

    public function scopePemerintah($query)
    {
        return $query->where('kategori', 'pemerintah')->orderBy('urutan');
    }

    public function scopeBamus($query)
    {
        return $query->where('kategori', 'bamus')->orderBy('urutan');
    }

    public function scopeLpmn($query)
    {
        return $query->where('kategori', 'lpmn')->orderBy('urutan');
    }
}
