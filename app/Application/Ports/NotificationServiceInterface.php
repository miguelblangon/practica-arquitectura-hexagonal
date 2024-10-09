<?php

namespace App\Application\Ports;

use App\Domain\Notification\Notification;

interface NotificationServiceInterface
{
    public function send(Notification $notification): void;
}
