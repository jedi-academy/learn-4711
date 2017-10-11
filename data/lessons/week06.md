#Week 6 Survey Results	– VIEWS
	
Responses for the survey ready on time follow, with the number of similar
responses shown to the right of a response.
	
There were 38 responders.	
	
###Which "view" topics need more/better explanation?	

- Multiple Layouts	4  _Lecture_  
_The [Vancouver Sun](http://vancouversun.com/) has different layouts even on the homepage. Generally,
one layout for a [section](http://vancouversun.com/category/news/local-news),
a different layout for [stories](http://vancouversun.com/news/local-news/burger-king-b-c-judge-awards-46000-to-cook-fired-for-taking-food),
yet another one for [classifieds](http://classifieds.vancouversun.com/) and so on!_
- Responsive Layout	4  
_Usually done with a CSS framework. Design the layout using responsive elements
from the framework, and plan for them to have div names or IDs that your webapp
provides the content for, one "panel" at a time._
- Client Driven Layout	3  
_Managed client-side, using JS. Not part of the planned course content.  
You can "support" this situation if you provide multiple endpoints
(eg subcontrollers) that each movable panel might be bound to._
- View Assembly Strategies	3  _Lecture demo_
- CI Parser	3  _Lecture demo_

- Escaping variable values	3   
_Good practice: escape anything that came from a user or outside, and which hasn't
been vetted senseless. Also escape potentially dangerous stuff, in case you
do something wrong.  
This is not just a CodeIgniter thing - it is standard practice regardless
of the language or framework used!  
Minimum "escaping": replace HTML/JS delimiters with entity codes._  
_This gets complicated. I will address it briefly in class, and may select
Zend\Escaper as a third party addin to integrate, when that comes up in lab._  
_You might find the [CodeIgniter 4 security guidelines](https://bcit-ci.github.io/CodeIgniter4/concepts/security.html) interesting :)_

- CI view	2  _Lecture demo_
- Template Parser vs View fragments	2  
_View fragments make most sense with repeating groups or with changing layouts.  
A view fragment is a small presentation panel, for one of the repeating groups,
or for "mashup" panels, and intended to be created using
the template parser. This is an example of fine granularity in view
construction.  
You could also have a single view containing a directive to control repeating.
This would be an example of coarser granularity._
- View Construction Strategies	2  _Lecture demo_
- Templating parsers vs engines	 2   
_A "parser" substitutes values for variables denoted specially.  
A templating engine adds one or more of: logic constructs, extensions for other tools,
layout support, etc._
- Can you detect viewport size and use that to determine the layout you want?	  
_You *could*, with the help of some client-side Javascript.
The normal practice is to leave that totally up to the responsive CSS
framework you use, which does just what you ask._
- CI is shipped with some Library/Helper classes for constructing views (e.g: The Table class) which was not mentioned in the slides. Is there any concern to using these classes?	 
_As long as they are appropriate, there is no problem.  
eg. the Table library would be good for generating the view for a two dimensional array, **if**
that view is intended for a tabular presentation and not for layout.  
Note that a CSS framework can style an HTML table very elegantly._
- Controllers functions within a layout	  
_Controllers are not inside a layout. Think instead of controller methods each providing
one of the panels in a layout.  
This should be layout driven, i.e. create the view with assumed parameters for id names,
and have the controller create and pass those as parameters._
- Creating custom codeigniter view syntax	_Question unclear ... ask me in lab_
- How does CI parser with script works?	  
_The view file is still processed by PHP, which means that PHP script
embedded in a view file is still executed. This is handled
differently in CI4, which does not provide this loophole._
- How should we handle handle errors in views elegantly in cases where the variable could not be grabbed due to internet/server timeout?	  
_Have the controller handle the exception raised, and prepare an alternate view or form element
content if needed._
- how the view is combined to controller	  
_The controller passes parameters to the view. These parameters can themselves
be well-formed HTML fragments :)  
A view would "connect" to controllers by containing hyperlinks to the apprpirate
(sub) controllers, or through AJAX calls made using Javascript, to suitable
endpoints in your webapp._
- How to choose a layout when you have more than one. Which conditions to check?	  
_Be guided by your layout designer. Examples ^^_
- How to create client-driven layouts	  
_This is client-side, done with a suitable JS framework ... not our job.  
Our job is to provide negotiated endpoints to provide content on demand to AJAX requests._

- Is having PHP code inside a view considered "bad practice"?	   
_Absolutely. "4 out of 5" dentists would agree. Seriously, most of the web
developers I know agree with the separation of concern, while a minority
believe that "real programmers" only use raw PHP :-/  
The practice is not unique to CI: a number of webapp
frameworks over the years have tried to avoid "code"
in their "views", some less successfully than others :-/_
    - [Java Servlet Pages](https://www.ibm.com/developerworks/java/tutorials/j-introjsp/j-introjsp.html) ... notice the document date!
    - [JSP tag libraries](http://www.studytonight.com/jsp/jstl-in-jsp.php)
    - [ASP.NET](https://www.w3schools.com/asp/webpages_examples.asp)
    - [Java Facelets](http://docs.oracle.com/javaee/6/tutorial/doc/gjaam.html)

- Javascript framework integration with CodeIgniter	  
_Integration was deemed a "can of worms", and consciously removed
from CodeIgniter._
- layout  takeway   
_There are multiple places in an app's structure where
it could make sense to create/populate view fragments.
Use the cohesion & loose coupling design patterns to inform your choice._	
- More details about view using example e.g. view for array	_Lecture & demo_
- More on html_escape	_One tool in your arsenal for hardening an app;
built into PHP_
- Partial views vs foreach		_Lecture & demo_
- Proper way to pass multiple variables to a view.		_Lecture & demo_
- Reusing partial views		_Lecture & demo_
- simplifying the strategy of view assemblies to more than 1 slide for better explanation _Lecture?_	
- Traditional View Construction VS View Construction using View Fragments  
_The difference between these is the separation of concerns ... with traditional
view construction, logic & data access are everywhere; with view fragments,
most logic and all data access are inside the controller, or at least outside the view._	
- Using Javascript to supplement views	 
_Without going all out with a client-side JS framework, you
can still enhance your app's appearance and behavior, with selected JS widgets (eg a date picker)._
- Using view fragments. I'm still unclear how to integrate the fragments in a template and what's the best way to organize fragments for reusability.		_Lecture & demo_
- Variables in Views		_Lecture & demo_
- ways to render a view / view fragment		_Lecture & demo_
- Will we be talking more about view fragments?		_Lecture & demo_
