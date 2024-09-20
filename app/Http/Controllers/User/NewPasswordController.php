<?php

namespace App\Http\Controllers\User;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewPasswordController extends Controller
{
    public function create(): View
    {
        return view('auth.reset-password');
    }

    public function update(): View
    {
        return view('login');
    }
}
