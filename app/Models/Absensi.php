<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'status',
        'siswa_id',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
