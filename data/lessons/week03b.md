#Week 3 Survey Results

The survey for the "Controller" lesson has been split off from the "CodeIgniter
Overview" one, to reflect what we actually addressed in class.

I have interpreted and aggregated results, in hopefully an appropriate fashion.

##WEEK 3 (Planned) – CODEIGNITER CONTROLLERS
			
###What are topics from the lesson that *you* feel need more or better explanation?			

- Template Parser	6 _Week 6_
- Segment Based Naming	5 _Week 4_
- Getting input	3  _Hmmm.
- Getting Input Other Ways	3  
_Positional parameters and form fields are "normal".  
Query parameters are possible.  
Thinking even further ahead, REST prescribes multiple ways to represent data passed
to or returned from a RESTful controller._
- Driver Stuff	2  _Week 5_
- Helpers	2  _Weeks 8 & 9_
- Producing Output	2 _Week 6_
- View Parameters	2 _Week 6_
- Configuration Stuff	_Coming in bits & pieces as needed._
- Examples of template parser (not sure what the field substitution is regarding)	_Week 6 (and lab this week)_
- Files uploading class	_Week 8 or 9_
- Finding stuff	_See the class loader, above._
- get & post method in CI	_Through the `Input` class_
- Getting input from a form	_Same, using POST fields_
- How do we reliably resolve URLs?	 
_Priority is folder then file; first match in a rule set "wins"._
- How to validate input in the form	_Week 6: the form validation library_
- Key Controller abstactions	 
_Constructor, default method (`index`), private vs public??_
- loader	_See earlier answer_
- More indepth explanations of the process flow	  
_Week 4, when we talk about "hooks"!_
- More visual aid for the controller process	 
_I am open to suggestions - not sure what would help here._
- On slide 5, I don't quite understand the last paragraph (if "orders" was a subfolder...)	 
_I will try to explain better in class_
- Page 18 has results off screen	 
_I have tried adjusting the slide_
- Parser	_Week 6_
- Passing parameters with assoicative arrays	_Week 6 and lab this week_
- Please explain more in detail about the examples used in Segment based naming	 _Week 4?_
- private functions	  
_Same scoping rules as Java. If a controller has a private method, it cannot be routed to, for instance._
- Some explanation on segment based naming regarding passing parameters there, a bit unclear as how it's passed	 
_WIll try to elaborate in class_
- Stuff	 _Joking term used to refer to any component built into CI or written by a developer for use in a CI app._
- The controller abstractions could be more in-depth.	 
_This is an overview. Each of those is dealt with in upcoming lessons._
- The key abstractions for CI Controllers	
__See just above. Every framework has similar abstractions; these are just the class names chosen in CI._
- Type of Controllers	_I will elaborate in class_
- What are uncommon types of controllers Slide 4	  
_You could argue that a hook is controller-related, though not a controller itself.  
You can also have security controllers (to obfuscate the location or name
of a resource more carefully), infrastructure controllers (eg login or proxy)._
- What is in the stuff categorie besides models and libraries? Slide 3	 
_Hmmm - I don't see "stuff" mentioned on slide 3. 
Literally speaking, "stuff" refers to the classes and procedural functions
built-in to CI, or that you write. These can be grouped together
(eg database) or provided as a "package" or a third-party plugin - those
are dealt with in week 9._
- What's a Product Controller supposed to do?	 
_It **could** be something somehow related to inventory products,
for instance following RESTful conventions.  
My point on the "basics" slide was to contrast some of the different
ways of referencing a controller in a URL, not on trying to
infer anything from its name._
- Why is ci controller useful	_See dependency injection above!_
- why is enabling query strings strongly discouraged?	 
_Let me count the ways...  _
    - they get indexed by search engines, which messes with analytics
    - you have more work to do to secure/validate values from these
    - you have more work to do to extract the parameters and enforce defaults
    - heaven bid you should expose passwords as a query parameter
    - data values get logged and potentially exposed/analyzed
    - did I mention that it messes with SEO?

			
###Are there other, related, questions that you would like addressed in class?			

- Why is input being passed in the URL as query parameters discouraged? (Getting Input Other Ways)	3  
_See just above_
- Advanced helpers would be nice to learn more about	 
_Helpers aren't meant to be "advanced" - they are procedural functions that 
would be overkill to wrap as static methods inside a class._
- alot more examples helps in understanding concepts	 
_More examples come as we get deeper into MVC components.  _
- are there more proper/formal terms for "stuff"	_See above :)  
Many would call these simply components._
- Are websites built with CI optimized for mobile and other devices?	 
_The normal practice is to use a responsive CSS/JS framework for that,
or to use a tool that acts as a proxy, dishing the version of
the site deemed most fitting (for a small fee, of course)._
- Great picture regarding how controllers work in the web server  _:)_	
- In regards to controllers getting passed data as positional parameters in the URL. Can controllers get passed data by any other means?	 _See above_
- it'd be helpful if you could do a quick demo of configuration stuff  
_We will do relevant configuration bits with each topic._
- Little bit more clarification on Service Controllers	  
_I will try to answer this in class. More might have to wait until weeks 10-12._
- More examples for the 3 types of controller	_In class_
- Other frameworks	_Already there as a supplement for this week in the organizer.
Upcoming weeks will show how some of the different frameworks handle the
topic of the week._
- What happens if you try to get input from a form, but you have two fields with the same name but different IDs?	 
_PHP ignores form field IDs, focussing on names. You can craft a form so that a field is
returned as part of an array (`name="part[]"`). If you want to get all occurrences
of fields with the same name, you will need to get the entire set of
form fields and iterate through them._
- What industry uses CI controller	 _Any!_
- Why is it strongly discouraged to enable query strings, if the input passed in the URL contains parameters such as controller?a=...&b=.. ?	_See above_
- Would it be better to have subfolders in the controllers folder to hold the 3 different types?	  
_Sure. Or not - you could group them by functional area. eg all inventory controllers go inside `warehouse`, regardless
of their type; or you could group them by programming responsibility, eg `jims`.
Nothing is forced on you. I suggest thinking of it from the user's perspective ... how do you want them to 
request a controller.  
Having said this, if there are some controllers that are only intended for
programmatic access by your trading partners, then it is common to put them
into an `api` folder._

