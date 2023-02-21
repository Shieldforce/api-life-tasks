<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class ResetPasswordMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address(env("MAIL_FROM_ADDRESS"), env("APP_NAME")),
            subject: 'Email de reset de senha!',
        );
    }

    public function content()
    {
        $user = User::where("email", $this->email)->first();
        $token = Crypt::encrypt(
            json_encode(["id" => $user->id, "email" => $user->email, "microtime" => microtime(true)])
        );
        $linkReset = env("URL_FRONTEND") . "/resetPassword/{$token}";
        return new Content(
            view: 'emails.resetPassword',
            with: [
                'linkReset' => "$linkReset",
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
}
