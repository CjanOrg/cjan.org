<?php namespace CJAN\Providers;

use Illuminate\Support\ServiceProvider;

use CJAN\Repositories\ProjectRepository;
use CJAN\Repositories\DbProjectRepository;

class RepositoriesServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('CJAN\Repositories\ProjectRepository', function ($app) {
            return new DBProjectRepository();
        });
	}

}
