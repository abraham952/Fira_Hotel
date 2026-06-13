<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Simple admin check - in production, use proper authentication
        $adminPassword = env('ADMIN_PASSWORD', 'admin123');
        
        if (!session('is_admin')) {
            if ($request->input('admin_password') === $adminPassword) {
                session(['is_admin' => true]);
            } else {
                return redirect()->route('admin.login');
            }
        }
        
        return $next($request);
    }
}
