#Lab #8 - A Taste of XML
COMP4711 - BCIT - Winter 2018

##Lab Goals

The purpose of this lab is to give you a taste of XML,
by enhancing our existing todo list manager
so that it uses XML for persistence.

We will continue to use gitflow workflow. That means proper branching (master/develop), 
completing new work in feature branches, and good commit comments.

All code changes will be made to your `TaskList` model, which will now
use an XML file for persistence. 

Your `Task` entity model class will
be unchanged, as will your unit testing.


##Lab Teams & Submission

Use the same "Lab 5/6/7" team as for the last lab.

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

Create an XML document, `data/tasks.xml`, to hold essentially the same
kind of data as your existing CSV file.
Add half a dozen of your todo tasks, basically converting them
from the CSV file.

Looking at the different strategies, a"mixed" or an attribute-centric
approach would suit our data best. 

With a "mixed" approach, each task would look something like

    <task id="123">
        <priority>H</priority>
        ...
        <desc>Whatever needs doing</desc>
    </task>

With an attribute-centric approach, each task would look something like

    <task id="123" priority="H" ...>Whatever needs doing</task>


The entire todo list would be saved in a single XML document,
which would have a root element (tasks) containing a
number of "task" elements (or whatever entity name
you use), each of which had elements corresponding
to the properties of a todo item.

You don't need a DTD or schema.

Lesson "xml01" in the supplementary reading section of
the organizer would be useful as a refresher.

### 2. Modify Your Model Loading

Your `TaskList` model should now extend `XML_Model` instead
of `CSV_Model`.

The `XML_Model` that came with "starter4" implements
an element-centric approach for saving objects using XML.

You will need to over-ride the `load()` 
method to suit the structure you used above.

The starter code is useful as an example, but won't do
everything for you.

See the [PHP manual](http://ca.php.net/manual/en/simplexml.examples-basic.php) 
for examples, and ask us if you have questions.

You might also find the [SimpleXML example](https://github.com/jedi-academy/example-simplexml-winter2016) 
I have used previously to be helpful.

Remember to cast any SimpleXMLElement objects to appropriate PHP
data types (eg string), to build your entity objects.

Verify this works by making sure that your todo-list pages display
as expected.

### 3. Modify Your Model Storing

Over-ride the `store()` logic in your model with code
to rebuild the collection as a SimpleXMLElement that suits
the data structure above.

Again, the provided code is element-centric, and useful
as a guide.

At this point, your webapp should behave exactly
as it did before, complete with maintenance,
the only difference being the way it is persisted.
 
##What if I want to use DOMDocument instead of SimpleXMLElement?

Go for it. That decision only affects your model's `load()` & `store()`.
