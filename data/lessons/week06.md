#Week 6 Survey Results	
	
Responses for the survey ready on time follow, with the number of similar
responses shown to the right of a response.
	
There were 31 responders.	
	
I have interpreted and aggregated some of the results, in hopefully an appropriate fashion.
It was hard, because there were a lot of answers, covering a lot of different
interpretations - that suggests I could do a better job
of preparing the online lesson, so it is more focused.
	
##WEEK 6 – VIEW BASICS	
	
###What are topics from the lesson that *you* feel need more or better explanation?	

- Client-Driven Layouts	3  
_Managed client-side, using JS.
You can "support" this situation if you provide multiple endpoints
(eg subcontrollers) that each movable panel might be bound to._
- Multiple Layout, provide example	2  
_The [Vancouver Sun](http://vancouversun.com/) has different layouts even on the homepage. Generally,
one layout for a [section](http://vancouversun.com/category/news/local-news),
a different layout for [stories](http://vancouversun.com/news/local-news/burger-king-b-c-judge-awards-46000-to-cook-fired-for-taking-food),
yet another one for [classifieds](http://classifieds.vancouversun.com/) and so on!_
- CI View/Parser	 
_The `view` handler is a method inside `Loader`. It uses PHP's `extract` method
to import the view parameters (associative array) into the local
symbol table, then "processes" a view source file.  
The `Parser` reads a view source file, then performs string substitutions
based on the parameters passed as an associative array._  
_A "parser" substitutes values for variables denoted specially.  
A templating engine adds one or more of: logic constructs, extensions for other tools,
layout support, etc._
- Comparing View Construction Strategies	_Lecture_
- Does the view have to know the name of the params? Is there a universal param that I could access instead?	 
_You craft the view with parameters in mind, and make sure that the controller passes those on.
In other words, the presentation should drive the naming of expected parameters._

- escaping variable value	 
_Good practice: escape anything that came from a user or outside, and which hasn't
been vetted senseless. Also escape potentially dangerous stuff, in case you
do something wrong.  
Minimum "escaping": replace HTML/JS delimiters with entity codes._  
**_This gets complicated. I will address it briefly in class, and may select
Zend\Escaper as a third party addin to integrate, when that comes up in lab._**  
_You might find the [CodeIgniter 4 security guidelines](https://bcit-ci.github.io/CodeIgniter4/concepts/security.html) interesting :)_

- How is the View Adapter and View View-Model working	 
_(Last week) The View Adapter pattern says that any model-extracted data is passed
to a view as parameters, so the view is unaware of its origin.  
The View-View-Model pattern says that you use a "widget" (panel, component,
div, etc), which has JS code associated with it. The JS is responsible for
building a model of data presented by that widget, and for updaitng it as needed
from remote sources. The view is unaware of the origin or the processing.
Super simple example, without involving an entire JS framework:
a type-ahead box (eg Google search or email addressee composition)._
- how pass library table to view	 
_I don't understand the question. Libraries are not passed to a view.
A two dimensional associative array could be passed as a view parameter,
with the expectation that the view might format that as a table, if appropriate._
- how to create a template view	  _Lecture/lab_
- How to pass data from a view to controller	 
_Views pass data to controllers either through an HTML form or by providing
a link the user can click on, with data embedded in the link (URI segments
or query parameters)._
- how to safely sanitize user input data from a view	_Automatic_
- Implementing Models	_Lab_
- Model View  Adapter	_See above_
- OBJECT-RELATIONAL MAPPING	 _Last week? See me if not clear_
- Reponsive Layout.provide an actualy Example	 
_Hmmm. The course hub is responsive - view it at different browser window
sizes. The magic pretty much all happens in the responsive CSS/JS framework._
- Target View Excerpt	 
_I was referring just to the table, which might be part of a more complete view.
By definition, that would make the table an excerpt._
- Template Parser & Client-Driven Layout	 
_These are two different topics. See above re client-driven layout.  
The endpoint for a movable panel could be created using the template
parser, or indeed any view construction strategy._
- templating engines	_Out of scope, some examples in the
"other frameworks" section of the course organizer._
- Using A Base Model	_(Last week) Should be clearer after this week's lab._
- Using templates	_Lab_
- View assembly strategies	_Lecture/lab_  
_Plan separate internal methods for each "panel" in your layout, regardless of the strategy you plan to use.  
Plan separate suncontrollers for those "panels" that you plan to reload using AJAX._
- View Construction Strategies	_Lecture/lab_
- View Construction Using View Fragments	_Lecture/lab_

	
###Are there other, related, questions that you would like addressed in class?	
	
- about some database build in php  _Lab_
- Can we use any framework for views?  
_Hmm - your question can e interpreted several ways...  
Outside this course - absolutely. There are many more powerful than CI's built-ins.  
Within this course - absolutely, **if** that can be done without PHP in the view
files, and **if** you are familiar with a templatihng engine you wish to use.  
If your question is instead whether all the frameworks have views, yes. See
the "other frameworks" section in the organizer._
- hope we can see specific example of assignments to help understand requirements.  
_If you are asking for working assignments as a guide, that is not likely.
I try not to reuse assignments, which means that each term is different.
That is part of the reason I try to make the assignment writeups as detailed
as possible._
- Is it better to not have any PHP on a view?   
_Absolutely. "4 out of 5" dentists would agree. Seriously, most of the web
developers I know agree with the separation of concern, while a minority
believe that "real programmers" only use raw PHP :-/_
- Is it good or bad to include php code in the view instead of the controller?  
_PHP is required in the controller. See immediately above too._
- Responsive layout is done with a desktop display in mind. What would we use if we were developing specifcally for a mobile version of the site?  
_Er, most responsive layouts are done with a mobile display in mind, and the
desktop is an afterthought. See [Bootstrap](http://getbootstrap.com/)._
- security loopholes of a view  _See above re security_
- Should we be using any of these view-rendering methodologies to inject small, focused JS scritps, or should those scripts be kept in a "scripts" folder to be loaded with the temaplate/index.php view?  
_We have ways ... coming in week 9._
- some library table or other library method can make view  
_Any PHP code can `echo`, which results in output to the browser.
Strictly speaking, that could be construed part of a "view".
In my books, you would be "fired" for doing that._
- The diffrenet symbol about the modeling how to use them and the meaning of them  
_Unclear question. If refering to the ERD connectors and symbols, that is out of our
scope ... part of COMP2714._
- View Construction using View Fragments vs View Construction Using the Template Parser, cons and pros  _Lecture_
- What is the CI parser?  _See above_
- what other tool/framewrok would you recommand for something similar like bootstrap  _Lecture_
- Where can I find packages to integrate into my CodeIgnihter ?  
_The CI forum, wiki, lmgtfy.com. A curated and categorized list of addons is
planned for the CI website, but we don't have the resources to do that at the moment._
- Which packages do you find extremely useful?  
_Personally, I prefer to keep my code lean, not relying on external packages if possible.
There are a few I find indispensible: Bootstrap, erusev.com's markdown processor,
Phil Sturgeon's REST client/server (originally).  
I am very impressed with Redactor (on-page editor)_
- WHy doesnt curly brace syntax work so well with PHP inside view?  
_My problem is that the curly braces trigger variable substitutions by PHP
, when I just want them to be "data" on my slide.
Using markdown, I can {get} away {without} the problem :)_
- would you recommend hardcoding the width and height for CSS and people want responsive on any device.  
_Don't reinvent the wheel - use a responsive CSS framework! No hardcoded width/height - CSS classes instead_

