<?php
// app/Models/Reservasi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasis'; // Nama tabel di database
    protected $fillable = [
        'nama_lengkap',
        'tanggal_reservasi',
        'waktu_reservasi',
        'jumlah_orang',
        'catatan_tambahan',
        'id_user',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
