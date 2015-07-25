<?php namespace CJAN\Providers;

use Illuminate\Support\ServiceProvider;

use CJAN\Repositories\ProjectsRepository;
use CJAN\Repositories\DbProjectsRepository;

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
		$this->app->singleton('CJAN\Repositories\ProjectsRepository', function ($app) {
            return new DbProjectsRepository();
        });
	}

}
