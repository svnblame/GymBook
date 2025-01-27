<?php

namespace App\Listeners;

use App\Events\ClassCancelled;
use App\Jobs\NotifyClassCancelledJob;
use App\Mail\ClassCancelledMail;
use App\Notifications\ClassCancelledNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

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


        file_put_contents(
            storage_path('logs/cancelled-classes.log'),
            "Class Cancelled:\n{$event->schedule}\n", FILE_APPEND
        );

        // Notify members that have booked this cancelled class
        $members = $event->schedule->members()->get();

        $className = $event->schedule->classType->name;
        $classDateTime = $event->schedule->date_time;

        $details = compact('className', 'classDateTime');

        NotifyClassCancelledJob::dispatch($members, $details);
    }
}
