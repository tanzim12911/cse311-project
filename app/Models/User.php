<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role'
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

    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        // Check if the user has the 'admin' role
        if ($this->role === 'admin' && $panel->getId() === 'admin') {
            return true; // Allow access to the admin panel
        }

        // Check if the user has the 'user' role
        if (($this->role === 'user' || $this->role === 'admin') && $panel->getId() === 'user') {
            return true; // Allow access to the user panel
        }

        return false; // Deny access for other roles
    }

    protected static function booted()
    {
        parent::booted();

        // assign the default role to new users
        static::creating(function ($user) {
            if (empty($user->role)) {
                $user->role = 'user'; // Default role
            }
        });
    }

    public function watchlist()
    {
    return $this->belongsToMany(Matches::class, 'watchlists', 'user_id', 'match_id')
        ->withTimestamps();
    }

}
