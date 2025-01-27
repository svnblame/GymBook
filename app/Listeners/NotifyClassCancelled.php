<?php

namespace App\Listeners;

use App\Events\ClassCancelled;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class NotifyClassCancelled
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassCancelled $event): void
    {
        $scheduledClass = $event->schedule;

        file_put_contents(
            storage_path('logs/laravel.log'),
            "Class Cancelled:\n{$scheduledClass}\n", FILE_APPEND
        );
    }
}
