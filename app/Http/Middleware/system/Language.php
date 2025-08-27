<?php

namespace App\Http\Middleware\system;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(session()->has('locale'));
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        }
        return $next($request);
    }
}
