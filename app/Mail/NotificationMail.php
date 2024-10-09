<?php

namespace App\Mail;

use App\Domain\Notification\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function build()
{
    return $this->subject('Nueva Notificación') // Asegúrate de que el asunto esté configurado
                ->view('emails.notification') // Verifica que la vista esté definida correctamente
                ->with([
                    'message' => $this->notification->getMessage(), // Asegúrate de que el mensaje esté correctamente pasado
                ]);
}

}
