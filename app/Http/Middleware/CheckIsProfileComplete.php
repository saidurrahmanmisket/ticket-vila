<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsProfileComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = \Auth::user();
        if (empty($user->first_name) || empty($user->last_name) || empty($user->email) || empty($user->phone) || empty($user->address_1) || empty($user->city) || empty($user->state) || empty($user->zip_code) || empty($user->country_id) || empty($user->birthday) || empty($user->gender) || empty($user->city_of_birthday) || empty($user->country_of_birthday)) {
            flash()->addWarning('Please complete your profile details.');

            return redirect()->route('user.settings');
        }

        return $next($request);
    }
}
