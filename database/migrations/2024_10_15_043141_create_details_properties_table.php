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
        Schema::create('details_properties', function (Blueprint $table) {
            $table->id('details_properties_id');
            $table->unsignedBigInteger('properties_id');
            $table->string('luas_bagunan');
            $table->string('luas_tanah');
            $table->string('fasilitas')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('alamat');
            $table->date('tgl_bng');
            $table->integer('kamar_tidur')->nullable();
            $table->integer('kamar_mandi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_properties');
    }
};
