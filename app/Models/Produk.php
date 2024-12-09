<?php

namespace App\Models;

use App\Models\Penjualan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    
    protected $fillable = [
        'nama', 'deskripsi', 'harga', 
    ];

    public $timestamps = true;

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class, 'produk'); // 'produk_id' adalah kolom di tabel penjualan
    }
}
