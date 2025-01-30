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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->cascadeOnDelete(); // Pastikan foreign key benar
            $table->string('nama_menu'); // Menggunakan string untuk varchar
            $table->decimal('harga', 10, 3);
            $table->string('jenis_makanan'); // Menggunakan string untuk varchar
            $table->string('foto'); // Menggunakan string untuk menyimpan path gambar
            $table->softDeletes(); // Perbaiki typo softDeletes()
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
