<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\SoftDeletes;

class pemesanan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_user',
        'id_meja',
        'id_menu',
        'total_harga',
    ];
    // Relasi dengan tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi dengan tabel Meja
    public function meja()
    {
        return $this->belongsTo(Meja::class, 'id_meja');
    }

    // Relasi dengan tabel Menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
