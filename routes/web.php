<?php

use App\Http\Controllers\Admin\HarvestController;
use App\Http\Controllers\Admin\StrukturLembagaController;
use App\Http\Controllers\PublicHarvestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('nagari');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/pertanian', function () {
    return view('pertanian');
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
    return view('umkm');
})->name('umkm');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');

Route::get('/harvest/{public_code}', [PublicHarvestController::class, 'show'])
    ->name('harvest.public');
    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/harvests/uml', 'admin.harvests.uml')
            ->name('harvests.uml');
    Route::resource('harvests', HarvestController::class);

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