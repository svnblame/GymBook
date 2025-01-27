<?php

namespace App\Policies;

use App\Models\ScheduledClass;
use App\Models\User;

class ScheduledClassPolicy
{
    public function delete(User $user, ScheduledClass $scheduledClass): bool
    {
//        dd(($user->id === $scheduledClass->instructor_id), $user->id, $scheduledClass->instructor_id, $scheduledClass);
        return $user->id === $scheduledClass->instructor_id;
    }
}
