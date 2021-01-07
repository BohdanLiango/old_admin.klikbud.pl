<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdministrationPanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->role_id !== 1){return new Response(abort(404));}
        return $next($request);
    }
}
