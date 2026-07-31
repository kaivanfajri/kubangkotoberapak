<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KelompokTani;
use App\Models\Galeri;

class NagariSeeder extends Seeder
{
    public function run(): void
    {
        // =============================================
        // 1. DATA KELOMPOK TANI (7 kelompok dari JS lama)
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
        // 2. DATA GALERI (14 foto dari JS hardcode lama)
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
