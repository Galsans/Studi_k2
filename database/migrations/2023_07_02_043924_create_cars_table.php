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
        //
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('namaMobil');
            $table->string('slug');
            $table->integer('harga');
            $table->integer('denda');
            $table->text('img');
            $table->string('bahan_bakar');
            $table->string('jumlah_kursi');
            $table->string('transmisi');
            $table->text('dkr');
            $table->string('status');
            // $table->foreignId('id_rental')->references('id')->on('rental')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('cars');
    }
};
