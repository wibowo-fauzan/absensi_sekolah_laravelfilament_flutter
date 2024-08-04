<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;
    
    const ROLE_ADMIN = 'ADMIN';
    const ROLE_GURU = 'GURU';
    const ROLE_SISWA = 'SISWA';
    
    const ROLES  = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_GURU => 'Guru',
        self::ROLE_SISWA => 'Siswa',
    ];


    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin() || $this->isGurus() || $this->isSiwas();
    }

    public function isAdmin() {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isGurus() {
        return $this->role === self::ROLE_GURU;
    }

    public function isSiwas() {
        return $this->role === self::ROLE_SISWA;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke tabel 'siswa'
    public function siswas()
    {
        return $this->hasOne(Siswa::class);
    }

    // Relasi ke tabel 'guru'
    public function gurus()
    {
        return $this->hasOne(Guru::class);
    }

    // Relasi ke tabel 'wali_kelas'
    public function waliKelas()
    {
        return $this->hasOne(WaliKelas::class);
    }

    // Relasi ke tabel 'wali_murid'
    public function waliMurids()
    {
        return $this->hasOne(WaliMurid::class);
    }
}
