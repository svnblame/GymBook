<?php

namespace App\Http\Controllers;

use App\Models\ScheduledClass;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->bookings()
            ->upcoming()
            ->get();

        return view('booking.upcoming', compact('bookings'));
    }
    public function create()
    {
        $scheduledClasses = ScheduledClass::upcoming()
            ->with('classType', 'instructor')
            ->notBooked()
            ->oldest()
            ->get();

        return view('booking.create', compact('scheduledClasses'));
    }

    public function store(Request $request)
    {
        auth()->user()->bookings()->attach($request->scheduled_class_id);

        return redirect()->route('booking.index');
    }

    public function destroy(int $id)
    {
        auth()->user()->bookings()->detach($id);

        return redirect()->route('booking.index');
    }
}
