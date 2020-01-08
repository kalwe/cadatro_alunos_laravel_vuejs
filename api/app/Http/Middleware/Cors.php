<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * The URIs that should be excluded from CORS verification.
     *
     * @var array
     */
    protected $except = [
        'api/unprotected/*'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if($this->inExceptArray($request)){
        //     header('Access-Control-Allow-Origin: *');
        //     return $next($request);
        // }
        // if ($request->method() == 'OPTIONS') {
        //     $
        // }

        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', '*')
            ->header('Access-Control-Allow-Headers', '*')
            ->header('Access-Control-Max-Age', 60 * 60 * 24)
            ->header('Access-Control-Allow-Credentials', false);
    }

    protected function inExceptArray($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->fullUrlIs($except) || $request->is($except)) {
                return true;
            }
        }

        return false;
    }
}
