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
        if (!Schema::hasTable('reservasis')) { // Cek apakah tabel sudah ada sebelum dibuat
            Schema::create('reservasis', function (Blueprint $table) {
                $table->id();
                $table->foreignId('id_user')->nullable()->constrained('users')->nullOnDelete();
                $table->string('nama_lengkap');
                $table->date('tanggal_reservasi');
                $table->time('waktu_reservasi');
                $table->integer('jumlah_orang');
                $table->text('catatan_tambahan')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis'); // Hapus tabel saat rollback
    }
};
