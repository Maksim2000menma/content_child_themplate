<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\HttpException;

class VerifyCsrfToken
{
    public function handle($request, Closure $next)
    {
        if (in_array($request->method(), ['GET', 'HEAD', 'OPTIONS'])) {
            return $next($request);
        }

        // API-запросы пропускаем: они не используют cookie, CSRF для них не нужен
        if ($request->is('api/*')) {
            return $next($request);
        }
        
        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');
        $sessionToken = $request->session()->token();

        if (!is_string($token) || !hash_equals($sessionToken, $token)) {
            throw new HttpException(419, 'CSRF token mismatch.');
        }

        return $next($request);
    }
}