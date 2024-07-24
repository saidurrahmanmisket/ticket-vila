<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $visitorExist = Visitor::where('ip', $ip)->whereDate('created_at', today())->exists();
        if (! $visitorExist) {
            $location = geoip($ip);
            $country = $location->country;
            Visitor::create([
                'ip' => $ip,
                'country' => $country,
            ]);
        }

        return $next($request);
    }
}
