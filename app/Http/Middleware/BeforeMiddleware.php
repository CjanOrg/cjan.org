<?php namespace CJAN\Http\Middleware;

use Closure;

class BeforeMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		DB::enableQueryLog();
		DB::listen(function($sql) {
		    var_dump($sql);
		});
		return $next($request);
	}

}
