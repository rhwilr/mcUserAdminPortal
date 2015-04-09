<?php namespace rhwilr\mcUserAdminPortal\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'rhwilr\mcUserAdminPortal\Http\Middleware\VerifyCsrfToken',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'rhwilr\mcUserAdminPortal\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'auth.once' => 'rhwilr\mcUserAdminPortal\Http\Middleware\OnceBasicAuthentication',
		'guest' => 'rhwilr\mcUserAdminPortal\Http\Middleware\RedirectIfAuthenticated',
		'api.auth' => 'rhwilr\mcUserAdminPortal\Api\v1\Middleware\ApiAuthenticate',
		'api.role.admin' => 'rhwilr\mcUserAdminPortal\Api\v1\Middleware\ApiRoleAdmin'
	];

}
