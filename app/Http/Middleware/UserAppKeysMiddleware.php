<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserAppKeysMiddleware
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

//        dd($request);
        $url = $request->fullUrl();
        $method = $request->getMethod();
        $ip = $request->getClientIp();
        $useragent = $request->userAgent();
        $datetime = date('Y-m-d H:i:s');

        $content = "[
             'URL' => '$url',
             'Date Time' => '$datetime',
             'Method' => '$method',
             'IP' => '$ip',
             'UserAgent' => '$useragent'
             ]";

        Log::channel('middlewares')->info($content);
        return $next($request);

    }
}
