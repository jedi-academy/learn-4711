# REST Examples From Elsewhere

Most of the frameworks claim to "do" REST, though their interpretations differ.

## CakePHP

Cake's resource configuration maps incoming requests to controller methods:

    // In config/routes.php...
    Router::scope('/', function ($routes) {
        $routes->extensions(['json']);
        $routes->resources('Recipes');
    });

The data format expected is one of the configuration parameters.

This "resource routing" will map HTTP requests to specific methods...

    HTTP format URL.format              Controller action invoked
    GET 	/recipes.format 	RecipesController::index()
    GET 	/recipes/123.format 	RecipesController::view(123)
    POST 	/recipes.format 	RecipesController::add()
    PUT 	/recipes/123.format 	RecipesController::edit(123)
    PATCH 	/recipes/123.format 	RecipesController::edit(123)
    DELETE 	/recipes/123.format 	RecipesController::delete(123)

## Fat-Free

Resources (models) are managed by mapping incoming requests to
model methods with the same name as the HTTP verb:

    class Item {
        function get() {}
        function post() {}
        function put() {}
        function delete() {}
    }

    $f3=require('lib/base.php');
    $f3->map('/cart/@item','Item');
    $f3->run();

It also provides some routing logic to use a `_method` parameter 
to map requests to an HTTP verb not directly supported by the emitting
platform (eg browser and DELETE).

## FuelPHP

Fuel provides a base controller that you can extend:

    class Controller_Test extends Controller_Rest {

        public function get_list()     {
            return $this->response(array(
                'foo' => Input::get('foo'),
                'baz' => array(
                    1, 50, 219
                ),
                'empty' => null
            ));
        }
    }

Requests are mapped to methods using the HTTP verb, eg. `get_list`
is the handler for a `GET` request to `list'.

The desired data format is specified with a suffix in the URL,
eg `.../method.xml` to ask for XML returned.

It supports all the standard REST formats: xml, json, csv, html, php, and serialize.
Wait a minute - "php" and "serialize" are standard?

## Laravel

Laravel uses a "resource" route for RESTful CRUD:

    Route::resource('photos', 'PhotoController');

The routing assumes specific method in the handling controller:

    Verb 	URI 	Action 	Route Name
    GET 	/photos 	index 	photos.index
    GET 	/photos/create 	create 	photos.create
    POST 	/photos 	store 	photos.store
    GET 	/photos/{photo} 	show 	photos.show
    GET 	/photos/{photo}/edit 	edit 	photos.edit
    PUT/PATCH 	/photos/{photo} 	update 	photos.update
    DELETE 	/photos/{photo} 	destroy 	photos.destroy


## Yii

Yii has a REST controller that can be extended, with assumptions:

    namespace app\controllers;

    use yii\rest\ActiveController;

    class UserController extends ActiveController
    {
        public $modelClass = 'app\models\User';
    }

The `UserController` will handle requests to `.../users` and use the 
"active record" class `app\Models\User`.

The normal mapping is very REST-like:

    GET /users: list all users page by page;
    HEAD /users: show the overview information of user listing;
    POST /users: create a new user;
    GET /users/123: return the details of the user 123;
    HEAD /users/123: show the overview information of user 123;
    PATCH /users/123 and PUT /users/123: update the user 123;
    DELETE /users/123: delete the user 123;
    OPTIONS /users: show the supported verbs regarding endpoint /users;
    OPTIONS /users/123: show the supported verbs regarding endpoint /users/123.


## Zend

Zend uses "method" routing to map requests to actions according to the HTTP verb:

    $route = Method::factory([
        'verb' => 'post,put',
        'defaults' => [
            'controller' => 'Application\Controller\IndexController',
            'action' => 'form-submit',
        ],
    ]);

This does not appear to be a full REST implementation.


## Facebook

Facebook is not an MVC framework, but their request handling is interesting,
nonetheless.

Using their "Graph API", they define endpoints per usecases, and provide
for RESTful data conversions...

    POST graph.facebook.com
      /me/feed?
        message="Hello, World."&amp;
        access_token={your-access-token}

Some of their requests use funky URI parameters:

    GET graph.facebook.com
      /{photo-id}?
        fields=comments.order(reverse_chronological)

This doesn't look very restful to me.

## Google APIs

Google has so many APIs it is confusing.

Just looking at an excerpt from their blogger API...

    blogger.pages.delete	Delete a page by ID.
    blogger.pages.get	Gets one blog page by ID.
    blogger.pages.insert	Add a page.

It looks like they are defining endpoints per REST, with parameters including your access
token and possibly resource ID passed as GET/POST parameters.

Confusing :(

