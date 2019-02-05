# Seminar #5 - Responses
COMP4711 - BCIT - Winter 2019

## Starter...

I suggest relax the  skeleton project used for CodeIgniter4
webapps. So far, we have used the "devstarter", and I think
we can do just fine with the 
"[appstarter](https://codeigniter4.github.io/userguide/installation/installing_composer.html#app-starter)".

Note that when Composer-creating  a project, you can specify the name of
the project folder, and that should end up as the root of a repository.

    composer create-project codeigniter4/appstarter -s alpha MYPROJECT

If started with the "devstarter", you want to refresh some of your `app/Config` files
from `vendor/codeigniter4/codeigniter4/app/Config`: Autoload, Filters, Modules,
Paths, Servies and Toolbar.

## What We Have So Far

We create a resource route in `app/Config/Routes.php`, eg.

    $routes->resource('photos', 'Photos_Controller');

and we then create a controller, `app/Controllers/Photos_Controller.php`,
with the seven methods suggested by the resource routing: index, new, edit,
show, create, update and delete.

Only the first four methods are accessible through an HTML link (GET), and
the fifth can be triggered in an HTML form's action method (POST).

In our implementation, we build a resource record as an associative array,
and a set of them as an array of associative arrays, trusting the framework
to "do things right".

The expected response handling is through the API ResponseTrait, typpically
the `respond` method.

Not of of you are doing this, and I see varying degrees of success.

## Where You Got

Group; repo; starter; index(); show($id)

1; cartaroomlab04; dev; var_dump (X); object (Y) -> xml
15; team-twenty-four; dev; boom; boom (case sensitivity) ... s/b HTML view (X); object (?)
3; comp4711cartaroomlab004; dev; boom; boom (case sensitivity) ... s/b obj; obj array 
4; lab4-cst; dev; boom ... need to update config; x; x
5; carlotoni; dev; ...
6; illiterate-pizzamen; dev; ...
8; fitwalk-william; CI3.1 (X)
    
## Response Formatter

Tailor Config/Format

https://codeigniter4.github.io/userguide/outgoing/api_responses.html?highlight=formatter#handling-response-types

## Explicit Response "Casting"

https://codeigniter4.github.io/userguide/outgoing/response.html#setting-the-output

## Content Negotiation

https://codeigniter4.github.io/userguide/incoming/content_negotiation.html

## Dissent in the PHP World

Laravel interprets new() and edit() methods as returning an HTML page
with a suitable form on it.

## RESTful APIs

websafe option; everything becomes GET or POST

https://codeigniter4.github.io/userguide/incoming/routing.html#resource-routes

## Future Refinements

Filter to handle incoming POST/... data variations 

Filter to handle API token

