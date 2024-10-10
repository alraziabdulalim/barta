<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Support\Mail;
use App\Support\Config;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasswordResetLinkController extends Controller
{
    public function create(): View
    {
        return view('auth.forgot-password');
    }


    public function store(Request $request)
    {
        $user = User::where('email', $request['email'])->first();

        if (!$user) {
            return redirect()->back()->withErrors([
                'error' => 'No account found with that email address.',
            ]);
        }

        $resetToken = Str::random(60);

        $user->updateResetToken($resetToken, 60);

        $subject = 'Password Reset Request';
        $message = "Hello " . $user->name . ",\n\n";
        $message .= "We received a request to reset your password. Use Token to reset your password:\n\n";
        $message .=  $resetToken . "\n\n";
        $message .= "If you did not request a password reset, please ignore this email.\n\n";
        $message .= "Thank you,\n";
        $message .= "The " . Config::get('app_name') . " Team";

        Mail::sendMail($user->email, $subject, $message);

        return redirect()->route('password.reset')->with('password_mail', 'password-reset-mail');
    }
}
