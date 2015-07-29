<?php namespace CJAN\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Session\TokenMismatchException;

use Illuminate\Contracts\Routing\Middleware;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Contracts\Encryption\Encrypter;

use Symfony\Component\Security\Core\Util\StringUtils;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//return parent::handle($request, $next);
		//http://www.camroncade.com/disable-csrf-for-specific-routes-laravel-5/
		if ($this->isReading($request) || $this->excludedRoutes($request) || $this->tokensMatch($request))
		{
			return $this->addCookieToResponse($request, $next($request));
		}

	    throw new TokenMismatchException;
	}

	protected function excludedRoutes($request)  
	{
	    $routes = [
            'upload/results',
	    ];

	    foreach($routes as $route)
	    {
	        if ($request->is($route))
	        {
	            return true;
	        }
	    }

	    return false;
	}


}
