<?php

namespace Tests\Feature;

use App\Models\ClassType;
use App\Models\ScheduledClass;
use App\Models\User;
use Database\Seeders\ClassTypeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InstructorTest extends TestCase
{
    public function test_instructor_is_redirected_to_instructor_dashboard(): void
    {
        $user = User::factory()->create([
            'role' => 'instructor'
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response
            ->assertRedirectToRoute('instructor.dashboard');

        $this->followRedirects($response)
            ->assertSeeText('Schedule Class')
            ->assertSeeText('Upcoming Classes');
    }

    public function test_instructor_can_schedule_class(): void
    {
        $user = User::factory()->create([
            'role' => 'instructor'
        ]);

        $this->seed(ClasstypeSeeder::class);

        $date = date('Y-m-d', strtotime('+5 days'));
        $time = date('H:i:s', strtotime('+5 hours'));

        $response = $this->actingAs($user)
            ->post('instructor/schedule', [
                'class_type_id' => ClassType::first()->id,
                'date' => $date,
                'time' => $time,
        ]);

        $this->assertDatabaseHas('scheduled_classes', [
            'class_type_id' => ClassType::first()->id,
            'date_time' => $date . ' ' . $time,
        ]);

        $response->assertRedirectToRoute('schedule.index');
    }

    public function test_instructor_can_cancel_class(): void
    {
        // Given
        $user = User::factory()->create([
            'role' => 'instructor'
        ]);

        $this->seed(ClasstypeSeeder::class);

        $date = date('Y-m-d', strtotime('+4 days'));
        $time = date('H:i:s', strtotime('+2 hours'));

        $scheduledClass = ScheduledClass::create([
            'instructor_id' => $user->id,
            'class_type_id' => ClassType::first()->id,
            'date_time' => $date . ' ' . $time,
        ]);

        // When
        $response = $this->actingAs($user)
            ->delete('instructor/schedule/' . $scheduledClass->id);

        // Then
        $this->assertDatabaseMissing('scheduled_classes', [
            'id' => $scheduledClass->id,
        ]);
    }
}
