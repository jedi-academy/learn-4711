# Model Examples From Other Frameworks

The examples below have been excerpted from the different frameworks' user
guides. They may not be what the framework intended, but they are my interpretation.

## CakePHP

CakePHP supports views, view variables, and templates.
They sound similar to CodeIgniter's.

In a controller...

    public function view_active()
    {
        $this->set('title', 'View Active Users');
        $this->viewBuilder()->layout('default_small_ad');
    }

referencing a view template like ...

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title><?= h($this->fetch('title')) ?></title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Include external files and scripts here (See HTML helper for more info.) -->
    <?php
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    </head>
    <body>

    <!-- If you'd like some sort of menu to
    show up on all of your views, include it here -->
    <div id="header">
        <div id="menu">...</div>
    </div>

    <!-- Here's where I want my views to be displayed -->
    <?= $this->fetch('content') ?>

    <!-- Add a footer to each displayed page -->
    <div id="footer">...</div>

    </body>
    </html>

It also has the notion of view blocks (fragments?)

    // Create the sidebar block.
    $this->start('sidebar');
    echo $this->element('sidebar/recent_topics');
    echo $this->element('sidebar/recent_comments');
    $this->end();

    // Append into the sidebar later on.
    $this->start('sidebar');
    echo $this->fetch('sidebar');
    echo $this->element('sidebar/popular_topics');
    $this->end();

and it talks about views...

    <?php
    // In your view file
    $this->Html->script('carousel', ['block' => true]);
    $this->Html->css('carousel', ['block' => true]);
    ?>

but it isn't clear to me if those are part of a view template file.

## Fat-Free

Interestingly, F3 claims that PHP itself is a template engine (their words).

For instance, the controller code...

    $f3=require('lib/base.php');
    $f3->route('GET /',
        function($f3) {
            $f3->set('name','world');
            $view=new View;
            echo $view->render('template.htm');
            // Previous two lines can be shortened to:
            // echo View::instance()->render('template.htm');
        }
    );
    $f3->run();

Might reference a template <code>template.htm</code>...

    <p>Hello, <?php echo $name; ?>!</p>

F3 also has a template language. The controller code...

    $f3=require('lib/base.php');
    $f3->route('GET /',
        function($f3) {
            $f3->set('name','world');
            echo \Template::instance()->render('template.htm');
        }
    );
    $f3->run();

might reference the following template file...

    <p>Hello, {{ @name }}!</p>

It supports nested templates, embedded expressions, and conditional or repeating 
segments, such as the following nested repeat blocks.

    <repeat group="{{ @div }}" key="{{ @ikey }}" value="{{ @idiv }}">
        <div>
            <p><span><b>{{ @ikey }}</b></span></p>
            <p>
            <repeat group="{{ @idiv }}" value="{{ @ispan }}">
                <span>{{ @ispan }}</span>
            </repeat>
            </p>
        </div>
    </repeat>


## FuelPHP

Fuel supports views, with view fragments. One usage...

    class Controller_Home extends Controller
    {
        public function action_index()
        {
            // create the layout view
            $view = View::forge('layout');

            // assign global variables so all views have access to them
            $view->set_global('username', 'Joe14');
            $view->set_global('title', 'Home');
            $view->set_global('site_title', 'My Website');

            //assign views as variables, lazy rendering
            $view->head = View::forge('head');
            $view->header = View::forge('header');
            $view->content = View::forge('content');
            $view->footer = View::forge('footer');

            // return the view object to the Request
            return $view;
        }
    }

and the views, such as layout.php, can reference view parameters...

    <html>
        <head>
            <?php echo $head; ?>
        </head>
        <body>
            <?php echo $header; ?>
            <?php echo $content; ?>
            <?php echo $footer; ?>
        </body>
    </html>

To its credit, it does provide a Parser package, which lets you configure
third party templating engines to use. There is a bunch of configuration,
but you could have Smarty automatically process a view if it is named
appropriately...

    $view = View::forge('example.smarty');

## Laravel

Laravel supports the notion of views, with view parameters. The routing

    Route::get('/', function () {
        return view('greeting', ['name' => 'James']);
    });

