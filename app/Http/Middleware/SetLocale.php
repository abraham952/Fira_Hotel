<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = Session::get('locale', config('app.locale'));
        
        $supportedLocales = config('localization.supported_locales', ['en', 'am', 'om']);
        
        if (in_array($locale, $supportedLocales)) {
            app()->setLocale($locale);
        }
        
        return $next($request);
    }
}
