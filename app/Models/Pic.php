<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pic extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id_pic';
    protected $fillable = ['username', 'password', 'nama', 'id_jabatan'];
    protected $hidden = ['password'];

    // Relasi ke Jabatan
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    // Relasi ke Laporan
    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'id_pic', 'id_pic');
    }
}
