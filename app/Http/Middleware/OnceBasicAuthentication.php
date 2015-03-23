<?php namespace rhwilr\mcUserAdminPortal\Http\Middleware;

use Closure;
use Auth;

class OnceBasicAuthentication {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		return Auth::onceBasic() ?: $next($request);
	}

}
