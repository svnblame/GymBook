<?php

namespace App\Console\Commands;

use App\Models\ScheduledClass;
use Illuminate\Console\Command;

class IncrementScheduledClassDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:increment-scheduled-class-dates {--days=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increment all scheduled class dates.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $scheduledClasses = ScheduledClass::latest('date_time')->get();

        $scheduledClasses->each(function ($scheduledClass) {
            $scheduledClass->date_time = $scheduledClass->date_time
                ->addDays((int) $this->option('days'));

            $scheduledClass->save();
        });
    }
}
