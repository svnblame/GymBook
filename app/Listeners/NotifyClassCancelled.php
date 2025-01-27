<?php

namespace App\Listeners;

use App\Events\ClassCancelled;
use App\Mail\ClassCancelledMail;
use Illuminate\Support\Facades\Mail;

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
        $members = $event->schedule->members();

        $className = $event->schedule->classType->name;
        $classDateTime = $event->schedule->date_time;

        $details = compact('className', 'classDateTime');

        $members->each(function ($member) use ($details) {
            Mail::to($member)->send(
                new ClassCancelledMail($details));
        });
    }
}
