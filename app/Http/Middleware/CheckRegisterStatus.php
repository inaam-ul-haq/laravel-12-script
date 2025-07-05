<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class CheckRegisterStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $setting = Setting::select(['registration', 'on_boarding'])->first();

        if ($setting) {
            if ($request->route()->named('register')) {
                if ($setting->registration == 0) {
                    abort(403, "Registration is currently disabled.");
                }
            }

            if (Str::startsWith($request->route()->getName(), 'onboarding')) {
                if ($setting->on_boarding == 0) {
                    abort(403, "Onboarding is currently disabled.");
                }
            }
        } else {
            abort(500, 'No settings found.');
        }

        return $next($request);
    }
}
