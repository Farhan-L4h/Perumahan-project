<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id('properties_id');
            $table->unsignedBigInteger('agen_id')->index();
            $table->unsignedBigInteger('kategori_id')->index();
            $table->string('image');
            $table->string('nama');
            $table->integer('harga');
            $table->text('deskripsi');
            $table->enum('status', ['disewa', 'dijual', 'tersedia', 'tidak tersedia']);
            $table->string('luas_bangunan');
            $table->string('luas_tanah');
            $table->string('alamat');
            $table->string('kota');
            $table->integer('kamar_tidur')->nullable();
            $table->integer('kamar_mandi')->nullable();
            $table->timestamps();

            $table->foreign('agen_id')->references('agen_id')->on('agens')->onDelete('cascade');
            $table->foreign('kategori_id')->references('kategori_id')->on('kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
