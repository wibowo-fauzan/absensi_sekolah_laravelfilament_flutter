<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    /**
     * Tabel yang terkait dengan model ini.
     *
     * @var string
     */
    protected $table = 'gurus';

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'alamat',
        'mata_pelajaran',
        'user_id',
    ];

    /**
     * Relasi dengan model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}