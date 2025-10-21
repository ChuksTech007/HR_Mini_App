<?php

// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in AND if their role is 'admin'
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request); // Allow access
        }

        // Redirect or abort if they are not an admin
        // Redirect to home with an error message
        return redirect('/dashboard')->with('error', 'Unauthorized access. Admin privileges required.');
    }
}