<?php

namespace App\Http\Middleware;

use App\Enums\Lang;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;


class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->get('locale', session('locale', Config::get('app.locale')));
        if (! in_array($locale,Lang::values() )) {
            App::setLocale(Config::get('app.locale'));
        }else{
            App::setLocale($locale);
        }

        return $next($request);
    }
}
