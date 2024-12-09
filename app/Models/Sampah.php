<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'jenis',
        'harga',
    ];

    public function setoran()
    {
        return $this->hasMany(Setoran::class);
    }
}
