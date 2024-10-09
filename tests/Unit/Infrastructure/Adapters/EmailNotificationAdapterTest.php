<?php

namespace Tests\Unit\Infrastructure\Adapters;

use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EmailNotificationAdapterTest extends TestCase
{
    public function test_it_sends_raw_email_notification()
    {
        // Falsificar el envío de correos
        Mail::fake();

        // Crear una notificación de prueba
        $notification = new \App\Domain\Notification\Notification('test@example.com', 'Este es un mensaje de prueba', 'email');

        // Crear el adaptador de notificaciones
        $emailAdapter = new \App\Infrastructure\Adapters\EmailNotificationAdapter();

        // Llamar al método send del adaptador
        $emailAdapter->send($notification);

        // Verificar que se haya llamado a Mail::raw() correctamente
        Mail::assertSent(function ($mail) use ($notification) {
            return $mail->to[0]['address'] === $notification->getRecipient() &&
                   $mail->body === $notification->getMessage();
        });
    }
}

