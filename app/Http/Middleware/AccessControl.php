<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class AccessControl
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $grant)
    {
        if (! $request->bearerToken()) {
            return error_response(__('auth.not_authenticated'), Response::HTTP_UNAUTHORIZED);
        }

        try {
            $loggedUser = logged_user($request->bearerToken());

            $hasGrant = in_array($grant, $loggedUser['permissions'], true);

            if (! $hasGrant) {
                return error_response(__('auth.not_authorized'), Response::HTTP_FORBIDDEN);
            }
        } catch (\Exception $e) {
            Log::error(get_class($this).' - '.$request->path().' - '.$e->getMessage());

            return error_response($e->getMessage(), $e->getCode());
        }

        return $next($request);
    }
}
