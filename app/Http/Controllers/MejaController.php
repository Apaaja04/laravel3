<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    // Fungsi untuk menampilkan halaman Meja
    public function meja()
    {
        // Ambil ID reservasi dari session
        $reservasiId = session('reservasi_id');
        
        // Ambil data reservasi berdasarkan ID dari session
        $reservasi = Reservasi::findOrFail($reservasiId);

        // Ambil semua data meja yang tersedia
        $mejas = Meja::all();

        // Tampilkan halaman Meja dengan data reservasi dan meja
        return view('reservasi.meja', compact('reservasi', 'mejas'));
    }

    // Fungsi untuk menyimpan pemilihan meja
    public function store(Request $request)
    {
        // Ambil ID reservasi dari session
        $reservasiId = session('reservasi_id');

        // Validasi pilihan meja
        $request->validate([
            'meja' => 'required|exists:mejas,id',
        ]);

        // Simpan pemilihan meja
        // Anda bisa menambahkan logika untuk menyimpan pemesanan atau data terkait

        // Redirect ke halaman berikutnya (misalnya konfirmasi pemesanan)
        return redirect()->route('pemesanan.index'); // Sesuaikan dengan rute yang ada
    }
}

