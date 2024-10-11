<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
        'avatar',
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

    protected function avatarUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->avatar ? asset('storage/' . $this->avatar) : 'https://ui-avatars.com/api/?size=512&background=random&name' . urlencode($this->name),
        );
    }

    public function updateResetToken($token, $expiresInMinutes = 60)
    {
        $expiryTime = now()->addMinutes($expiresInMinutes);

        return DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $this->email],
            ['token' => Hash::make($token), 'created_at' => now()]
        );
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
