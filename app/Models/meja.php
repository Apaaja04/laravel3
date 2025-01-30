<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meja extends Model
{
    use HasFactory, SoftDeletes;

    // Kolom yang bisa diisi secara mass-assignment
    protected $fillable = [
        'kode_meja',
        'status_pemesanan', // Menambahkan kolom status_pemesanan
        'user_id',           // Menambahkan user_id jika menggunakan nama kolom ini
    ];

    // Relasi dengan tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Pastikan ini sesuai dengan nama kolom yang ada di tabel
    }
}


