<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Harvest extends Model
{
    protected $fillable = [
        'nama_kelompok_tani',
        'hasil_pertanian',
        'varian',
        'Total_panen',
        'Stok_tersedia',
        'nomor_hp',
        'tanggal_panen',
        'lokasi',
        'public_code',
    ];

    protected $casts = [
        'tanggal_panen' => 'date'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($harvest) {
            do {
                $code = Str::random(10);
            } while (self::where('public_code', $code)->exists());
            $harvest->public_code = $code;
        });
    }
    

public function getPublicUrl(): string
{
    return route('harvest.public', $this->public_code);
}


}