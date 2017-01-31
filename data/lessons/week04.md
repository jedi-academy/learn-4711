#Week 4 Survey Results

Responses for each of the surveys follow, with the number of similar
responses denoted by a value in brackets, if appropriate.

There were 48 responders.

I have interpreted and aggregated results, in hopefully an appropriate fashion.

##WEEK 4 – BASIC ROUTING
			
###What are topics from the lesson that *you* feel need more or better explanation?			

- callback routing	8  _In lecture._
- HTTP Routing	5  _In lecture_
- Routing Rules	4 _In lecture_
- RESTful	3  
_Week 12. Preview: REST requires HTTP verb based treatment of requests,
content negotiation, and complete state transfer.
RESTful is most of this, but with implementer interpretation._
- Wildcard Routing	3  _In lecture_
- Are the routing rules just a massive switch statement directing where to go / get resources?	2  
_No, but they could be thought of that way._
- CodeIgniter Routing	2  _In lecture_
- Controller's relationship with routing	2  
_Routing is the process of choosing a controller._
- Regex routing	2  _In lecture_
- Remapping	2  _Actually in different lesson ... can override the method
chosen by routiung._
- 404 page	_Routing rule can prescribe your own custom handler for 404s._
- Apache view of URIs	_In lecture_
- by convention VS by configuration - in simple words?	  
_By convention: choose the controller to use simply because of its location
in the application's controllers folder. By configuration: provide
a routing rule that would result in a different choice._
- Can we go a bit more in depth on regular expressions? I remember them causing a lot of difficulty for people in the past.	 
_Out of scope_
- CodeIgniter Routing - real example?	_Hmm, other than the ones in the slides? not sure..._
- Could you give an example of URI in the grand scope of things?	2   
*Fundamentally, any "web address". See https://en.wikipedia.org/wiki/Uniform_Resource_Identifier*
- Couldn't we just state where the controller was instead of using routing?	 
_Routing **is** stating where the controller is._
- Difference between CodeIgniter view of URIs and SEO's	  
_SEO identifies resource paths, and one with index.php is different from one without.
CI is looking to identify application controllers, regardless of index.php._
- Drivers and what they do	_Not a controller or router ... ask out-of-band._
- Error routing	 _Simple way to override 404 handling._
- For me I think the different between view and view templating	 _Off topic._
- how can we use the MVC ourselves to create simple project from scratch	 
_Off-topic, but: follow O-O usecase realization ... make models for your data sources, controllers
for your usecases and subusecases, and "views" for the presentation._
- how routing algorithms/regexs work.  upon looking at the examples I am not completely sure how the route is broken down and translated into the uri	 
_In lecture_
- how to hide index.php from users	_.htaccess (Apache) or equivalent._
- Is the index.php hidden automatically by codeigniter	 _Not in CI3, but yes in CI4. It is in our CI starters, however._
- Libraries	_Off topic, but think classes._
- more on default controllers	 _If no controller can be determined for a routing rule,
look instead for the "default controller" in the folder the routing ended in._
- PHP	_Off topic. If you have PHP questions, see me during office hours or ask me in lab._
- Reminder of RESTful API principles?	_See above_
- route target	_Controller/method_
- routing	_In lecture_
- SEO	*Search engine optimization ... see https://en.wikipedia.org/wiki/Search_engine_optimization*
- Slide six mentions "SEI", but I haven't a clue that it means (even after googling)	_Oops. fixed._
- The conditions to use entites or controllers	_Unclear question._
- the mvc codeigniter part	_???_
- WEB	_??? What is your question?_
- What are all the major benefits from routing?	  _Benefits? routing just **is**. This is like asking what the benefits of breathing are to humans.  
If your question is why use routing instead of "convention", I will address that in lecture.
The best example I might use personally would be part of remapping for localization, in the
"Advanced Routing" lesson._
- when do we use the different uri's	 _UX design issue._
- why dont they include the front controller	 _Front controller can confuse/muddy SEO._
- wildcard token	_In lecture_

###Are there other, related, questions that you would like addressed in class?			

- The use of the heavy models or heavy controllers in web desgin	3  _Off topic_
- Basic routing and functions	2  _See above_
- Does routing increase or have no effect on security?	2  
_You could argue that routing can lend some security through obscurity, but I don't think that is a strong point.
There are many other things you can do that would have a much bigger impact on security, for instance
cleansing input or escaping output._
- Exampes of routing rules	2 _In lecture_
- a more in depth look at how codeigniter handles routing.	 _In lecture_
- Ajax	_Coming in week 12_
- Are the ways of routing fairly generic across the field? Or is there a particular routing mechanism that's used by most?	   
_All the frameworks support routing by configuration, with similar kinds of rules, albeit
very different expression of those.  
None seem to offer routing by convention.  
See the routing examples in the other frameworks section of the organizer._
- Can you give more examples on routing rules and regular expression?	_In lecture_
- Could you talk futher about RESTful service and how its implemented in CI?	_Not until week 12_
- Difference between URI and URL?	_I am not an expert. See earlier reference. The two are often used interchangeably._
- How are the different views of URIs going to affect the way we program it?	_That should make no difference to us._
- How does git stash work?	_Off topic_
- Is it better practice to set up a web app so that it uses routing by convention or configuration?	_Sure_
- Is it possible to set up codeIgniter to handle errors besides 404? (IE: 403 Forbidden or 429 Too many Requests?)	  
_Yes, through an addin. I do not have a reference handy._
- It is better to do routing by wildcard or regular expression?	 _Er, wildcards are part of regular expressions._
- Over-riding with routing rules.	_Unclear question._
- the details and format about the web configration	_Off topic. Ask me during office hour or in lab._
- The routing rules are configured in application/config/routhes.php.  
Are there any other ways to express the rules other than elements of an array (a different container perhaps)? 
And if so are there any benefits to using different types of containers?	 
_Not in CI3, but in CI4. "Containers"...?_
- What are helpers?	_Off topic. See previous weeks._
- what does codeigniter works		_Off topic. See previous weeks._
- What does it mean to have  ' "index.php" injected'?	_The URL is "rewritten" to include index.php as the first segment._
- what if i wanted to add a custom 404 page?	_Modify the error pages inside views/errors"_
