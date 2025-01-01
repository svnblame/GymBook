<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Redirect User to respective Dashboard based on their role.
 *
 * This is a single action controller.
 */
class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return match (auth()->user()->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'instructor' => redirect()->route('instructor.dashboard'),
            'member' => redirect()->route('member.dashboard'),
            default => redirect()->route('home'),
        };
    }
}
