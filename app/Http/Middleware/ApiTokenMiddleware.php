<?php

namespace App\Http\Middleware;

use Closure;

class ApiTokenMiddleware
{
    public function handle($request, Closure $next)
    {
        $provided = $request->bearerToken();

        if ($provided && $this->isValid($provided)) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 401)
            ->header('WWW-Authenticate', 'Bearer');
    }

    private function isValid(string $provided): bool
    {
        foreach (config('api.tokens', []) as $token) {
            // hash_equals защищает от timing-атак
            if (hash_equals($token, $provided)) {
                return true;
            }
        }

        return false;
    }
}