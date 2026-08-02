<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Definisi semua setting keys beserta default values dan label.
     */
    private function getSettingDefinitions(): array
    {
        return [
            'slogan' => [
                'label' => 'Slogan Nagari',
                'type' => 'text',
                'default' => 'BASAMO MANGKO MANJADI',
                'placeholder' => 'Contoh: BASAMO MANGKO MANJADI',
            ],
            'visi' => [
                'label' => 'Visi Nagari',
                'type' => 'textarea',
                'default' => 'Terwujudnya Nagari Kubang Koto Berapak sebagai Nagari mandiri, berdaya saing, adil, dan bersatu dalam mensejahterakan masyarakat berlandaskan adat basandi syarak, syarak basandi Kitabullah.',
                'placeholder' => 'Masukkan visi nagari...',
            ],
            'misi' => [
                'label' => 'Misi Nagari',
                'type' => 'textarea',
                'default' => "Mewujudkan penyelenggaraan pemerintahan yang transparan & partisipatif.\nMengembangkan sistem perekonomian berbasis potensi pertanian & peternakan.\nPeningkatan pembangunan infrastruktur sarana umum nagari.\nMemperkuat nilai-nilai agama, norma adat, dan budaya kebersamaan Minangkabau.",
                'placeholder' => 'Satu misi per baris...',
                'help' => 'Tulis satu poin misi per baris. Setiap baris akan ditampilkan sebagai satu butir misi.',
            ],
            'email_nagari' => [
                'label' => 'Email Nagari',
                'type' => 'email',
                'default' => 'nagari.kubangkotoberapak@gmail.com',
                'placeholder' => 'email@nagari.desa.id',
            ],
            'jam_kerja' => [
                'label' => 'Jam Kerja Kantor',
                'type' => 'text',
                'default' => 'Senin–Jumat, 08.00–16.00 WIB',
                'placeholder' => 'Contoh: Senin–Jumat, 08.00–16.00 WIB',
            ],
            'alamat_kantor' => [
                'label' => 'Alamat Kantor Nagari',
                'type' => 'textarea',
                'default' => 'Kantor Wali Nagari Kubang Koto Berapak, Kec. Bayang, Kab. Pesisir Selatan, Sumatera Barat',
                'placeholder' => 'Alamat lengkap kantor nagari...',
            ],
            'video_profil_url' => [
                'label' => 'URL Video Profil (YouTube Embed)',
                'type' => 'url',
                'default' => 'https://www.youtube.com/embed/aQ5y-pAzR8k',
                'placeholder' => 'https://www.youtube.com/embed/...',
                'help' => 'Gunakan link embed YouTube (format: https://www.youtube.com/embed/VIDEO_ID)',
            ],
        ];
    }

    /**
     * Tampilkan form edit pengaturan website.
     */
    public function edit()
    {
        $definitions = $this->getSettingDefinitions();
        $stored = Setting::pluck('value', 'key')->toArray();

        $settings = [];
        foreach ($definitions as $key => $def) {
            $settings[$key] = [
                'value' => $stored[$key] ?? $def['default'],
                'label' => $def['label'],
                'type' => $def['type'],
                'placeholder' => $def['placeholder'] ?? '',
                'help' => $def['help'] ?? '',
                'default' => $def['default'],
            ];
        }

        return view('admin.settings.edit', compact('settings'));
    }

    /**
     * Simpan pengaturan website.
     */
    public function update(Request $request)
    {
        $definitions = $this->getSettingDefinitions();

        foreach ($definitions as $key => $def) {
            $value = $request->input($key, $def['default']);
            Setting::setValue($key, $value);
        }

        return redirect()->back()->with('success', 'Pengaturan website berhasil disimpan.');
    }
}
