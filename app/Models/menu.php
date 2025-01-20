<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\SoftDeletes;

class menu extends Model
{
    use HasFactory, SoftDeletes;
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
