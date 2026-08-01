<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KelompokTani;
use App\Models\Galeri;
use App\Models\Lembaga;

class NagariSeeder extends Seeder
{
    public function run(): void
    {
        // =============================================
        // 1. DATA KELOMPOK TANI (7 kelompok)
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
        // 2. DATA GALERI (14 foto)
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

        // =============================================
        // 3. DATA LEMBAGA (Diarahkan dari storage/app/lembaga.json jika ada)
        // =============================================
        $jsonPath = storage_path('app/lembaga.json');
        if (file_exists($jsonPath)) {
            $jsonItems = json_decode(file_get_contents($jsonPath), true);
            if (!empty($jsonItems)) {
                Lembaga::truncate();
                foreach ($jsonItems as $item) {
                    if (!empty($item['nama'])) {
                        Lembaga::create([
                            'nama_lembaga' => $item['nama'],
                            'kategori' => $item['kategori'] ?? 'Pemerintahan & Adat',
                            'ketua' => $item['ketua'] ?? '',
                            'jumlah_anggota' => $item['anggota'] ?? '',
                            'nomor_hp' => $item['hp'] ?? '',
                            'deskripsi' => $item['desc'] ?? '',
                        ]);
                    }
                }
            }
        } else {
            $lembagas = [
            ['nama_lembaga' => 'BAMUS (Badan Musyawarah Nagari)', 'kategori' => 'Pemerintahan & Adat', 'ketua' => 'WAHYU RESTU SAPUTRA Pnk. Dt Bagindo Rajo', 'jumlah_anggota' => '5 Orang', 'nomor_hp' => '', 'deskripsi' => 'BAMUS merupakan lembaga perwujudan demokrasi dalam penyelenggaraan pemerintahan nagari yang menyalurkan aspirasi masyarakat dan menetapkan Peraturan Nagari bersama Wali Nagari.'],
            ['nama_lembaga' => 'KAN (Kerapatan Adat Nagari)', 'kategori' => 'Pemerintahan & Adat', 'ketua' => 'Datuk Sitia', 'jumlah_anggota' => '12 Ninik Mamak', 'nomor_hp' => '', 'deskripsi' => 'KAN adalah lembaga tinggi adat yang mengurus dan menyelesaikan sengketa adat, mengayomi hukum adat Minangkabau berlandaskan Adat Basandi Syarak, Syarak Basandi Kitabullah.'],
            ['nama_lembaga' => 'LPMN (Lembaga Pemberdayaan Masyarakat Nagari)', 'kategori' => 'Pemerintahan & Adat', 'ketua' => 'Yusmardi DT. Mandaro Kayo', 'jumlah_anggota' => '3 Pengurus', 'nomor_hp' => '', 'deskripsi' => 'LPMN membantu pemerintah nagari dalam merencanakan dan melaksanakan pembangunan secara bergotong royong.'],
            ['nama_lembaga' => 'PAUD / TK Nagari Kubang', 'kategori' => 'Pendidikan & Keagamaan', 'ketua' => 'Ibu Nurbaiti S.Pd', 'jumlah_anggota' => '45 Murid', 'nomor_hp' => '', 'deskripsi' => 'Lembaga pendidikan anak usia dini untuk membentuk karakter dasar, kreativitas, dan kesiapan belajar anak-anak nagari.'],
            ['nama_lembaga' => 'SD Negeri Nagari Kubang', 'kategori' => 'Pendidikan & Keagamaan', 'ketua' => 'Kepala Sekolah SD', 'jumlah_anggota' => '120 Murid', 'nomor_hp' => '', 'deskripsi' => 'Sekolah Dasar negeri penyelenggara pendidikan dasar 6 tahun bagi putra-putri Nagari Kubang Koto Berapak.'],
            ['nama_lembaga' => 'TPA / TPQ Masjid Nagari', 'kategori' => 'Pendidikan & Keagamaan', 'ketua' => 'Ust. Ahmad', 'jumlah_anggota' => '60 Santri', 'nomor_hp' => '', 'deskripsi' => 'Taman Pendidikan Al-Qur\'an wadah pembentukan akhlak karimah, baca tulis Al-Qur\'an, dan pendidikan agama Islam bagi anak-anak.'],
            ['nama_lembaga' => 'Posyandu Balita & Lansia', 'kategori' => 'Kesehatan & Sosial', 'ketua' => 'Kader Kesehatan Nagari', 'jumlah_anggota' => '15 Kader', 'nomor_hp' => '', 'deskripsi' => 'Pelayanan kesehatan kemasyarakatan berkala untuk pemantauan tumbuh kembang balita, imunisasi, dan pemeriksaan kesehatan lansia.'],
            ['nama_lembaga' => 'TP-PKK Nagari', 'kategori' => 'Kesehatan & Sosial', 'ketua' => 'Ibu Ratna', 'jumlah_anggota' => '25 Anggota', 'nomor_hp' => '', 'deskripsi' => 'Tim Penggerak PKK berperan aktif dalam membina kesejahteraan keluarga, posyandu balita & lansia, serta pemberdayaan ekonomi perempuan di nagari.'],
            ['nama_lembaga' => 'Karang Taruna Tunas Muda', 'kategori' => 'Pemuda & Ekonomi', 'ketua' => 'Rizki Bayang', 'jumlah_anggota' => '35 Pemuda', 'nomor_hp' => '', 'deskripsi' => 'Wadah pengembangan generasi muda nagari dalam bidang olahraga, seni budaya Randai, serta aksi kemanusiaan dan tanggap bencana.'],
            ['nama_lembaga' => 'BUMNag Kubang Berkah', 'kategori' => 'Pemuda & Ekonomi', 'ketua' => 'Dedi Saputra', 'jumlah_anggota' => '7 Pengurus', 'nomor_hp' => '', 'deskripsi' => 'Badan Usaha Milik Nagari yang mengelola unit usaha pemasaran hasil tani, simpan pinjam, dan sarana produksi pertanian.'],
        ];

        foreach ($lembagas as $l) {
            Lembaga::firstOrCreate(['nama_lembaga' => $l['nama_lembaga']], $l);
        }
        }

        // =============================================
        // 4. DATA STRUKTUR NAGARI (Ke Database Table 'strukturs')
        // =============================================
        \App\Models\Setting::updateOrCreate(['key' => 'slogan'], ['value' => 'BASAMO MANGKO MANJADI']);
        
        $strukturJsonPath = storage_path('app/struktur.json');
        if (file_exists($strukturJsonPath)) {
            $sData = json_decode(file_get_contents($strukturJsonPath), true);
            if (!empty($sData)) {
                if (!empty($sData['slogan'])) {
                    \App\Models\Setting::updateOrCreate(['key' => 'slogan'], ['value' => $sData['slogan']]);
                }
                \App\Models\Struktur::truncate();
                $categories = ['pemerintah', 'bamus', 'lpmn'];
                foreach ($categories as $cat) {
                    if (!empty($sData[$cat]) && is_array($sData[$cat])) {
                        foreach ($sData[$cat] as $idx => $item) {
                            \App\Models\Struktur::create([
                                'nama' => $item['nama'] ?? '',
                                'jabatan' => $item['jabatan'] ?? '',
                                'kategori' => $cat,
                                'foto' => $item['foto'] ?? null,
                                'urutan' => $idx + 1,
                            ]);
                        }
                    }
                }
                return;
            }
        }

        \App\Models\Struktur::truncate();
        $defaultStruktur = [
            'pemerintah' => [
                ['jabatan' => 'Wali Nagari', 'nama' => 'Pj. NAZAMI EFENDI'],
                ['jabatan' => 'Sekretaris Nagari', 'nama' => 'FITRA S.E'],
                ['jabatan' => 'Kaur Perencanaan', 'nama' => 'IRWANSYAH'],
                ['jabatan' => 'Kaur Keuangan', 'nama' => 'IBNU NURSIDIQ'],
                ['jabatan' => 'Kaur TU & Umum', 'nama' => 'DAYU NIRMALA DEWI S.E'],
                ['jabatan' => 'Kasi Pemerintahan', 'nama' => 'LIRA MARLINA'],
                ['jabatan' => 'Kasi Kesejahteraan dan Pelayanan', 'nama' => 'DITA MILENIA S.Si'],
                ['jabatan' => 'Staf Nagari', 'nama' => 'ALVI MAHENDRA'],
                ['jabatan' => 'Staf Bamus', 'nama' => 'WELLA SILVIKA S.Pd.I'],
                ['jabatan' => 'Wali Kampung Kubang', 'nama' => 'EM ROMI'],
                ['jabatan' => 'Wali Kampung Lembah Gumanti', 'nama' => 'WAN FEBRINDO S.Pd']
            ],
            'bamus' => [
                ['jabatan' => 'Ketua', 'nama' => 'WAHYU RESTU SAPUTRA PNK. DT BAGINDO RAJO'],
                ['jabatan' => 'Wakil Ketua', 'nama' => 'VENDRIANTO'],
                ['jabatan' => 'Sekretaris', 'nama' => 'NELLA AMELIA'],
                ['jabatan' => 'Anggota', 'nama' => 'SANJU YUSAFRINANDA'],
                ['jabatan' => 'Anggota', 'nama' => 'ILHAM S.Pd.I']
            ],
            'lpmn' => [
                ['jabatan' => 'Ketua', 'nama' => 'YUSMARDI DT. MANDARO KAYO'],
                ['jabatan' => 'Sekretaris', 'nama' => 'MARJUALIADI'],
                ['jabatan' => 'Bendahara', 'nama' => 'MARJAN DELMI PNK. DT. RANGKAYO BASA']
            ]
        ];

        foreach ($defaultStruktur as $cat => $items) {
            foreach ($items as $idx => $item) {
                \App\Models\Struktur::create([
                    'nama' => $item['nama'],
                    'jabatan' => $item['jabatan'],
                    'kategori' => $cat,
                    'urutan' => $idx + 1,
                ]);
            }
        }
    }
}
