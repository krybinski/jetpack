<?php

use Aura\Router\RouterContainer;

class Router
{
    public static function load($file)
    {
		$routeContainer = new RouterContainer();
		$map = $routeContainer->getMap();

		require $file;

		// $map->get('blog.read', '/blog/{ide}')
		//     ->handler('\Http\controller\BlogController@show');

		// $map->get(null, "/")
		//     ->handler('\Http\controller\BlogController');

		// $map->get('dev', '/dev');

		// $map->get(null,'/error')
		//     ->handler('\Http\controller\ErrorController'); //`indexAction` would be the invoked method

		$routeMatcher = $routeContainer->getMatcher();

		$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
			$_SERVER,
			$_GET,
			$_POST,
			$_COOKIE,
			$_FILES
		);

		$matched = $routeMatcher->match($request);

		if (!$matched) {
			throw new \Aura\Router\Exception("Route does not exists");
		}

		foreach ($matched->attributes as $key => $val) {
			$request = $request->withAttribute($key, $val);
		}


		// /**
		//  * This is totally optional. But you could use some "Control Inverting", than have `new` wrap all lines of your code
		// *`SomeContainer` implement `Interop\Container\ContainerInterface`.;
		// * A neat way to do this is to extend your choosen container and have the `get` method exposed by the interface retrieve the service from the container.
		// * @see https://github.com/slimphp/slim/
		// */
		// $container = new SomeContainer();

		// //Add an ORM, Doctrine in this case.
		// $container['db'] = function ($container) {

		//     $paths = array("/src/Entities");

		//     $isDevMode = false;

		//     $dbParams = [
		//         'driver' => 'pdo_mysql',
		//         'user' => 'root',
		//         'password' => 'xx-xxx-xx-xx',
		//         'dbname' => 'foo',
		//     ];

		//     $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

		//     return \Doctrine\ORM\EntityManager::create($dbParams, $config);
		// };

		//You def' need a logger
		// $container['logger'] = function ($container) {

		//     $logger = new \Monolog\Logger("Your App Name");

		//     $handler = new \Monolog\Handler\SyslogHandler('Owambe');
		//     $handler->setFormatter(new \Monolog\Formatter\LineFormatter());

		//     $logger->pushHandler($handler);

		//     return $logger;
		// };

		// //register X,Y,Z services

		// try {

		//     $cfar = new \Adelowo\Cfar\Cfar($matched , $container);

		//     $cfar->dispatch();

		// } catch (\Adelowo\Cfar\CfarException $exception) {
		//     echo $exception->getMessage();
		// }

	}
}
