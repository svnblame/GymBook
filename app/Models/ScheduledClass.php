<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ScheduledClass extends Model
{
    use HasFactory;

    protected $fillable = ['instructor_id', 'class_type_id', 'date_time'];

    protected $casts = [
        'date_time' => 'datetime',
    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function classType(): BelongsTo
    {
        return $this->belongsTo(ClassType::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bookings');
    }
}
