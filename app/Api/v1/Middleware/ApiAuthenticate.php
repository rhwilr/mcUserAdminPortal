<?php namespace rhwilr\mcUserAdminPortal\Api\v1\Middleware;

use Closure;
use Response;
use Auth;
use Illuminate\Contracts\Auth\Guard;

class ApiAuthenticate {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard $auth
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
		{
			return Auth::onceBasic() ?: $next($request);
		}

		return $next($request);
	}


}
