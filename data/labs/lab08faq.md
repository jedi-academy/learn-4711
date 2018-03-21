#Lab #8 - A Taste of XML
COMP4711 - BCIT - Winter 2018

#F A Q

Some interesting things to note...

##Oops?

A number of recent labs are getting an error message...

    Message: Undefined property: Tasks::$app

The stacktrace leads back to line 17 of the `Tasks` model, which tries to get
the `app` property of the current model. That may not be accessible, and the workaround:

    class Tasks {
        private $CI; // use this to reference the CI instance
        public function __construct() {
            parent:__construct...
            $this->CI = &get_instance(); // retrieve the CI instance
        }
        public function getCategrizedTasks() {
            ...
            $task->group = $this->CI->app->group($task->group); // use CI to get at the app model
            ...
        }
    }

##How to read the XML_Model code?

The XML_Model that is part of starter4 has the two methods you need to 
customize, inside your `Tasks` model, for this week's lab.   

The `load()` method contains two different strategies for loading a generic
XML document (with no attributes in the data structure), into an in-memory
array of objects.

The first, from lines 51-69, uses [SimpleXML](http://php.net/manual/en/book.simplexml.php) to read and process the XML
data. It has been commented out, since we only need one way to load the data.
It was kept in the code as an example of that strategy.

The remainder of the `load()` method use the [PHP-DOM](http://php.net/manual/en/book.dom.php) approach to
reading and extracting a generic XML document into an in-memory array of objects.
The code here is also more robust than the SimpleXML approach, because
of enhanced error-checking and not because PHP-DOM is naturally
more robust than SimpleXML.

You would use one technique or the other. Mixing them will usually lead
to inconsistent results!

The `store()` method contains a commented block of code which creates a CSV
file, and should probably not be there.

The balance of the method uses the PHP-DOM approach to create an XML DOM
from our internal array of objects, and to then save it.

##SimpleXML example?

In the organizer, I have added a link to a SimpleXML example repo I used a couple of years ago.
It is basically a one-page app, which reads and displays some XML order
data.

##Suggestion to avoid grief

Once you have created your XML document with task data, keep a copy
in a separate folder or on your desktop. While you are developing your `store()` method,
if it doesn't work it will leave an empty XML file. You can replace this empty file
with your saved copy, to avoid having to recreate it :-/
