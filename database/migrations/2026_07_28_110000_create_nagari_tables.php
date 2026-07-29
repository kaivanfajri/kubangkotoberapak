<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 200);
            $table->string('slug', 200)->unique();
            $table->string('kategori', 50);
            $table->longText('konten');
            $table->string('gambar', 255)->nullable();
            $table->date('tanggal_terbit');
            $table->enum('status', ['Terbit', 'Draft'])->default('Draft');
            $table->timestamps();
        });

        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha', 150);
            $table->string('pemilik', 100);
            $table->string('kategori', 50);
            $table->string('alamat', 200);
            $table->string('nomor_wa', 20);
            $table->string('jam_operasional', 100)->nullable();
            $table->text('deskripsi');
            $table->string('foto', 255)->nullable();
            $table->text('produk_utama')->nullable();
            $table->timestamps();
        });

        Schema::create('kelompok_tanis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelompok', 100);
            $table->string('ketua', 100);
            $table->string('jorong', 100);
            $table->integer('jumlah_anggota');
            $table->string('luas_lahan', 50);
            $table->string('komoditas_utama', 100);
            $table->string('produktivitas', 50);
            $table->enum('status', ['Aktif', 'Non-Aktif'])->default('Aktif');
            $table->timestamps();
        });

        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('caption', 200);
            $table->string('kategori', 50);
            $table->string('gambar', 255);
            $table->timestamps();
        });

        Schema::create('strukturs', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150);
            $table->string('jabatan', 100);
            $table->string('kategori', 20);
            $table->string('foto', 255)->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });

        Schema::create('lembagas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lembaga', 150);
            $table->string('ketua', 100);
            $table->string('jumlah_anggota', 50);
            $table->string('nomor_hp', 20);
            $table->text('deskripsi');
            $table->string('logo', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key', 50)->unique();
            $table->text('value');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('lembagas');
        Schema::dropIfExists('strukturs');
        Schema::dropIfExists('galeris');
        Schema::dropIfExists('kelompok_tanis');
        Schema::dropIfExists('umkms');
        Schema::dropIfExists('beritas');
    }
};
