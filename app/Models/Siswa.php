<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'username',
        'alamat',
        'tanggal_lahir',
        'no_tlpn',
        'kelas_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function orangtua()
    {
        return $this->hasOne(Orangtua::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
