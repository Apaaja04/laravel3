<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Perbaiki namespace

class Menu extends Model // Gunakan PascalCase untuk nama model
{
    use HasFactory, SoftDeletes; // SoftDeletes digunakan di sini
    protected $fillable = [
        'nama_menu',
        'harga', 
        'jenis_makanan',
        'foto',
    ];

    // Relasi dengan tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
