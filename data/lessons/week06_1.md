#Week 6 Survey Results	
	
Responses for the survey ready on time follow, with the number of similar
responses shown to the right of a response.
	
There were 32 responders.	
	
I have interpreted and aggregated some of the results, in hopefully an appropriate fashion.
It was hard, because there were a lot of answers, covering a lot of different
interpretations - that suggests I could do a better job
of preparing the online lesson, so it is more focused.
	
##WEEK 6 – VIEW BASICS	
	
###What do *you* think the most important takeaways are from this lesson?	
	
- **Template parser and view fragments**	10
- proper ways to pass parameters to view cleanly	8
- **Separation of concerns – Logic should not be in views.**	5
- view construction using the template parser	5
- View construction	4
- It's better to have php variables inside the controller as supposed to inside the view	3
- **The differences between the traditional , template parser , and view fragment approaches.**	3
- View Assembly Strategies	3
- CI syntax when using variables in views	2
- CI view ability	2
- Learning responsive layout	2  
_Interesting - I added this reminder from COMP1536 for completeness_
- Templating engine	2
- CI has options for layout, and can integrate popular packages into CI webapp.	
- Client side doesn't see the PHP	
- code example	
- Compare PHP view syntax and CI view syntax	
- Controllers and Views used in conjunction is very powerful and has a lot of functionality	
- Controllers can make creating responsive layouts really easy	
- Escaping regular expresions is hell	
- how to properly build a view	
- HTML handling	
- layouts	
- That the CI framework has a template engine which helps make the view code more readable than in-line PHP.	
- The annoying/roundabout method is the better method	
- Traditional view construction is bad	
- Understanding CI views	
- Use html_escape to escape variable values	
- view and the different approaches	
- View Construction & Assembly	
- View data output	
- You are able to pass variables into views that can be used to display data.	
- You can create layouts that can be used as a template for views.	
	
	
###What are topics from the lesson that *you* feel need more or better explanation?	
	
