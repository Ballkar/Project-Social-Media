<?php

namespace App\Http\Middleware;

use Closure;

class CheckData
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //if the user did not provide the required data, go back to editing
        if (!auth()->user()->data) {
            return redirect('/profile/' . auth()->id() . "/edit");
        }
        return $next($request);
    }
}
