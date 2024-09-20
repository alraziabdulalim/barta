<?php

namespace App\Support;

use Illuminate\Support\Facades\Mail as  LaravelMail;

class Mail
{
    public static function sendMail($to, $subject, $message, $headers = '')
    {
        if (empty($headers)) {
            $headers = [
                'from' => 'no-reply@' . Config::get('app_domain'),
                'replyTo' => 'support@' . Config::get('app_domain'),
            ];
        }

        LaravelMail::raw($message, function ($mail) use ($to, $subject, $headers) {
            $mail->to($to)
                ->subject($subject);

            if (isset($headers['from'])) {
                $mail->from($headers['from']);
            }

            if (isset($headers['replyTo'])) {
                $mail->replyTo($headers['replyTo']);
            }
        });

        return 'Email sent!';
    }

    public static function testMail()
    {
        LaravelMail::raw('This is a test email from Laravel!', function ($message) {
            $message->to('coderpipra@gmail.com')
                ->subject('Test Email');
        });

        return 'Test email sent!';
    }
}
