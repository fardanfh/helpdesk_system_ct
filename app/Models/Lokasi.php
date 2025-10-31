<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_lokasi';
    protected $fillable = ['nama_lokasi'];

    // Relasi ke Laporan
    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'id_lokasi', 'id_lokasi');
    }
}
