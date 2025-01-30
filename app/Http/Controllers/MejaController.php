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
        
        // Pastikan session ada dan valid
        if (!$reservasiId) {
            return redirect()->route('reservasi.menu')->with('error', 'Session reservasi tidak ditemukan!');
        }

        // Ambil data reservasi berdasarkan ID dari session
        $reservasi = Reservasi::findOrFail($reservasiId);

        // Ambil semua data meja yang tersedia (status_pemesanan = 'tersedia')
        $mejas = Meja::where('status_pemesanan', 'tersedia')->whereNull('deleted_at')->get();  // Ambil hanya meja yang tersedia dan belum dihapus

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
        'meja' => 'required|exists:mejas,id|not_in:' . implode(',', Meja::where('status_pemesanan', 'dipesan')->pluck('id')->toArray()), // Pastikan meja belum terreservasi
    ]);

    // Ambil meja berdasarkan ID
    $meja = Meja::findOrFail($request->meja);

    // Pastikan meja tersedia
    if ($meja->status_pemesanan !== 'tersedia') {
        return redirect()->back()->with('error', 'Meja sudah terreservasi.');
    }

    // Simpan pemilihan meja ke reservasi
    $reservasi = Reservasi::findOrFail($reservasiId);
    $reservasi->meja_id = $meja->id;  // Asumsikan tabel Reservasi memiliki kolom meja_id
    $reservasi->status = 'reserved';  // Update status reservasi
    $reservasi->save();

    // Update status meja menjadi terreservasi
    $meja->status_pemesanan = 'dipesan';
    $meja->save();

    // Redirect ke halaman menu setelah pemesanan meja berhasil
    return redirect()->route('reservasi.menu', ['id' => $reservasiId])->with('success', 'Meja berhasil direservasi!');

   }

};
