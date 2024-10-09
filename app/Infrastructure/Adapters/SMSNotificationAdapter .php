<?php
namespace App\Infrastructure\Adapters;

use App\Domain\Notification;
use App\Application\Ports\NotificationServiceInterface;
use Illuminate\Support\Facades\Log;

class SMSNotificationAdapter implements NotificationServiceInterface
{
    public function send(Notification $notification): void
    {
        // Simulación de envío de SMS
        Log::info('SMS sent', [
            'recipient' => $notification->getRecipient(),
            'message' => $notification->getMessage(),
        ]);
    }
}