would process the following view appropriately.

    <!-- View stored in resources/views/greeting.php -->
    <html>
        <body>
            <h1>Hello, {{ $name }}</h1>
        </body>
    </html>

Laravel also comes with a built-in template engine, Blade.
It supports directives, which can structure a view, and which can afford conditional
or repeating content control, as well as injecting results from
other webapp components. An example blade template:

    <!-- Stored in resources/views/layouts/app.blade.php -->

    <html>
        <head>
            <title>App Name - @yield('title')</title>
        </head>
        <body>
            @section('sidebar')
                This is the master sidebar.
            @show

            <div class="container">
                @yield('content')
            </div>
        </body>
    </html>

which might be extended with a specialized template:

    <!-- Stored in resources/views/child.blade.php -->

    @extends('layouts.app')

    @section('title', 'Page Title')

    @section('sidebar')
        @parent

        <p>This is appended to the master sidebar.</p>
    @endsection

    @section('content')
        <p>This is my body content.</p>
    @endsection



## Slim

Slim's views are provided by a <code>response</code> object, encapsulating the HTTP request / response.
It is injected as a property in your controller. This strategy is similar to Java servlets.

    <?php
    use Psr\Http\Message\ServerRequestInterface;
    use Psr\Http\Message\ResponseInterface;

    $app = new \Slim\App;
    $app->add(function (ServerRequestInterface $request, ResponseInterface $response, callable $next) {
        // Use the PSR 7 $response object

        return $next($request, $response);
    });
    // Define app routes...
    $app->run();

Displayable material is set or added to the <code>body</code> property of this.

    $body = $response->getBody();
    $body->write('Hello');

It comes with the Twig templating engine bundled. That is bound to the response object inside
your controller...

    // Render Twig template in route
    $app->get('/hello/{name}', function ($request, $response, $args) {
        return $this->view->render($response, 'profile.html', [
            'name' => $args['name']
        ]);
    })->setName('profile');

    // Run app
    $app->run();

The twig template itself might look something like...

    {% extends "layout.html" %}

    {% block body %}
    <h1>User List</h1>
    <ul>
        <li><a href="{{ path_for('profile', { 'name': 'josh' }) }}">Josh</a></li>
    </ul>
    {% endblock %}

## Symfony

Symfony supports straight PHP as a view template...

    <!DOCTYPE html>
    <html>
        <head>
            <title>Welcome to Symfony!</title>
        </head>
        <body>
            <h1><?php echo $page_title ?></h1>

            <ul id="navigation">
                <?php foreach ($navigation as $item): ?>
                    <li>
                        <a href="<?php echo $item->getHref() ?>">
                            <?php echo $item->getCaption() ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </body>
    </html>

and it also comes with Twig, which have the following template instead of the one
just above...

    <!DOCTYPE html>
    <html>
        <head>
            <title>Welcome to Symfony!</title>
        </head>
        <body>
            <h1>{{ page_title }}</h1>

            <ul id="navigation">
                {% for item in navigation %}
                    <li><a href="{{ item.href }}">{{ item.caption }}</a></li>
                {% endfor %}
            </ul>
        </body>
    </html>

Twig supports directives, nested templates (fragments), layout extensions, and more.

## Zend

Zend has a rich "view layer" to address presentation, along the lines of Java EE.
This package includes classes for variables containers, view models, renderers, resolvers,
views, rendering strategies, and response strategies, together with a view event 
model to bind these together.

It can get complicated (way beyond the scope of a simple comparison), 
but here is an example using it...

    namespace Content\Controller;

    use Zend\Mvc\Controller\AbstractActionController;
    use Zend\View\Model\ViewModel;

    class ArticleController extends AbstractActionController
    {
        public function viewAction()
        {
            // get the article from the persistence layer, etc...

            // Get the "layout" view model and inject a sidebar
            $layout = $this->layout();
            $sidebarView = new ViewModel();
            $sidebarView->setTemplate('content/sidebar');
            $layout->addChild($sidebarView, 'sidebar');

            // Create and return a view model for the retrieved article
            $view = new ViewModel(['article' => $article]);
            $view->setTemplate('content/article');
            return $view;
        }
    }


