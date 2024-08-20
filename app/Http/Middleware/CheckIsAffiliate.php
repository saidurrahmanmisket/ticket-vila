<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAffiliate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role === 'admin') {
            flash()->addWarning('You are admin you can\'t access this page');

            return redirect()->route('admin.dashboard');
        }

        if (empty(auth()->user()->load('affiliate')->affiliate)) {
            flash()->addWarning('Please join affiliate then go affiliate dashboard');

            return redirect()->route('user.dashboard');
        }

        return $next($request);
    }
}