- Escaping values, cross-site scripting	5  
**_This gets complicated. I will address it briefly in class, and may select
Zend\Escaper as the third party addin to integrate, when that comes up in lab._**  
_You might find the [CodeIgniter 4 security guidelines](https://bcit-ci.github.io/CodeIgniter4/concepts/security.html) interesting :)_
- View Construction Approaches	4  
_What more would you like to know?_
- Multiple Layouts	3  
_I will add this to one of the labs_
- Many images are broken	2
_Oops - I didn't realize that, and have fixed it._  
**I am setting up a continuous deployment server, driven by git pushes/merges**
- pros and cons of curly brace syntax	2  
_Braces **are** the way to denote a substitution variable for the parser_
- View assembly strategies	2  
_Plan separate internal methods for each "panel" in your layout, regardless of the strategy you plan to use.  
Plan separate suncontrollers for those "panels" that you plan to reload using AJAX._
- Can we take a closer look at parser logic?  
_Not sure what you are getting at here_
- ci parser	
- For a responsive layout, although it is mainly done through CSS/JS, would this affect the php code that interacts with the view?  
_See the answer above about "panels"_
- How Parsers work, benefits and usual uses?  
_A "parser" substitutes values for variables denoted specially.  
A templating engine adds one or more of: logic constructs, extensions for other tools,
layout support, etc._
- How the parser recognises the curly braces and asocciated them with PHP	
_It could be a "lexical" parser, which applies a formal grammar to do this, or
it could be a "simple" parser, which uses substring replacement or regular expressions to
find variables to substitute (the CI approach)_
- liked to exaples with the exact location/code that I should refer  
_If I understand your response, not gonna happen.
Instead, I am trying to setup the example repos so they match the presentation,
making it easy for you to find the exact code that matches a slide._
- Responsive layout  
_This is client-side stuff, and not in our scope.
We can make it easier to support with judicious use of "panels"._
- route	  
_Not clear how to interpret your response_
- Scoping of variables in PHP, just to cement it	  
_Basically the same as Java, except that properties and/or methods can be
"injected" into PHP objects, adding otherwise-out-of-scope variables.  
PHP "includes" have the same scope as the context they are used in.  
$this->load->view(...) uses variables that are in the scope of the CI Loader.  
$this->parser->parse(...) uses variables that are in the scope of the CI Parser.  
That is why we pass view parameters in an associative array ... the loader or parser
extract them into variables that are then in scope._
- template parser	
- The way you personally would go about things	  
**Myself, I use the template parser all the time, with internal and external methods
per "panel".  
You can see this in the CI website repo, or the learning hub repo**
- Using the CI Parser	
- view fregment	
- What is the boilerplate setup needed for the template engine to be loaded and used.	  
_"Boilerplate setup"? you can autoload the 'parser' library, or load it inside
your base controller's constructor, or wherever you want to use it._
- Why would webapp do variable substitution if you used {name} in the view instead of { name} (slide 13)	  
_My slide content is run through the template parser, and my base controller already defines
a "name" variable as a view parameter. The {name} substitution is inadvertent, but
I haven't figured out a way to escape the curly braces in this context.  
A better solution would be to have more specific names in my base controller,
to avoid the possibility of name conflicts._
- Would a view file ever be saved as ".html" or are they always saved as ".php"?  
_If a "view" is pure HTML, it could be stored as ".html", but it owuld go in the "public"
folder, and you would not use the CI view or parser with it.  
If a view is intended to be processed within CI, then it is saved as ".php"
inside the "application/views" folder somewhere.	_
	
###Are there other, related, questions that you would like addressed in class?	
	
- some picture links are broken?	3
- Can we link multiple generated view to create a multiple layouts?	  
_"link"? If panels are generated independently, then those could be pulled together
or used/not used in different layouts._
- For curly brace syntax, there are times where you need {foo}{/foo} in order to access $this->data['foo'], is there a workaround or a more efficient way	  
_That is simply the syntax for what CI's parser calls "variable pairs".  
Any view parameter whose value is itself an associative array is meant to be referenced like that.  
The workaround is in the assembly strategies: view fragments!_
- How come sometimes you need to array_merge $this->data	  
_That is just a shorter notation, to merge the associative fields from a database record, for instance, all at once,
rather than having individual assignment statements for each._
- images were not loading and the form survey didnt work	
- responsive layout design	  
_Off topic. This was addressed in COMP1536.  
See CSS framework user guides (eg Bootstrap) for further info_
- the relationship between model, view, layout	  
_"Models" are data sources used by controllers; views or layouts don't see them.  
"View" is simply what is sent to the browser.  
"Layout" refers to whatever techniques you might use to organize the elements that should make up a view._
- What is "cross-site scripting"	  
See above, or "https://en.wikipedia.org/wiki/Cross-site_scripting". 
- When will the other survey be available?	  
_Not in time to worry about._
- Which syntax is the best in CI?	  
**_yes._**
- why is blade better than code igniter's template parser?	  
_Good question. Why is a Cadillac better than a Kia?  
Everyone has their own preference._
	
###Do you have comments or suggestions about the flipped learning process?	
	
- Cannot see images	8
- I prefer the traditional lecture style	2
- Code on page 25 is offscreen to the bottom in slides view	  
_The "code" was simply to illustrate that you would somehow have methods
that were obviously connected to whatever "panels" you plan to use
in your different layouts._

- especially, while doing assignment, someparts are hard to figured out. Assignments' ongoing is faster than lectures. Hope to make it even.	  
_Not sure what you are getting at here._
- Flipped learning overall makes classtime feel like a waste. I'd much rather recieve in depth instruction than do something I could just as easily do on my own time.	
_Hmmm - the intent is that flipped learning provides more opportunity to have
unclear things explained, with the basics addressed on your own time.  
How can this be made to work better?_
- Have the content up earlier, and in working condition. The images aren't loading. The deadline for the surveys is in 5 hours and the second survey is not readily available on the website.	
_Agreed, but not so easily done ... there is a lot of work to enhance and/or
restructure material (even if existing in a similar format), with supporting examples.  
I am trying hard to make the lessons timely, but still have room for improvement.  
Images not loading ... addressed above.  
Second survey ... addressed in the News at the top of the course hub._
- Having the course material on the website is nice, but I still think having PDF/PPT files to reference and read is still much better, since you can maintain a consistent format for both students and the instructor.    I have personally downloaded previous terms material to keep a local copy on my devices.	  
_The "display" icon/link, on the right of organizer entries, provides an easier-to-read format.  
I plan to add the ability to generate PDFs, but have not had a chance to work on that.  
I do not have plans to provide PDF downloads for all the material - the course hub repo (current) can always be forked/cloned._
- I wish there was more code examples regarding the view construction approach. Since, you said all your example was "legal" so I can assume that  there are other alternatives that you might prefer? Wish we could have went over those.	
- Is the extra angled bracket a typo in "<?php $parms = ['name' =>> "Jim", 'target' => "Spuzzum"];"?	
- Maybe more indepth explaination of the php code examples shown in the slides.	
- more demo	

##Change of plans - based on the feedback, I will address view construction/assembly in class, and defer form handling to next week!