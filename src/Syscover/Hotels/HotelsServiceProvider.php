<?php namespace Syscover\Hotels;

use Illuminate\Support\ServiceProvider;

class HotelsServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// include route.php file
		if (!$this->app->routesAreCached())
			require __DIR__ . '/../../routes.php';

		// register views
		$this->loadViewsFrom(__DIR__ . '/../../views', 'hotels');

        // register translations
        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'hotels');

        // register public files
        $this->publishes([
            __DIR__ . '/../../../public' 					=> public_path('/packages/syscover/hotels')
        ]);

        // register config files
        $this->publishes([
            __DIR__ . '/../../config/hotels.php' 			=> config_path('hotels.php')
        ]);

        // register migrations
        $this->publishes([
            __DIR__ . '/../../database/migrations/' 		=> base_path('/database/migrations'),
            __DIR__ . '/../../database/migrations/updates/' => base_path('/database/migrations/updates'),
        ], 'migrations');

        // register seeds
        $this->publishes([
            __DIR__ . '/../../database/seeds/' 				=> base_path('/database/seeds')
        ], 'seeds');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        //
	}
}