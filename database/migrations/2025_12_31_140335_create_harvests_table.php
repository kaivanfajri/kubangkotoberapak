<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('harvests', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelompok_tani');
            $table->string('hasil_pertanian');
            $table->string('varian');
            $table->string('Total_panen');
            $table->string('Stok_tersedia');
            $table->string('nomor_hp');
            $table->date('tanggal_panen');
            $table->string('lokasi');
            $table->string('public_code')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('harvests');
    }
};