<?php
namespace Jetpack\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class ApiVerification implements IMiddleware
{
	public function handle(Request $request): void
	{
		var_dump($request);
		// Do authentication
		$request->authenticated = true;
	}

}
