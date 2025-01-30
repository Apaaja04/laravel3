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
        Schema::create('mejas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();  // Gunakan user_id agar lebih konsisten
            $table->integer('kode_meja');
            $table->enum('status_pemesanan', ['tersedia', 'dipesan'])->default('tersedia'); // Menambahkan default value
            $table->softDeletes(); // Perbaikan penulisan softDeletes()
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mejas');
    }
};

