<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_jabatan';
    protected $fillable = ['nama_jabatan'];

    // Relasi ke PIC
    public function pics()
    {
        return $this->hasMany(Pic::class, 'id_jabatan', 'id_jabatan');
    }
}
