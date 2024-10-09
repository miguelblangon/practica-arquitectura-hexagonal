<?php

namespace App\Domain\Notification;

class Notification
{
    private string $recipient;
    private string $message;
    private string $channel;

    public function __construct(string $recipient, string $message, string $channel)
    {
        $this->recipient = $recipient;
        $this->message = $message;
        $this->channel = $channel;
    }

    public function getRecipient(): string
    {
        return $this->recipient;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    // Puedes añadir más lógica de negocio aquí, como formatear el mensaje
    public function formatMessage(): string
    {
        return "Para: {$this->recipient}, Mensaje: {$this->message}";
    }
}
