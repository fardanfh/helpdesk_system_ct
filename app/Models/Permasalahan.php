<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permasalahan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_permasalahan';
    protected $fillable = ['nama_permasalahan'];

    // Relasi ke Laporan
    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'id_permasalahan', 'id_permasalahan');
    }
}
