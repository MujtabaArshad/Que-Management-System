<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Support\Facades\Log;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // Add any URIs that should be excluded from CSRF verification
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
        // Log CSRF token verification failures
        if ($request->isMethod('post') && !$this->isReading($request)) {
            if ($this->getTokenFromRequest($request) !== $request->session()->token()) {
                Log::info('CSRF token verification failed for request.', [
                    'request_uri' => $request->getRequestUri(),
                    'token' => $request->input('_token'),
                ]);
            }
        }

        return parent::handle($request, $next);
    }
}
