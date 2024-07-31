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

    const role_admin = 'admin';
    const role_gurus = 'guru';
    const role_siswas = 'siswa';

    const roles = [
        self::role_admin => 'admin',
        self::role_gurus => 'guru',
        self::role_siswas => 'siswa',
    ];

    const role_default = 'siswa';

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin() || $this->isGurus() || $this->isSiwas();
    }

    public function isAdmin() {
        return $this->role === self::role_admin;
    }

    public function isGurus() {
        return $this->role === self::role_gurus;
    }

    public function isSiwas() {
        return $this->role === self::role_siswas;
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
}
