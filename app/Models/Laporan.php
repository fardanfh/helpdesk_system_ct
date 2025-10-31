<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_laporan';
    protected $fillable = [
        'no_laporan',
        'periode',
        'prioritas',
        'id_pic',
        'status',
        'id_lokasi',
        'nama_pelapor',
        'id_area',
        'id_permasalahan',
        'deskripsi_laporan',
        'foto_permasalahan',
        'tgl_dikerjakan',
        'tgl_selesai',
        'tindakan_perbaikan',
        'total_nilai_perbaikan',
        'foto_perbaikan',
        'keterangan'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    // Relasi ke tabel prioritas
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    // Relasi ke PIC
    public function pic()
    {
        return $this->belongsTo(Pic::class, 'id_pic', 'id_pic');
    }

    // Relasi ke Lokasi
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id_lokasi');
    }

    // Relasi ke Area
    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area', 'id_area');
    }

    // Relasi ke Permasalahan
    public function permasalahan()
    {
        return $this->belongsTo(Permasalahan::class, 'id_permasalahan', 'id_permasalahan');
    }
}
