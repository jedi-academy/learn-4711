# Controller Examples From Other Frameworks

I excerpted all of the samples below from the user guides of the respective
frameworks.

## CakePHP

CakePHP provides for a base controller, that you are expected to add common 
functionality to.

	namespace App\Controller;
	use Cake\Controller\Controller;

	class AppController extends Controller {

		public function initialize() {
			// Always enable the CSRF component.
			$this->loadComponent('Csrf');
		}

	}

App controllers then extend that. They have built-in support for view
parameters and rendering.

	// src/Controller/RecipesController.php

	class RecipesController extends AppController {

		public function view($id) {
			// Action logic goes here.
		}

		public function share($customerId, $recipeId) {
			// Action logic goes here.
		}

		public function search($query) {
			// Action logic goes here.

			// A sample view parameter
			$this->set('color', 'pink');

			// Render the view in src/Template/Recipes/search.ctp
			$this->render();
		}
	}

## Fat-Free

Controllers in Fat-Free are not so clear. There is no controllers page in the
user guide, and the "Hello world" example shows the following...

	$f3 = require('path/to/base.php');
	$f3->route('GET /',
		function() {
			echo 'Hello, world!';
		}
	);
	$f3->run();

## FuelPHP

FuelPHP has some prefix conventions to follow with its controllers, shown in
the following "Example" controller.

	class Controller_Example extends Controller {

		public function action_index() {
			$data['css'] = Asset::css(array('reset.css','960.css','main.css'));
			return Response::forge(View::forge('welcome/index'));
		}
	}

It lets you use HTTP method-specific methods too.

	class Controller_Example extends Controller {

		public function get_index() {
			// This will be called when the HTTP method is GET.
		}

		public function post_index() {
			// This will be called when the HTTP method is POST.
		}
	}

## Laravel

Laravel controllers can be straightforward.

	namespace App\Http\Controllers;

	use App\User;
	use App\Http\Controllers\Controller;

	class UserController extends Controller {
		/**
		 * Show the profile for the given user.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function show($id) {
			return view('user.profile', ['user' => User::findOrFail($id)]);
		}
	}

It supports "middleware", as interpreted by PHP-FIG. This is basically action
chaining.

	class UserController extends Controller {

		public function __construct()     {
			$this->middleware('auth');
			$this->middleware('log')->only('index');
			$this->middleware('subscribed')->except('store');
		}
	}

Laravel supports RESTful controllers, that they refer to as "resource controllers".
This is specified in the routing, where a "resource" route declaration creates
multiple routes to handle each of the HTTP-verb specific routings. 
A resource controller would be expected to have appropriate methods:
index, create, store, show, edit, update and destroy.

	Route::resource('photos', 'PhotoController');

Their scaffolding generator can create a skeleton for you to work with.

	php artisan make:controller PhotoController --resource

## Slim

Slim does not seem to share the same notion of controllers, from what I could
glean from their user guide. Everything seems to be "Application" focused.

	// instantiate the App object
	$app = new \Slim\App();

	// Add route callbacks
	$app->get('/', function ($request, $response, $args) {
		return $response->withStatus(200)->write('Hello World!');
	});

	// Run application
	$app->run();

## Symfony

Symfony has conventional controllers, with an optional base controller.
It uses a suffix naming convention.

	// src/AppBundle/Controller/LuckyController.php
	namespace AppBundle\Controller;

	use Symfony\Component\HttpFoundation\Response;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

	class LuckyController {
		/**
		 * @Route("/lucky/number/{max}")
		 */
		public function numberAction($max) {
			$number = mt_rand(0, $max);

			return new Response(
				'<html><body>Lucky number: '.$number.'</body></html>'
			);
		}
	}

## Yii

Yii controllers follow a suffix naming convention for controller names,
and a prefix one for "actions".
A sample Yii controller, to handle blog posts (not the HTTP POST) is shown here.
It prescribes handling for the URIs "post/view" and "post/create".

	namespace app\controllers;

	use Yii;
	use app\models\Post;
	use yii\web\Controller;
	use yii\web\NotFoundHttpException;

	class PostController extends Controller {

		public function actionView($id) {
			$model = Post::findOne($id);
			if ($model === null) {
				throw new NotFoundHttpException;
			}

			return $this->render('view', [
				'model' => $model,
			]);
		}

		public function actionCreate() {
			$model = new Post;

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			} else {
				return $this->render('create', [
					'model' => $model,
				]);
			}
		}
	}

## Zend

Zend takes a "high road". Controllers are objects implementing their
<code>DispatchableInterface</code>.

	use Zend\Stdlib\DispatchableInterface;
	use Zend\Stdlib\RequestInterface as Request;
	use Zend\Stdlib\ResponseInterface as Response;

	class Foo implements DispatchableInterface {

		public function dispatch(Request $request, Response $response = null) {
			// ... do something, and preferably return a Response ...
		}
	}

Zend provides a number of components to make writing controllers easy,
plugging into a ServiceManager, EventManager or PluginManager.
Zend also provides some base abstractions to build from: an AbstractActionController
or an AbstractRestfulController, and even an AbstractConsoleController for 
command line requests.