<?php

namespace App\Http\Controllers;

use App\Application\Ports\NotificationServiceInterface;
use App\Domain\Notification\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    private $notificationService;

    public function __construct(NotificationServiceInterface $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function sendNotification(Request $request)
    {
        $data = $request->validate([
            'recipient' => 'required|email',
            'message' => 'required|string',
        ]);

         $notification = new Notification($data['recipient'], $data['message'], 'email');
         $this->notificationService->send($notification);
        
        return response()->json(['message' => 'Notificación enviada con éxito.']);
    }
}
