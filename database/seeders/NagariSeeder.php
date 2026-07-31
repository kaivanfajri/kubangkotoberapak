<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Umkm;
use App\Models\KelompokTani;
use App\Models\Galeri;

class NagariSeeder extends Seeder
{
    public function run(): void
    {
        // =============================================
        // 1. DATA UMKM (4 usaha dari JS hardcode lama)
        // =============================================
        $umkms = [
            [
                'nama_usaha' => 'Rendang & Kalio Uni Wilda',
                'pemilik' => 'Uni Wilda',
                'kategori' => 'Kuliner',
                'alamat' => 'Jorong Durian Taba',
                'nomor_wa' => '6281234567890',
                'deskripsi' => 'Rendang daging sapi khas Minang racikan bumbu rempah kelapa sangrai alami dari kebun Nagari Kubang.',
                'produk_utama' => json_encode(['Rendang Daging (250g/500g)', 'Kalio Daging', 'Serundeng Kelapa']),
            ],
            [
                'nama_usaha' => 'Keripik Balado Sokan',
                'pemilik' => 'Ibu Fatimah',
                'kategori' => 'Kuliner',
                'alamat' => 'Jorong Sungai Tapuh',
                'nomor_wa' => '6281234567891',
                'deskripsi' => 'Keripik singkong balado pedas manis buatan olahan rumahan yang renyah dan gurih.',
                'produk_utama' => json_encode(['Keripik Balado Merah', 'Keripik Sanjai Plastik', 'Keripik Pisang']),
            ],
            [
                'nama_usaha' => 'Kopi Bubuk Nagari',
                'pemilik' => 'Pak Malin',
                'kategori' => 'Sembako',
                'alamat' => 'Jorong Pintu Rayo',
                'nomor_wa' => '6281234567892',
                'deskripsi' => 'Kopi Robusta asli dipetik dari kebun perbukitan Nagari Kubang, disangrai secara tradisional.',
                'produk_utama' => json_encode(['Kopi Bubuk Murni (100g)', 'Kopi Arabika Bayang']),
            ],
            [
                'nama_usaha' => 'Kain Tenun Bayang',
                'pemilik' => 'Kak Ros',
                'kategori' => 'Kerajinan',
                'alamat' => 'Jorong Ikua Koto',
                'nomor_wa' => '6281234567893',
                'deskripsi' => 'Kerajinan selendang dan sarung tenun tradisional Minangkabau dengan motif ukiran adat lokal.',
                'produk_utama' => json_encode(['Selendang Tenun', 'Songket Motif Bayang', 'Syal Mini']),
            ],
        ];

        foreach ($umkms as $u) {
            Umkm::firstOrCreate(['nama_usaha' => $u['nama_usaha']], $u);
        }

        // =============================================
        // 2. DATA KELOMPOK TANI (7 kelompok dari JS lama)
        // =============================================
        $kelompokTanis = [
            ['nama_kelompok' => 'Kelompok Tani Durian Taba', 'ketua' => 'H. Zulkifli', 'jorong' => 'Jorong Durian Taba', 'jumlah_anggota' => 22, 'luas_lahan' => '20 Ha', 'komoditas_utama' => 'Padi Sokan', 'produktivitas' => '6.1 Ton/Ha/Musim', 'status' => 'Aktif'],
            ['nama_kelompok' => 'Kelompok Tani Sungai Tapuh', 'ketua' => 'Ridwan', 'jorong' => 'Jorong Sungai Tapuh', 'jumlah_anggota' => 19, 'luas_lahan' => '23 Ha', 'komoditas_utama' => 'Padi Cisokan', 'produktivitas' => '7.2 Ton/Ha/Musim', 'status' => 'Aktif'],
            ['nama_kelompok' => 'Kelompok Tani Pintu Rayo I', 'ketua' => 'Basri', 'jorong' => 'Jorong Pintu Rayo', 'jumlah_anggota' => 20, 'luas_lahan' => '20 Ha', 'komoditas_utama' => 'Padi & Semangka', 'produktivitas' => '6.7 Ton/Ha/Musim', 'status' => 'Aktif'],
            ['nama_kelompok' => 'Kelompok Tani Pintu Rayo II', 'ketua' => 'Nurdin', 'jorong' => 'Jorong Pintu Rayo', 'jumlah_anggota' => 18, 'luas_lahan' => '18 Ha', 'komoditas_utama' => 'Padi Sawah', 'produktivitas' => '6.3 Ton/Ha/Musim', 'status' => 'Aktif'],
            ['nama_kelompok' => 'Kelompok Tani Sawah Balik', 'ketua' => 'Syafril', 'jorong' => 'Jorong Sawah Balik', 'jumlah_anggota' => 25, 'luas_lahan' => '27 Ha', 'komoditas_utama' => 'Padi & Jagung', 'produktivitas' => '7.0 Ton/Ha/Musim', 'status' => 'Aktif'],
            ['nama_kelompok' => 'Kelompok Tani Anak Aia', 'ketua' => 'Bachtiar', 'jorong' => 'Jorong Anak Aia', 'jumlah_anggota' => 21, 'luas_lahan' => '22 Ha', 'komoditas_utama' => 'Padi & Hortikultura', 'produktivitas' => '6.5 Ton/Ha/Musim', 'status' => 'Aktif'],
            ['nama_kelompok' => 'Kelompok Tani Ikua Koto', 'ketua' => 'Darmansyah', 'jorong' => 'Jorong Ikua Koto', 'jumlah_anggota' => 24, 'luas_lahan' => '25 Ha', 'komoditas_utama' => 'Padi Sawah', 'produktivitas' => '6.8 Ton/Ha/Musim', 'status' => 'Aktif'],
        ];

        foreach ($kelompokTanis as $kt) {
            KelompokTani::firstOrCreate(['nama_kelompok' => $kt['nama_kelompok']], $kt);
        }

        // =============================================
        // 3. DATA GALERI (14 foto dari JS hardcode lama)
        // Catatan: file gambar ini ada di public/ (asset statis),
        // bukan di storage/. Maka path diisi relatif ke public.
        // =============================================
        $galeris = [
            ['caption' => 'Pemandangan Persawahan Nagari Kubang', 'kategori' => 'Adat & Sejarah', 'gambar' => 'galeri/Profil2.JPG'],
            ['caption' => 'Hamparan Sawah Irigasi Sungai Bayang', 'kategori' => 'Adat & Sejarah', 'gambar' => 'galeri/Profil3.JPG'],
            ['caption' => 'Aktivitas Panen Padi Sawah Tani', 'kategori' => 'Pertanian', 'gambar' => 'galeri/pertanian1.JPG'],
            ['caption' => 'Bibit Padi Unggul Cisokan', 'kategori' => 'Pertanian', 'gambar' => 'galeri/Pertanian2.jpeg'],
            ['caption' => 'Pengolahan Lahan Sawah', 'kategori' => 'Pertanian', 'gambar' => 'galeri/Pertanian3.JPG'],
            ['caption' => 'Sistem Irigasi Tradisional Nagari', 'kategori' => 'Pertanian', 'gambar' => 'galeri/Pertanian4.JPG'],
            ['caption' => 'Peternakan Sapi Potong Nagari', 'kategori' => 'Peternakan', 'gambar' => 'galeri/Peternakan1.jpeg'],
            ['caption' => 'Penggembalaan Ternak Harian', 'kategori' => 'Peternakan', 'gambar' => 'galeri/Peternakan2.jpeg'],
            ['caption' => 'Pemberian Pakan Hijauan', 'kategori' => 'Peternakan', 'gambar' => 'galeri/Peternakan3.jpeg'],
            ['caption' => 'Bentang Alam Bersejarah Nagari Kubang', 'kategori' => 'Adat & Sejarah', 'gambar' => 'galeri/Sejarah1.JPG'],
            ['caption' => 'Batu Adat Perlindungan Nagari', 'kategori' => 'Adat & Sejarah', 'gambar' => 'galeri/Sejarah4.jpeg'],
            ['caption' => 'Peta Potensi Lahan Nagari', 'kategori' => 'Peta Wilayah', 'gambar' => 'galeri/Peta potensi nagari.jpeg'],
            ['caption' => 'Peta Topografi & Kontur', 'kategori' => 'Peta Wilayah', 'gambar' => 'galeri/peta topografi.jpeg'],
            ['caption' => 'Peta Mitigasi Bencana', 'kategori' => 'Peta Wilayah', 'gambar' => 'galeri/Peta rawan kebencanaan.jpeg'],
        ];

        foreach ($galeris as $g) {
            Galeri::firstOrCreate(['caption' => $g['caption']], $g);
        }
    }
}
