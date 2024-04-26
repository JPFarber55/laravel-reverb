<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\User;
use App\Notifications\MessageSent as NotificationsMessageSent;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = "hola";  // esto podría traerlo desde $request->message
        MessageSent::dispatch($message);
        $user = User::find(1);
        $user->notify(new NotificationsMessageSent($message));
    }
}
