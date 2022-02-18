<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!in_array($request->user()->level, ['admin', 'teacher'])) {


            return  redirect(route('login'));
        }
        if (Auth::check()) {
            $user = auth()->user();
            if ($request->user()->level == 'teacher') {
                if (!$user->check_active_status()) {
                    return  redirect(route('teacher.level'));
                }
            }
        }

        return $next($request);
    }
}
