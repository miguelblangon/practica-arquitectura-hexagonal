<?php

namespace App\Infrastructure\Adapters;

use App\Domain\Notification;
use App\Application\Ports\NotificationServiceInterface;
use Illuminate\Support\Facades\Log;

class LogNotificationAdapter implements NotificationServiceInterface
{
    public function send(Notification $notification): void
    {
        Log::info('Notification sent', [
            'recipient' => $notification->getRecipient(),
            'message' => $notification->getMessage(),
            'channel' => $notification->getChannel(),
        ]);
    }
}
