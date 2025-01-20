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
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
            $table->string('nama_lengkap');
            $table->date('tanggal_reservasi');
            $table->time('waktu_reservasi');
            $table->integer('jumlah_orang');
            $table->text('catatan_tambahan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservasis', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->nullable(false)->change(); // Kembalikan ke NOT NULL jika rollback
        });
    }
};
