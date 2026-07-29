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
            'hp' => '6281234567890',
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
    $lembagaData = [];
    if (Storage::exists('lembaga.json')) {
        $lembagaData = json_decode(Storage::get('lembaga.json'), true) ?? [];
    }
    if (empty($lembagaData) && file_exists(storage_path('app/lembaga.json'))) {
        $lembagaData = json_decode(file_get_contents(storage_path('app/lembaga.json')), true) ?? [];
    }
    if (empty($lembagaData) && file_exists(storage_path('app/private/lembaga.json'))) {
        $lembagaData = json_decode(file_get_contents(storage_path('app/private/lembaga.json')), true) ?? [];
    }
    return view('lembaga', compact('lembagaData'));
})->name('lembaga');

Route::get('/umkm', function () {
    $umkms = Umkm::all();
    return view('umkm', compact('umkms'));
})->name('umkm');

Route::get('/galeri', function () {
    $galeris = Galeri::all();
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