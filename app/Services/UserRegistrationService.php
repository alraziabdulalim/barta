<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;

class UserRegistrationService
{
    public function handleRegistration(Request $request): User
    {
        $this->validateRegistration($request);

        $userData = $this->formatUserData($request);

        return $this->createUser($userData);
    }

    protected function createUser(array $userData): User
    {
        return User::create($userData);
    }

    protected function validateRegistration(Request $request): void
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:' . User::class,
            'email' => 'required|string|email|lowercase|max:255|unique:' . User::class,
            'password' => ['required', 'min:8', Password::defaults()],
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    }

    protected function formatUserData(Request $request): array
    {
        $fullName = explode(' ', $request->input('full_name'), 2);
        $firstName = $fullName[0];
        $lastName = $fullName[1] ?? '';

        $avatarPath = $request->file('avatar') ? $this->storeAvatar($request, $firstName) : $this->storeAvatarBeforeCreate($firstName);

        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'username' => $request->input('username'),
            'avatar' => $avatarPath,
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];
    }
    protected function storeAvatar(Request $request, $firstName): string
{
    $validated = $request->validate([
        'avatar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $extension = $request->file('avatar')->getClientOriginalExtension();
    $filename = uniqid($firstName . '_') . '.' . $extension;

    $path = $request->file('avatar')->storeAs('avatars', $filename, 'public');

    return $path;
}

    protected function storeAvatarBeforeCreate($firstName): string
    {
        $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($firstName);
        $filename = uniqid($firstName . '_') . '.png';
        $path = 'avatars/' . $filename;

        $imageContent = file_get_contents($avatarUrl);
        if ($imageContent === false) {
            throw new \Exception('Failed to download avatar image.');
        }

        Storage::disk('public')->put($path, $imageContent);

        return $path;
    }
}
