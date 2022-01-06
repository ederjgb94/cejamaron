<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JsonApiMiddleware
{
    const PARSED_METHODS=[
        'POST','PUT','PATCH'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->getMethod(), self::PARSED_METHODS)) {
            $request->merge(json_decode($request->getContent(),true));
        }
        return $next($request);
    }
}
