<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    // Menampilkan halaman pemesanan menu berdasarkan ID reservasi
    public function menu($id)
    {
        $menuItems = Menu::all(); // Ambil semua menu dari database
        return view('reservasi.menu', compact('menuItems', 'id'));
    }

    // Menyimpan pesanan ke database
    public function store(Request $request)
    {
        $user_id = Auth::id(); // Ambil ID user yang login
        $reservasi_id = $request->input('reservasi_id'); // ID reservasi dari form

        foreach ($request->input('menu') as $menu_id => $jumlah) {
            if ($jumlah > 0) {
                Menu::create([ // Gunakan huruf besar di nama model (Menu bukan menu)
                    'user_id' => $user_id,
                    'reservasi_id' => $reservasi_id,
                    'menu_id' => $menu_id,
                    'jumlah' => $jumlah,
                ]);
            }
        }

        return redirect()->route('reservasi.meja')->with('success', 'Pesanan berhasil disimpan!');
    }
}
