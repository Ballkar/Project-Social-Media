<?php

namespace App\Http\Middleware;

use Closure;

class UserID
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

        if ($request->user && $request->user->id != auth()->id()) {
            return back();
        }
        if ($request->post && $request->post->user->id != auth()->id()) {
            return back();
        }
        if ($request->photo && $request->photo->user->id != auth()->id()) {
            return back();
        }
        if ($request->comment && $request->comment->user->id != auth()->id()) {
            return back();
        }

        return $next($request);
    }
}
