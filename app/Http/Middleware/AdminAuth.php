<?php

namespace App\Http\Middleware;

use Closure;

use Sentinel;
use View;

class AdminAuth
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
        if (Sentinel::check()) {
            $user = Sentinel::getUser();

            View::share('userLogin', [
                'username' => $user->username,
                'email' => $user->email,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'role' => $user->role,
                'join_date' => $user->created_at
            ]);

            return $next($request);
        }

        return redirect()->route('login');
    }
}
