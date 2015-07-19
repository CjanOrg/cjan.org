<?php namespace CJAN\Providers;

use Illuminate\Support\ServiceProvider;

use DB;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Add support to SQLite foreign keys
		// http://stackoverflow.com/questions/31228950/laravel-5-1-enable-sqlite-foreign-key-constraints
		if (DB::connection() instanceof \Illuminate\Database\SQLiteConnection) {
    		DB::statement(DB::raw('PRAGMA foreign_keys=1'));
		}
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'CJAN\Services\Registrar'
		);
	}

}
