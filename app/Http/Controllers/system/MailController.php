<?php
namespace App\Http\Controllers\system;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function sendTestEmail()
    {
        $to = 'gabrielpg77@gmail.com';
        $subject = 'Correo de prueba desde Laravel con ZeptoMail';
        $body = 'Este es un correo de prueba enviado desde Laravel usando ZeptoMail.';

        Mail::raw($body, function ($message) use ($to, $subject) {
            $message->to($to)
                    ->subject($subject);
        });

        return 'Correo enviado exitosamente.';
    }
}