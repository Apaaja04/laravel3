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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->cascadeonDelete(); // Foreign key ke users
            $table->foreignId('id_pemesanan')->constrained('pemesanans')->cascadeonDelete(); // Foreign key ke pemesanans
            $table->enum('metode_pembayaran', ['bca'], ['bri'], ['mandiri'] );
            $table->enum('status_payment', ['pending', 'paid', 'failed'])->default('pending'); // Status pembayaran
            $table->decimal('total_bayar', 10, 2); // Total bayar
            $table->string('bukti_foto')->nullable(); // Bukti foto pembayaran
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
