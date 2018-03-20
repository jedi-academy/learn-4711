#Reading unit-testing - The Next Level
COMP4711 - BCIT - Winter 2018

##Better Unit Testing

You may have noticed that the first part of the output from `phpunit` was HTML.
Looked at closer, it is the HTML resulting from invoking
the default method of the default controller.

This happens because we are grafting unit testing onto our existing app.
Our bootstrap script is a copy of `public/index.php`, which loads
a bunch of framework pieces and then routes the incoming request,
before carrying out the unit tests prescribed in `phpunit.xml`.

In a more proper world, we would want the framework loaded, so
that our app components behaved as expected, but we want to stop short
of routing a default request.

This would be done by using a mock object for the framework, namely
one which replaced `core/Codeigniter.php` for unit testing purposes
only, but finished about where the "sanity checks" are in the
original.

We're not going down that road, as this course is about using an MVC framework,
and not specifically about unit testing.
Unit testing is something we do to better prove the correctness
of our app's models.

##Beefing up Entity Models

The entity model we built for unit testing is demonstrably correct,
if our unit tests are appropriate and exhaustive. How do we leverage
that to make a more robust app?

Our collection models should return appropriately tested entity 
objects, instead of `stdClass` objects.
The "starter4" we have been using takes some baby steps towards that,
but is not complete for that purpose in its present form.
That is a planned enhancement, but not something to expect during
this instance of the course.

Something that would make life a lot easier, converting "stuff" into
appropriate entity objects, would be to provide some convenience
constructor logic in our base `application/core/Entity`, 
along the lines of:

    class Entity extends CI_Model {

        // Convenience constructor - populate declared properties from given data
        public function __construct($given) {
            $props = get_class_vars(static::class);
            if (is_array($given)) {
                foreach($props as $key => $value)
                    if (isset($given[$key]))
                        $this->$key = $given[$key];
            } elseif (is_object($given)) {
                foreach($props as $key => $value)
                    if (isset($given->$key))
                        $this->$key = $given->$key;
            }
        }

        // rest of class def here
    }

This isn't necessarily efficient or even correct, but the notion
provides a way to make entity objects from standard objects
or associative arrays of key/value pairs.

If you have setter methods in your class, they will be automatically used,
and business rules enforced.

Doing something like this would force you to make your app code more robust (Java-like),
in the sense that every entity model object creation could conceivably
throw an exception, and you will need loads more try/catch blocks!

##Behavior Driven Testing

Unit testing typically only checks the correctness of that part of your business logic
that can be expressed as model mutator methods.
It does not test that your app is behaving the way a user of it would expect.

For that, you want behavior-driven testing. A testing framework for this would
provide a user agent emulator, a way to make requests of your app, and ways
to test the correctness of the response. This is also known as functional testing 
or use case testing.

Some sample frameworks that provide this:

- [Codeception](https://codeception.com/) for PHP; for use case testing, cross-browser
testing, framework testing, and REST API testing. It is built on top of PHPUnit.
- [Jasmine](https://jasmine.github.io/) for Javascript code testing; implementations 
for Ruby, Python and Node.js
- [Nightwatch.js](http://nightwatchjs.org/) for browser-based blackbox testing of an app
- [HtmlUnit](http://htmlunit.sourceforge.net/) for Java-coded blackbox testing of an app

These basically let you script usecase execution, simulating vlicks on webpage 
links or form submission, and being able to make assertions about the resulting
HTML output, using jQuery-like DOM selectors.
