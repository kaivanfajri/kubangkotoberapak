<?php

use App\Http\Controllers\Admin\HarvestController;
use App\Http\Controllers\Admin\StrukturLembagaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\KelompokTaniController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\PublicHarvestController;
use App\Http\Controllers\ProfileController;
use App\Models\Berita;
use App\Models\Umkm;
use App\Models\KelompokTani;
use App\Models\Galeri;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('nagari');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/pertanian', function () {
    $kelompokTanis = KelompokTani::all()->map(function($kt) {
        return [
            'id' => 'kt-'.$kt->id,
            'nama' => $kt->nama_kelompok,
            'ketua' => $kt->ketua,
            'hp' => '',
            'alamat' => $kt->jorong,
            'anggota' => $kt->jumlah_anggota,
            'luas' => $kt->luas_lahan,
            'komoditas' => $kt->komoditas_utama,
            'produktivitas' => $kt->produktivitas,
            'status' => $kt->status,
            'members' => [],
        ];
    })->values();
    return view('pertanian', compact('kelompokTanis'));
})->name('pertanian');

Route::get('/Sejarah', function () {
    return view('Sejarah');
})->name('Sejarah');

Route::get('/Peternakan', function () {
    return view('Peternakan');
})->name('Peternakan');

Route::get('/struktur', function () {
    $strukturData = [];
    if (Storage::exists('struktur.json')) {
        $strukturData = json_decode(Storage::get('struktur.json'), true) ?? [];
    }
    if (empty($strukturData) && file_exists(storage_path('app/struktur.json'))) {
        $strukturData = json_decode(file_get_contents(storage_path('app/struktur.json')), true) ?? [];
    }
    if (empty($strukturData) && file_exists(storage_path('app/private/struktur.json'))) {
        $strukturData = json_decode(file_get_contents(storage_path('app/private/struktur.json')), true) ?? [];
    }
    return view('struktur', compact('strukturData'));
})->name('struktur');

Route::get('/lembaga', function () {
    $dbItems = \App\Models\Lembaga::all();
    if ($dbItems->count() > 0) {
        $lembagaData = $dbItems->map(function($l) {
            return [
                'id' => 'l'.$l->id,
                'kategori' => $l->kategori ?? 'Pemerintahan & Adat',
                'nama' => $l->nama_lembaga,
                'ketua' => $l->ketua,
                'anggota' => $l->jumlah_anggota,
                'hp' => $l->nomor_hp,
                'desc' => $l->deskripsi,
            ];
        })->toArray();
    } else {
        $lembagaData = [];
        if (Storage::exists('lembaga.json')) {
            $lembagaData = json_decode(Storage::get('lembaga.json'), true) ?? [];
        }
    }
    return view('lembaga', compact('lembagaData'));
})->name('lembaga');

Route::get('/umkm', function () {
    $umkms = Umkm::all()->map(function($u) {
        $rawGallery = is_array($u->galeri_foto) ? $u->galeri_foto : [];
        if ($u->foto && !in_array($u->foto, $rawGallery)) {
            array_unshift($rawGallery, $u->foto);
        }
        $galleryImages = array_map(function($path) {
            return str_starts_with($path, 'http') ? $path : asset('storage/' . $path);
        }, array_values(array_filter($rawGallery)));

        if (empty($galleryImages)) {
            $galleryImages = [asset('Komoditi10.jpeg')];
        }

        return [
            'id' => 'u'.$u->id,
            'nama' => $u->nama_usaha,
            'kategori' => $u->kategori,
            'pemilik' => $u->pemilik,
            'hp' => $u->nomor_wa,
            'jam' => $u->jam_operasional ?? '08:00 - 17:00 WIB',
            'alamat' => $u->alamat,
            'img' => $galleryImages[0],
            'gallery' => $galleryImages,
            'desc' => $u->deskripsi,
            'products' => is_array($u->produk_utama) ? $u->produk_utama : (empty($u->produk_utama) ? [] : json_decode($u->produk_utama, true) ?? []),
        ];
    })->values();
    return view('umkm', compact('umkms'));
})->name('umkm');

Route::get('/galeri', function () {
    $galeris = Galeri::all()->map(function($g) {
        return [
            'src' => '/storage/'.$g->gambar,
            'cat' => $g->kategori,
            'cap' => $g->caption,
        ];
    })->values();
    return view('galeri', compact('galeris'));
})->name('galeri');

Route::get('/berita', function () {
    $beritas = Berita::terbit()->latest('tanggal_terbit')->paginate(9);
    return view('berita', compact('beritas'));
})->name('berita');

Route::get('/berita/{slug}', function ($slug) {
    $berita = Berita::where('slug', $slug)->where('status', 'Terbit')->firstOrFail();
    return view('berita-detail', compact('berita'));
})->name('berita.show');

Route::get('/harvest/{public_code}', [PublicHarvestController::class, 'show'])
    ->name('harvest.public');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/harvests/uml', 'admin.harvests.uml')->name('harvests.uml');
    Route::resource('harvests', HarvestController::class);

    // Berita, UMKM, Kelompok Tani, Galeri
    Route::resource('berita', BeritaController::class)->except(['show']);
    Route::resource('umkm', UmkmController::class)->except(['show']);
    Route::resource('kelompok-tani', KelompokTaniController::class)->except(['show']);
    Route::resource('galeri', GaleriController::class)->only(['index', 'create', 'store', 'destroy']);

    // Dynamic Admin Management for Struktur & Lembaga
    Route::get('/struktur', [StrukturLembagaController::class, 'editStruktur'])->name('struktur.edit');
    Route::post('/struktur', [StrukturLembagaController::class, 'updateStruktur'])->name('struktur.update');
    Route::get('/lembaga', [StrukturLembagaController::class, 'editLembaga'])->name('lembaga.edit');
    Route::post('/lembaga', [StrukturLembagaController::class, 'updateLembaga'])->name('lembaga.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';