<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'nama',
        'nomor_hp',
        'user_id',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
