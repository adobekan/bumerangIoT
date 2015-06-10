<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdministrator {

	/**
	 * Check if authenticated user is administrator.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if( !Auth::user()->isAdministrator())
        {
            return redirect('/');
        }
		return $next($request);
	}

}
