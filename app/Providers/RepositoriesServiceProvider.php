<?php namespace CJAN\Providers;

use Illuminate\Support\ServiceProvider;

use CJAN\Repositories\ProjectsRepository;
use CJAN\Repositories\DbProjectsRepository;
use CJAN\Repositories\VersionsRepository;
use CJAN\Repositories\DbVersionsRepository;
use CJAN\Repositories\TestRunsRepository;
use CJAN\Repositories\DbTestRunsRepository;
use CJAN\Repositories\UserRepository;
use CJAN\Repositories\DbUserRepository;
use CJAN\Repositories\TestRepository;
use CJAN\Repositories\DbTestRepository;

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
        $this->app->singleton('CJAN\Repositories\VersionsRepository', function ($app) {
            return new DbVersionsRepository();
        });
        $this->app->singleton('CJAN\Repositories\TestRunsRepository', function ($app) {
            return new DbTestRunsRepository();
        });
        $this->app->singleton('CJAN\Repositories\UserRepository', function ($app) {
            return new DbUserRepository();
        });
        $this->app->singleton('CJAN\Repositories\TestRepository', function ($app) {
            return new DbTestRepository();
        });
	}

}
