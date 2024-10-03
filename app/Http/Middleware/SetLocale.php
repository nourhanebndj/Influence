<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = Session::get('locale') ?? 'en';
        App::setLocale($locale);
        Session::put('locale', $locale);
        App::setLocale($locale);  
        return $next($request);
    }
}