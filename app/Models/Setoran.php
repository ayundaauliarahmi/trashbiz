<?php

namespace App\Models;

use App\Models\Nasabah;
use App\Models\Sampah;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setoran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_nasabah',
        'jenis_sampah',
        'tanggal',
        'setor',
        'jumlah_setoran',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'nama_nasabah');
    }

    public function sampah()
    {
        return $this->belongsTo(Sampah::class, 'jenis_sampah');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nama_nasabah', 'nama'); // Atau ganti 'User' ke 'Nasabah' jika model Anda bernama Nasabah
    }
}
