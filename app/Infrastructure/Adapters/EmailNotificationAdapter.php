<?php

namespace App\Infrastructure\Adapters;

use App\Application\Ports\NotificationServiceInterface;
use App\Domain\Notification\Notification;
use Illuminate\Support\Facades\Mail;

class EmailNotificationAdapter implements NotificationServiceInterface
{
    public function send(Notification $notification): void
    {
        // Usamos el mailer de Laravel para enviar la notificación por email
        Mail::raw($notification->getMessage(), function (\Illuminate\Mail\Message $message) use ($notification) {
            $message->to($notification->getRecipient())
                    ->subject('Nueva Notificación');
        });
    }
}
