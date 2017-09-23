<?php

namespace App\Http\Middleware;

use Closure;

class TransactionsMiddleware
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
        // if max_transfer_limit is exceeded
        return $next($request);
    }
}
