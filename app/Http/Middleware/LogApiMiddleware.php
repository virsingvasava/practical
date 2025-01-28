<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogApiMiddleware
{
    public function handle($request, Closure $next)
    {
        // Log the request data
        Log::channel('custom_log')->info('API Request', [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'headers' => $request->headers->all(),
            'payload' => $request->all(),
        ]);

        $response = $next($request);

        // Log response details
        Log::channel('custom_log')->info('API Response', [
            'status' => $response->getStatusCode(),
            'body' => $response->getContent(),
        ]);

        return $response;
    }
}
