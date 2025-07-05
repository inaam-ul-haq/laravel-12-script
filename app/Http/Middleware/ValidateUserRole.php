<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedRoles = app()->make('App\Repositories\RoleRepository')
            ->get_all_roles()
            ->pluck('name')
            ->toArray();

        $userParam = $request->route('user');

        if (!in_array($userParam, $allowedRoles)) {
            abort(404, 'Unauthorized role.');
        }

        return $next($request);
    }
}
