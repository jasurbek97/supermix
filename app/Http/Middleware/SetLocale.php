<?php
namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = Session::get('locale', 'ru');

        App::setLocale($locale);

        return $next($request);
    }
}


