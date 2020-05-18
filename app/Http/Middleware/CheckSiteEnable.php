<?php

namespace App\Http\Middleware;

use App\Setting;
use Closure;

class CheckSiteEnable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $siteEnable = Setting::where('name', 'SiteEnable')->first();
        $siteEnable = $siteEnable ? $siteEnable->value : 1;
        if ($siteEnable) return $next($request);
        else return response()->view('disable');
    }
}
