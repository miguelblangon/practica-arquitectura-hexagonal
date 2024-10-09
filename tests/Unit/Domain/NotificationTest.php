<?php

namespace Tests\Unit\Domain;

use PHPUnit\Framework\TestCase;
use App\Domain\Notification\Notification;

class NotificationTest extends TestCase
{
    public function test_can_create_notification()
    {
        $notification = new Notification('email@example.com', 'Este es un mensaje', 'email');

        $this->assertEquals('email@example.com', $notification->getRecipient());
        $this->assertEquals('Este es un mensaje', $notification->getMessage());
        $this->assertEquals('email', $notification->getChannel());
    }

    public function test_can_format_message()
    {
        $notification = new Notification('email@example.com', 'Este es un mensaje', 'email');

        $this->assertEquals('Para: email@example.com, Mensaje: Este es un mensaje', $notification->formatMessage());
    }
}
