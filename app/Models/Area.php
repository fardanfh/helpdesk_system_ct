<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_area';
    protected $fillable = ['nama_area'];

    // Relasi ke Laporan
    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'id_area', 'id_area');
    }
}
