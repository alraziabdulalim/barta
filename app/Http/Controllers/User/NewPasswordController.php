<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;

class NewPasswordController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function create(): View
    {
        return view('auth.reset-password');
    }

    public function update(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required', 'min:8', Password::defaults()],
        ]);

        $user = $this->authService->getAuthenticatedUser();

        if (!Hash::check($validatedData['old_password'], $user->password)) {
            return redirect()->back()->withErrors(['error' => "Current password didn't match."])->withInput();
        }

        $user->update([
            'password' => Hash::make($validatedData['new_password']),
        ]);

        return redirect()->back()->with('new_password', 'password-updated.');
    }

    public function updateByToken(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'token' => ['required'],
            'password' => ['required', 'min:8', Password::defaults()],
            'email' => ['required', 'email'],
        ]);

        $passwordReset = DB::table('password_reset_tokens')
            ->where('email', $validatedData['email'])
            ->first();

        if (!$passwordReset || !Hash::check($validatedData['token'], $passwordReset->token) || Carbon::parse($passwordReset->created_at)->addMinutes(60)->isPast()) {
            return redirect()->back()->withErrors(['error' => "Invalid or expired token."])->withInput();
        }

        $user = User::where('email', $validatedData['email'])->first();

        if (!$user) {
            return redirect()->back()->withErrors(['error' => "User not found."])->withInput();
        }

        $user->update([
            'password' => Hash::make($validatedData['password']),
        ]);

        DB::table('password_reset_tokens')->where('email', $validatedData['email'])->delete();

        return redirect()->route('login')->with('password', 'Password updated successfully.');
    }
}
