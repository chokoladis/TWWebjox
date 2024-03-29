<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RightRoot
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $rights): Response
    {
        $user = User::find(auth()->user()->id);
        if ($user->isAdmin()){
            return $next($request);
        } else {
            abort(403);
        }
    }
}
