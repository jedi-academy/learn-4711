# Routing Examples From Elsewhere

Some students were asking for examples of how routing was done in other frameworks.
I excerpted all of the samples following from the user guides of the different
frameworks.

Something that struck me was that they all seem to require explicit configuration
of routing rules, unlike the "routing by convention" that is a staple feature
of CodeIgniter.

## CakePHP

Configuration:

	// Using the scoped route builder.
	Router::scope('/', function ($routes) {
		$routes->connect('/', ['controller' => 'Articles', 'action' => 'index']);
	});

	// Using the static method.
	Router::connect('/', ['controller' => 'Articles', 'action' => 'index']);

## Fat-Free

Closure:

	$f3->route('GET /',
		function() {
			echo 'Hello, world!';
		}
	);
	$f3->run();

O-O:

	class WebPage {
		function display() {
			echo 'I cannot object to an object';
		}
	}

	$f3->route('GET /about','WebPage->display');
	$f3->run();

Conventional:

	$f3->route('GET /login','Controller\Auth::login');
	$f3->run();

## FuelPHP

Basic:

	return array(
		'about'   => 'site/about',
		'contact' => 'contact/form',
		'admin'   => 'admin/login',
	);

Regular expression:

	return array(
		'blog/(:any)'       => 'blog/entry/$1', // Routes /blog/entry_name to /blog/entry/entry_name
												//   matches /blog/, does not match /blogging and /blog
		'blog(:any)'        => 'blog/entry$1',  // Routes /blog/entry_name to /blog/entry/entry_name
												//   matches /blog/ and /blogging, does not match /blog
		'blog(:everything)' => 'blog/entry$1',  // Routes /blog/entry_name to /blog/entry/entry_name
												//   matches /blog/, /blogging and /blog
		'(:segment)/about'  => 'site/about/$1', // Routes /en/about to /site/about/en
		'(\d{2})/about'     => 'site/about/$1', // Routes /12/about to /site/about/12
	);

Closure:

	return array(
		'secret/mystuff' => function () {
			// this route only works in development
			if (\Fuel::$env == \Fuel::DEVELOPMENT)
			{
				return \Request::forge('secret/mystuff/keepout', false)->execute();
			}
			else
			{
				throw new HttpNotFoundException('This page is only accessable in development.');
			}
	};

## Laravel

Closure:

	Route::get('foo', function () {
		return 'Hello World';
	});

Named:

	Route::get('user/profile', 'UserController@showProfile')->name('profile');

Model-bound:

	Route::get('api/users/{user}', function (App\User $user) {
		return $user->email;
	});

## Slim

Closure:

	$app = new \Slim\App;
	$app->get('/hello/{name}', function (Request $request, Response $response) {
		$name = $request->getAttribute('name');
		$response->getBody()->write("Hello, $name");

		return $response;
	});
	$app->run();

Strategy:

	$c = new \Slim\Container();
	$c['foundHandler'] = function() {
		return new \Slim\Handlers\Strategies\RequestResponseArgs();
	};

	$app = new \Slim\App($c);
	$app->get('/hello/{name}', function ($request, $response, $name) {
		return $response->write($name);
	});

Resolver:

	$app->get('/home', '\HomeController:home');

## Symfony

Mapped:

	$collection = new RouteCollection();
	$collection->add('blog_list', new Route('/blog', array(
		'_controller' => 'AppBundle:Blog:list',
	)));
	$collection->add('blog_show', new Route('/blog/{slug}', array(
		'_controller' => 'AppBundle:Blog:show',
	)));

	return $collection;

## Zend

Configuration:

     'router' => array(
         'routes' => array(
             'album' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/album[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Album\Controller\Album',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     )
