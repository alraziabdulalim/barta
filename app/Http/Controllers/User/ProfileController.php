<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserRequest;

class ProfileController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        $user = $this->authService->getAuthenticatedUser();

        return view('users.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = $this->authService->getAuthenticatedUser();

        return view('users.profile.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $user = $this->authService->getAuthenticatedUser();

        $user->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
        ]);

        $this->authService->storeSessionAndLogin($user);

        return redirect()->route('profile.update')->with('profile_info', 'info-updated');
    }

    public function updateAvatar(Request $request): RedirectResponse
    {
        $user = $this->authService->getAuthenticatedUser();

        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $extension = $request->file('avatar')->getClientOriginalExtension();
        $filename = uniqid($user->first_name . '_') . '.' . $extension;

        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $path = $request->file('avatar')->storeAs('avatars', $filename, 'public');

        $user->update([
            'avatar' => $path,
        ]);

        return back()->with('status', 'avatar-updated');
    }
}
