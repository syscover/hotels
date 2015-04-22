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
		include realpath(__DIR__ . '/../../routes.php');

		// register views
		$this->loadViewsFrom(realpath(__DIR__ . '/../../views'), 'hotels');

        // register translations
        $this->loadTranslationsFrom(realpath(__DIR__ . '/../../lang'), 'hotels');

        // register public files
        $this->publishes([
            realpath(__DIR__ . '/../../../public') => public_path('/packages/syscover/hotels')
        ]);

        // register migrations
        $this->publishes([
            __DIR__.'/../../database/migrations/' => base_path('/database/migrations')
        ], 'migrations');

        // register migrations
        $this->publishes([
            __DIR__.'/../../database/seeds/' => base_path('/database/seeds')
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
