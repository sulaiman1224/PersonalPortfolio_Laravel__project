<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\feedback;
use Illuminate\Support\Facades\Log;

class Admin_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated using the 'admin' guard
        if (!Auth::guard('admin')->check()) {
            // If not authenticated, redirect to the login page with an error message
            return redirect()->route('AdminLogin')->withErrors(['login' => 'You must be logged in to access the admin panel.']);
        }

        // Get the count of unseen feedback
        $unseenFeedbackCount = feedback::where('status', '!=', 'seen')->count();

        // Log the unseen feedback count for debugging
        Log::info('Unseen Feedback Count: ' . $unseenFeedbackCount);

        // Share unseen feedback count with all views
        view()->share('unseenFeedbackCount', $unseenFeedbackCount);

        // If authenticated, proceed with the request
        return $next($request);
    }

}
