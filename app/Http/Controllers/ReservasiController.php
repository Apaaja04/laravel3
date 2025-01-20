<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservasi; // Import model Reservasi
use Illuminate\Http\Request;


class ReservasiController extends Controller
{
    public function tampilForm()
    {
        return view('form'); 
        
        
    }

    public function submitForm(Request $request)
    {
        // Validasi input dari request
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_reservasi' => 'required|date',
            'waktu_reservasi' => 'required|date_format:H:i',
            'jumlah_orang' => 'required|integer',
            'catatan_tambahan' => 'nullable|string',
        ]);
    
        // Simpan data ke database
        $reservasi = new Reservasi();
        $reservasi->nama_lengkap = $validated['nama_lengkap'];
        $reservasi->tanggal_reservasi = $validated['tanggal_reservasi'];
        $reservasi->waktu_reservasi = $validated['waktu_reservasi'];
        $reservasi->jumlah_orang = $validated['jumlah_orang'];
        $reservasi->catatan_tambahan = $validated['catatan_tambahan'] ?? null;
        $reservasi->save();

        
    
        // Redirect ke halaman meja dengan pesan sukses
        return redirect()->route('reservasi.meja')->with('success', 'Reservasi berhasil disimpan.');
    }
   
}
