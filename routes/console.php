<?php

use App\Console\Commands\RemindMembers;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Schedule::command(RemindMembers::class)->dailyAt('08:17');
