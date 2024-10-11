<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\UserRegistrationService;

class RegisteredController extends Controller
{
    protected $userRegistrationService;
    protected $authService;

    public function __construct(UserRegistrationService $userRegistrationService, AuthService $authService)
    {
        $this->userRegistrationService = $userRegistrationService;
        $this->authService = $authService;
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = $this->userRegistrationService->handleRegistration($request);

        $this->authService->storeSessionAndLogin($user);

        return redirect()->route('welcome')->with('success', 'Registration successful. Welcome!');
    }
}
