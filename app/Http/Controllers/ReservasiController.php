<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservasi; // Import model Reservasi
use Illuminate\Http\Request;


class ReservasiController extends Controller
{
    public function tampilForm()
    {
        return view('reservasi.form'); 
        
        
    }

    public function submitForm(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_reservasi' => 'required|date',
            'waktu_reservasi' => 'required',
            'jumlah_orang' => 'required|integer',
            'catatan_tambahan' => 'nullable|string',
        ]);

        // Simpan data ke database
        $reservasi = Reservasi::create($validated);

        // Redirect ke halaman form meja dengan ID reservasi
        return redirect()->route('reservasi.meja', ['id' => $reservasi->id])
            ->with('success', 'Reservasi berhasil disimpan.')
            ->with('reservasi_id', $reservasi->id);
    }
   
}
