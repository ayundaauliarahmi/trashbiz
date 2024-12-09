<?php

namespace App\Models;

use App\Models\Nasabah;
use App\Models\Penarikan;
use App\Models\Setoran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'no_hp_wa',
        'level',
        'password',
    ];

    protected $hidden = [
        'password', // Ini agar password tidak ditampilkan saat mengambil data
        'remember_token',
    ];

     /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function setorans()
    {
        return $this->hasMany(Setoran::class, 'nama_nasabah'); // 'nama' di sini adalah kolom pada tabel `users`
    }

    public function penarikans()
    {
        return $this->hasMany(Penarikan::class, 'user_id');
    }

    public function nasabah()
    {
        return $this->hasOne(Nasabah::class);
    }
    
}
