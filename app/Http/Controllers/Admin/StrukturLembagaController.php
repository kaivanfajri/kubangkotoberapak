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
            ['jabatan' => 'Wali Nagari', 'nama' => 'NOVRIADI'],
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
            ['id' => 'bamus', 'nama' => 'BAMUS (Badan Musyawarah Nagari)', 'ketua' => 'WAHYU RESTU SAPUTRA Pnk. Dt Bagindo Rajo', 'anggota' => '5 Orang', 'hp' => '6281234567890', 'desc' => 'BAMUS merupakan lembaga perwujudan demokrasi dalam penyelenggaraan pemerintahan nagari yang menyalurkan aspirasi masyarakat dan menetapkan Peraturan Nagari bersama Wali Nagari.'],
            ['id' => 'kan', 'nama' => 'KAN (Kerapatan Adat Nagari)', 'ketua' => 'Datuk Sitia', 'anggota' => '12 Ninik Mamak', 'hp' => '6281234567891', 'desc' => 'KAN adalah lembaga tinggi adat yang mengurus dan menyelesaikan sengketa adat, mengayomi hukum adat Minangkabau berlandaskan Adat Basandi Syarak, Syarak Basandi Kitabullah.'],
            ['id' => 'lpmn', 'nama' => 'LPMN (Lembaga Pemberdayaan Masyarakat Nagari)', 'ketua' => 'Yusmardi DT. Mandaro Kayo', 'anggota' => '3 Pengurus', 'hp' => '6281234567894', 'desc' => 'LPMN membantu pemerintah nagari dalam merencanakan dan melaksanakan pembangunan secara bergotong royong.'],
            ['id' => 'pkk', 'nama' => 'TP-PKK Nagari', 'ketua' => 'Ibu Ratna', 'anggota' => '25 Anggota', 'hp' => '6281234567892', 'desc' => 'Tim Penggerak PKK berperan aktif dalam membina kesejahteraan keluarga, posyandu balita & lansia, serta pemberdayaan ekonomi perempuan di nagari.'],
            ['id' => 'kt', 'nama' => 'Karang Taruna Tunas Muda', 'ketua' => 'Rizki Bayang', 'anggota' => '35 Pemuda', 'hp' => '6281234567893', 'desc' => 'Wadah pengembangan generasi muda nagari dalam bidang olahraga, seni budaya Randai, serta aksi kemanusiaan dan tanggap bencana.'],
            ['id' => 'bumnag', 'nama' => 'BUMNag Kubang Berkah', 'ketua' => 'Dedi Saputra', 'anggota' => '7 Pengurus', 'hp' => '6281234567895', 'desc' => 'Badan Usaha Milik Nagari yang mengelola unit usaha pemasaran hasil tani, simpan pinjam, dan sarana produksi pertanian.']
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
        $data = $this->readJsonData($this->getStrukturPath());

        if (empty($data['pemerintah'])) {
            $data['pemerintah'] = $this->getDefaultPemerintah();
        }
        if (empty($data['bamus'])) {
            $data['bamus'] = $this->getDefaultBamus();
        }
        if (empty($data['lpmn'])) {
            $data['lpmn'] = $this->getDefaultLpmn();
        }
        if (empty($data['slogan'])) {
            $data['slogan'] = 'Basamo Mangko Manjadi';
        }

        return view('admin.struktur.edit', compact('data'));
    }

    public function updateStruktur(Request $request)
    {
        $payload = [
            'slogan' => $request->input('slogan', 'Basamo Mangko Manjadi'),
            'pemerintah' => array_values($request->input('pemerintah', [])),
            'bamus' => array_values($request->input('bamus', [])),
            'lpmn' => array_values($request->input('lpmn', []))
        ];

        $this->writeJsonData($this->getStrukturPath(), $payload);

        return redirect()->back()->with('success', 'Struktur Pemerintahan Nagari berhasil diperbarui.');
    }

    public function editLembaga()
    {
        $data = $this->readJsonData($this->getLembagaPath());

        if (empty($data)) {
            $data = $this->getDefaultLembaga();
        }

        return view('admin.lembaga.edit', compact('data'));
    }

    public function updateLembaga(Request $request)
    {
        $items = array_values($request->input('items', []));

        $this->writeJsonData($this->getLembagaPath(), $items);

        return redirect()->back()->with('success', 'Daftar Lembaga Nagari berhasil diperbarui.');
    }
}

