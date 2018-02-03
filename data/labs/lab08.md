#Lab #8 - A Taste of XML
COMP4711 - BCIT - Fall 2017

##Lab Goals

The purpose of this lab is to take our existing todo list manager, and massage it
a bit so that it uses XML for persistence..

We will continue to use gitflow workflow. That means proper branching (master/develop), 
completing new work in feature branches, and good commit comments.

All code changes will be made to your `TaskList` model, which will not
use an XML file for persistence. Your `Task` entity model class will
be unchanged, as will your unit testing.

##Lab Teams & Submission

Use the same "Lab 5/6" team as for the last lab.

Continue to use the same repository as last lab, as you are building on it.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository.

Due: this coming Sunday at 17:30.

##Lab Marking Guideline

A marking rubric will be attached to the lab 8 dropboxes, similar to our
earlier labs. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

##Your jobs

### 1. Create XML data

Create an XML document, `data/tasks.xml`, to hold the same
kind of data as your existing CSV file.
Add half a dozen of your todo tasks, basically converting them
from the CSV file.

Looking at the different strategies, an element-centric
approach would suit our data best.

This would be a root element (tasks) containing a
number of "task" elements (or whatever entity name
you use), each of which had elements corresponding
to the properties of a todo item.

You don't need a DTD or schema.

Lesson "xml01" in the supplementary reading section of
the organizer would be useful as a refresher.

### 2. Create XML_Model with load()

Create `application/core/XML_Model.php`, based on
`CSV_Model.php` from the previous labs.

It will need to populate its internal array of record
objects from the appropriate XML document.

See the [PHP manual](http://ca.php.net/manual/en/simplexml.examples-basic.php) 
for examples, and ask us if you have questions.

You might also find the [SimpleXML example](https://github.com/jedi-academy/example-simplexml-winter2016) 
I have used previously to be helpful.

Remember to cast any SimpleXMLElement objects to appropriate PHP
data types (eg string), to build your entity objects.

Test this by having your task collection class extend XML_Model instead
of CSV_Model, and make sure that everything displays as expected.
Did you remember to "include_once" your XML_Model at the end of `appliction/core/MY_Model`?

### 3. Add store()

Replace the `store()` logic in your model with code
to rebuild the collection as a SimpleXMLElement,
and save it, overwriting the original.

At this point, your webapp should behave exactly
as it did last week, complete with maintenance,
the only difference being the way it is persisted.
 
##Decisions!

###What if I prefer a different structure?

Element-centric:

    <stuff>
        <item>
            <prop1>kjh</prop1>
            <prop2>asfdasdf</prop2>
        </item>
        <item>
            ...
        </item>
    </stuff>

Attribute-centric:

    <stuff>
        <item prop1="kjh">asfdasdf</item>
        <item prop1="...">...    </item>
    </stuff>

Attribute-centric may make more sense to you, which is fine.
The only hiccup is that it isn't easily generalized, and instead of

    class Stuff extends XML_Model {
    }

... you would end up with

    class Stuff extends Memory_Model {
        public function __construct(...) {...}
        public function load() {...}
        piblic function store() {...}
    }

##What if I want to use DOMDocument instead of SimpleXMLElement?

Go for it. That decision only afects load() & store().
