<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturLembagaController extends Controller
{
    private function getStrukturPath()
    {
        return 'struktur.json';
    }

    private function getLembagaPath()
    {
        return 'lembaga.json';
    }

    private function getDefaultPemerintah()
    {
        return [
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
        ];
    }

    private function getDefaultBamus()
    {
        return [
            ['jabatan' => 'Ketua', 'nama' => 'WAHYU RESTU SAPUTRA Pnk. Dt Bagindo Rajo'],
            ['jabatan' => 'Wakil Ketua', 'nama' => 'VENDRIANTO'],
            ['jabatan' => 'Sekretaris', 'nama' => 'NELLA AMELIA'],
            ['jabatan' => 'Anggota', 'nama' => 'SANJU YUSAFRINANDA'],
            ['jabatan' => 'Anggota', 'nama' => 'ILHAM S.Pd.I']
        ];
    }

    private function getDefaultLpmn()
    {
        return [
            ['jabatan' => 'Ketua', 'nama' => 'Yusmardi DT. Mandaro Kayo'],
            ['jabatan' => 'Sekretaris', 'nama' => 'Marjuliadi'],
            ['jabatan' => 'Bendahara', 'nama' => 'Marjan Delmi PNK. DT. Rky Basa']
        ];
    }

    private function getDefaultLembaga()
    {
        return [
            ['id' => 'bamus', 'kategori' => 'Pemerintahan & Adat', 'nama' => 'BAMUS (Badan Musyawarah Nagari)', 'ketua' => 'WAHYU RESTU SAPUTRA Pnk. Dt Bagindo Rajo', 'anggota' => '5 Orang', 'hp' => '6281234567890', 'desc' => 'BAMUS merupakan lembaga perwujudan demokrasi dalam penyelenggaraan pemerintahan nagari yang menyalurkan aspirasi masyarakat dan menetapkan Peraturan Nagari bersama Wali Nagari.'],
            ['id' => 'kan', 'kategori' => 'Pemerintahan & Adat', 'nama' => 'KAN (Kerapatan Adat Nagari)', 'ketua' => 'Datuk Sitia', 'anggota' => '12 Ninik Mamak', 'hp' => '6281234567891', 'desc' => 'KAN adalah lembaga tinggi adat yang mengurus dan menyelesaikan sengketa adat, mengayomi hukum adat Minangkabau berlandaskan Adat Basandi Syarak, Syarak Basandi Kitabullah.'],
            ['id' => 'lpmn', 'kategori' => 'Pemerintahan & Adat', 'nama' => 'LPMN (Lembaga Pemberdayaan Masyarakat Nagari)', 'ketua' => 'Yusmardi DT. Mandaro Kayo', 'anggota' => '3 Pengurus', 'hp' => '6281234567894', 'desc' => 'LPMN membantu pemerintah nagari dalam merencanakan dan melaksanakan pembangunan secara bergotong royong.'],
            ['id' => 'paud', 'kategori' => 'Pendidikan & Keagamaan', 'nama' => 'PAUD / TK Nagari Kubang', 'ketua' => 'Ibu Nurbaiti S.Pd', 'anggota' => '45 Murid', 'hp' => '6281234567896', 'desc' => 'Lembaga pendidikan anak usia dini untuk membentuk karakter dasar, kreativitas, dan kesiapan belajar anak-anak nagari.'],
            ['id' => 'sd', 'kategori' => 'Pendidikan & Keagamaan', 'nama' => 'SD Negeri Nagari Kubang', 'ketua' => 'Kepala Sekolah SD', 'anggota' => '120 Murid', 'hp' => '6281234567897', 'desc' => 'Sekolah Dasar negeri penyelenggara pendidikan dasar 6 tahun bagi putra-putri Nagari Kubang Koto Berapak.'],
            ['id' => 'tpa', 'kategori' => 'Pendidikan & Keagamaan', 'nama' => 'TPA / TPQ Masjid Nagari', 'ketua' => 'Ust. Ahmad', 'anggota' => '60 Santri', 'hp' => '6281234567898', 'desc' => 'Taman Pendidikan Al-Qur\'an wadah pembentukan akhlak karimah, baca tulis Al-Qur\'an, dan pendidikan agama Islam bagi anak-anak.'],
            ['id' => 'posyandu', 'kategori' => 'Kesehatan & Sosial', 'nama' => 'Posyandu Balita & Lansia', 'ketua' => 'Kader Kesehatan Nagari', 'anggota' => '15 Kader', 'hp' => '6281234567899', 'desc' => 'Pelayanan kesehatan kemasyarakatan berkala untuk pemantauan tumbuh kembang balita, imunisasi, dan pemeriksaan kesehatan lansia.'],
            ['id' => 'pkk', 'kategori' => 'Kesehatan & Sosial', 'nama' => 'TP-PKK Nagari', 'ketua' => 'Ibu Ratna', 'anggota' => '25 Anggota', 'hp' => '6281234567892', 'desc' => 'Tim Penggerak PKK berperan aktif dalam membina kesejahteraan keluarga, posyandu balita & lansia, serta pemberdayaan ekonomi perempuan di nagari.'],
            ['id' => 'kt', 'kategori' => 'Pemuda & Ekonomi', 'nama' => 'Karang Taruna Tunas Muda', 'ketua' => 'Rizki Bayang', 'anggota' => '35 Pemuda', 'hp' => '6281234567893', 'desc' => 'Wadah pengembangan generasi muda nagari dalam bidang olahraga, seni budaya Randai, serta aksi kemanusiaan dan tanggap bencana.'],
            ['id' => 'bumnag', 'kategori' => 'Pemuda & Ekonomi', 'nama' => 'BUMNag Kubang Berkah', 'ketua' => 'Dedi Saputra', 'anggota' => '7 Pengurus', 'hp' => '6281234567895', 'desc' => 'Badan Usaha Milik Nagari yang mengelola unit usaha pemasaran hasil tani, simpan pinjam, dan sarana produksi pertanian.']
        ];
    }

    private function readJsonData($filename)
    {
        if (Storage::exists($filename)) {
            $content = Storage::get($filename);
            $decoded = json_decode($content, true);
            if (!empty($decoded)) {
                return $decoded;
            }
        }
        
        $path1 = storage_path('app/' . $filename);
        if (file_exists($path1)) {
            $decoded = json_decode(file_get_contents($path1), true);
            if (!empty($decoded)) {
                return $decoded;
            }
        }

        $path2 = storage_path('app/private/' . $filename);
        if (file_exists($path2)) {
            $decoded = json_decode(file_get_contents($path2), true);
            if (!empty($decoded)) {
                return $decoded;
            }
        }

        return [];
    }

    private function writeJsonData($filename, $data)
    {
        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        Storage::put($filename, $json);

        $path1 = storage_path('app/' . $filename);
        @file_put_contents($path1, $json);

        $path2 = storage_path('app/private/' . $filename);
        @file_put_contents($path2, $json);
    }

    public function editStruktur()
    {
        $dbPemerintah = \App\Models\Struktur::where('kategori', 'pemerintah')->orderBy('urutan')->get()->toArray();
        $dbBamus = \App\Models\Struktur::where('kategori', 'bamus')->orderBy('urutan')->get()->toArray();
        $dbLpmn = \App\Models\Struktur::where('kategori', 'lpmn')->orderBy('urutan')->get()->toArray();
        $slogan = \App\Models\Setting::where('key', 'slogan')->value('value') ?? 'BASAMO MANGKO MANJADI';

        if (empty($dbPemerintah) && empty($dbBamus) && empty($dbLpmn)) {
            $data = $this->readJsonData($this->getStrukturPath());
            if (empty($data['pemerintah'])) $data['pemerintah'] = $this->getDefaultPemerintah();
            if (empty($data['bamus'])) $data['bamus'] = $this->getDefaultBamus();
            if (empty($data['lpmn'])) $data['lpmn'] = $this->getDefaultLpmn();
            if (empty($data['slogan'])) $data['slogan'] = $slogan;
        } else {
            $data = [
                'pemerintah' => $dbPemerintah,
                'bamus' => $dbBamus,
                'lpmn' => $dbLpmn,
                'slogan' => $slogan,
            ];
        }

        return view('admin.struktur.edit', compact('data'));
    }

    public function updateStruktur(Request $request)
    {
        $slogan = $request->input('slogan', 'BASAMO MANGKO MANJADI');
        \App\Models\Setting::updateOrCreate(['key' => 'slogan'], ['value' => $slogan]);

        $categories = ['pemerintah', 'bamus', 'lpmn'];
        $payload = ['slogan' => $slogan];

        \App\Models\Struktur::truncate();

        foreach ($categories as $cat) {
            $items = array_values($request->input($cat, []));
            $processed = [];

            foreach ($items as $idx => $item) {
                if (!empty($item['nama']) || !empty($item['jabatan'])) {
                    \App\Models\Struktur::create([
                        'nama' => $item['nama'] ?? '',
                        'jabatan' => $item['jabatan'] ?? '',
                        'kategori' => $cat,
                        'foto' => null,
                        'urutan' => $idx + 1,
                    ]);

                    $processed[] = [
                        'jabatan' => $item['jabatan'] ?? '',
                        'nama' => $item['nama'] ?? '',
                        'foto' => null,
                    ];
                }
            }

            $payload[$cat] = $processed;
        }

        $this->writeJsonData($this->getStrukturPath(), $payload);

        return redirect()->back()->with('success', 'Struktur Nagari berhasil diperbarui di database.');
    }

    public function editLembaga()
    {
        $dbItems = \App\Models\Lembaga::all();
        
        if ($dbItems->count() > 0) {
            $data = $dbItems->map(function($l) {
                return [
                    'id' => $l->id,
                    'kategori' => $l->kategori ?? 'Pemerintahan & Adat',
                    'nama' => $l->nama_lembaga,
                    'ketua' => $l->ketua,
                    'anggota' => $l->jumlah_anggota,
                    'hp' => $l->nomor_hp,
                    'desc' => $l->deskripsi,
                ];
            })->toArray();
        } else {
            $data = $this->readJsonData($this->getLembagaPath());
            if (empty($data)) {
                $data = $this->getDefaultLembaga();
            }
        }

        return view('admin.lembaga.edit', compact('data'));
    }

    public function updateLembaga(Request $request)
    {
        $items = array_values($request->input('items', []));

        // Sync with database table lembagas
        \App\Models\Lembaga::truncate();
        foreach ($items as $item) {
            if (!empty($item['nama'])) {
                \App\Models\Lembaga::create([
                    'nama_lembaga' => $item['nama'],
                    'kategori' => $item['kategori'] ?? 'Pemerintahan & Adat',
                    'ketua' => $item['ketua'] ?? '',
                    'jumlah_anggota' => $item['anggota'] ?? '',
                    'nomor_hp' => $item['hp'] ?? '',
                    'deskripsi' => $item['desc'] ?? '',
                ]);
            }
        }

        // Sync with JSON file for fallback
        $this->writeJsonData($this->getLembagaPath(), $items);

        return redirect()->back()->with('success', 'Daftar Lembaga Nagari berhasil diperbarui di database.');
    }
}

