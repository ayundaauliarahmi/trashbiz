<?php

namespace App\Models;

use App\Models\Penarikan;
use App\Models\Setoran;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_induk',
        'nama',
        'alamat',
        'jumlah_orang_kk',
    ];

    public function setorans()
    {
        return $this->hasMany(Setoran::class, 'nama_nasabah', 'jenis_sampah');
    }

    public function penarikans()
    {
        return $this->hasMany(Penarikan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
