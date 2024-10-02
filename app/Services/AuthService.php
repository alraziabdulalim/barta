<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function storeSessionAndLogin(User $user): void
    {
        session()->regenerate();

        session([
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'username' => $user->username,
            'email' => $user->email,
        ]);

        Auth::login($user);
    }

    public function findUserByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function getAuthenticatedUser(): User
    {
        return User::findOrFail(Auth::id());
    }
}
