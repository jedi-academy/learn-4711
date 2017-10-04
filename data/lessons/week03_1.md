#Week 3 Survey Results

Responses for each of the surveys follow, with the number of similar
responses denoted by a value in brackets, if appropriate.

There were 8-9 responders.

I have interpreted and aggregated results, in hopefully an appropriate fashion.

##WEEK 3 – CODEIGNITER OVERVIEW
			
###What do *you* think the most important takeaways are from this lesson?			

How routing works	(4)  
CodeIgniter has extensive configuration options	(2)  
Difference of MVC in CI vs other MVC IDE	(2)  
How a controller interacts with a model and a view	(2)  
Support components (helpers + library)	(2)  
CodeIgniter provides pre-build structures to make it easier for us to build our webapp	  
CodeIgniter's folder structure.	  
Have a basic understanding of how each component interacts and participates	  
Models	  
The roles of models, controllers, and views.	  
Understanding the what are the key components of CI	  
What a view is used for	  
What to do if you want to add a third party class/component to your web app	  
			
###What are topics from the lesson that *you* feel need more or better explanation?			

Helpers	(2)  --> week 7  
How do models encapsulate?	(2)  --> week 5  

loading / class loader	(2)  
<i>Answer: CI applies naming and folder conventions to locate components, by default.
There is nothing to prevent you from loading classes explicitly ... 
$customer = new \MyTeam\Models\Entities\Customer</i>

Active Record design	  --> week 5  

How do other frameworks handle routing differently?	  
<i>Answer: Some use convention, some require explicit routing rules. 
Some allow closure, with the handling code part of the routing configuration.</i>

How do view fragments work together?	  
<i>Answer: think of a view fragment as a panel in a mashup</i>

more elaboration on the view templates & the template parser	  --> week 6  

Process of making your own BASE controller/model/etc...	  
<i>Answer: a BASE component is one with properties and logic that you want to
use with all such components. You would extend it instead of the basic one
that comes with a framework.</i>

QueryBuilder	  --> week 5
Routing	  --> week 4
URI parameters passed positionally	  --> week 4

what's the usage of other configuration files?	  
<i>Answer: CI provides separate configuration files for each of its components
or component groups. Some frameworks have a single configuration file
with sections for different components or groups.</i>

			
###Are there other, related, questions that you would like addressed in class?			

base model vs other model	  
<i>Answer: CI_Model is effectively a marker interface. Use a base model for
common functionality, eg CRUD</i>

Could you explain Routing in a simpler way?	  
<i>Answer: the decision-making involved in determining which
controller class should handle an incoming HTTP request</i>

Entity-level logic vs aggregation & persistence logic	  
<i>Answer: Entity-level deals with single entities, and has nothing
to do with persistance. Aggregation level deals with sets of entities,
and their persistance. An example:  
$customer = $customers->get('John');  // get an entity from the collection  
$customer->setPhone('555-1234');  // change something in the entity  
$customers->update($customer); // save the entity back in the collection  </i>

If I have to use JS, what are the things that I need to be aware of?	  
<i>Answer: JS is client-side. If using AJAX, you might provide utility controllers
to return JSON data instead of HTML</i>

Is there a way to avoid confusions such as the same url could refer to different controllers?	  
<i>Answer: see above</i>

What does $this->parser->load() do?	  
<i>Answer: er, $this->parser->parse($filename) performs variable substitution
using bracket notation, and then echos or returns the result.  
There is no $this->parser->load()</i>

Whats the difference between $this->load->view() and $this->render()?	  
<i>Answer: $this->load->view(...) processes a PHP script, after making
any view parameters accessible as local variables.  
$this->render() invokes the base controller's "render", which
uses the template parser to assemble the "meat" of an HTML page,
and then injects that into a view template.</i>

Why commonly used functions are stored in the helper?	  
<i>Answer: these are "global" functions, that CI refers to as "helpers".
These are typically used when static methods in a class would
be considered silly or over-kill. Most frameworks provide something
like this.</i>

			
###Do you have comments or suggestions about the flipped learning process?			

pictures are good
The text on slide 21 is cut off at the bottom
<i>Answer: Adjusted</i>

There are some slides where the paragraphs exceed the border of the page, so i had to go to text view every time a slide has such issue.
<i>Answer: it would help if you can provide slide #'s; they look ok on my system, 
but we don't all use the same resolution screen or window.</i>


##WEEK 2 – CODEIGNITER CONTROLLERS
			
###What do *you* think the most important takeaways are from this lesson?			

How the controller interacts with the rest of the components of the framework	(5)  
Passing input and output between view and controller.	(4)  
Different controllers for different things.	(2)  
CI controller provide us with useful functions	  
Controller's Role and Usage	  
How CI's MVC works.	  
importance of URLs and interpretations	  
Key functions that are often used	  
The way to figure out which controller is referenced by a URL, and the function that is used in this page.	  
types of controllers	  
ways of getting input	  
ways of producing output	  
			
###What are topics from the lesson that *you* feel need more or better explanation?			

Controller Basics  
<i>Answer: ?</i>

Drivers and adapters  
<i>Answer: technique used for database abstractions and session storage. 
Common functionality is provided in the driver, and then adapters are
provided for supported database engines or storage mechanisms.</i>

how often would template parser be used  
<i>Answer: Most developers choose plain views, the template parser, or an external templating engine
for all their HTML output. Some choose different renderers for different parts of their app.</i>

how should URL be specific to avoid misinterpreation  --> week 4
<i>Answer: discipline. Seriously, the URL mapping provides flexibility, but you need to be careful.</i>

How the naming works for the URL  --> week 4

Key Controller Abstractions  
<i>Answer: ?</i>

Parser.  --> week 6
Producing Output, more specifically the template parse, how it works and why it is used  --> week 6

Using Stuff  --> week 7

View parameters and passing data to the views  --> week 6
			
###Are there other, related, questions that you would like addressed in class?			

Aren't all controllers service controllers (using REST)?  
<i>Answer: NO!!! Most controllers, regardless of language or framework, are "normal" controllers. Many service controllers are RESTful, but not all</i>

Could you explain how parser are used in the provided examples?  
<i>Answer: see views/template.php and core/MY_Controller...</i>

For all the stuff slides...are they showing how we can call things from stuff?  
<i>Answer: not exactly. To use a specific thing...  
$this->load->stuff('apple'); // load a component  
$this->apple->work(...); // use that component</i>
			
###Do you have comments or suggestions about the flipped learning process?			

I am liking the flipped learning process, it allows me extra time to understand when needed instead of moving from one concept to the next. It also allows me to ask for further explanation when needed without the fear of potential peer judgment for not understanding something.  
<i>Answer: cool :)</i>

I am not a huge fan of this kind of learning style.  I feel like I am not getting much things out of these lessons.  
<i>Answer: how can it be improved?</i>

simple Code examples are helpful
