<?php

namespace App\Listeners;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Events\MessageSending;

class LogMailSentListener
{

    public function handle(MessageSending $event)
    {
        $message = $event->message;

        Log::channel('maillog')->info($message);
    }
}
