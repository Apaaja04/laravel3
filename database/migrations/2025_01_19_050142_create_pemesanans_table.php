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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan')->constrained('users')->cascadeonDelete(); // Foreign key ke users
            $table->foreignId('id_meja')->constrained('mejas')->cascadeonDelete(); // Foreign key ke mejas
            $table->foreignId('id_menu')->constrained('menus')->cascadeonDelete(); // Foreign key ke menus
            $table->integer('total_harga'); 
            $table->softDeldetes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
