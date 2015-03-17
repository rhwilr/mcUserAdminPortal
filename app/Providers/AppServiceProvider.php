<?php namespace rhwilr\mcUserAdminPortal\Providers;

use rhwilr\mcUserAdminPortal\Http\Controllers\PageController;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerPageController();
	}


	/**
	 * Register the page controller class.
	 *
	 * @return void
	 */
	protected function registerPageController()
	{
		$this->app->bind('rhwilr\mcUserAdminPortal\Http\Controllers\PageController', function ($app) {
			$path = $app['config']['core.home'];
			return new PageController($path);
		});
	}


	/**
	 * Get the services provided by the provider.
	 *
	 * @return string[]
	 */
	public function provides()
	{
		return [
			''
		];
	}


}
