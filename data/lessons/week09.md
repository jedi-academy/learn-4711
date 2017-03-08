#Week 9 Survey Results	
	
Responses for the survey follow, with the number of similar
responses shown to the right of a response.
	
There were 52 responders.
	
I have interpreted and aggregated some of the results.
	
##WEEK 9 – BUILDING ON CI
	
###What are topics from the lesson that *you* feel need more or better explanation?	

- Caboose	9 _lecture_
- Dependency management	6 _lecture_
- Writing Libraries	5 _lecture_
- how to use composer	4 _tutorial after the break_
- Working with helpers	4 _lecture_
- Extending Built-In Helpers	3 _lecture_
- Extending Non-Core CI Components	3 _lecture_
- Core vs non Core components?	2 _lecture_
- Caboose Assumptions	
- Caboose Perspective	
- captcha_helper	_tutorial after break_
- Do the frameworks used with the formFields helper need any special handling to be compatible?	 _lecture_
- Does CI support any third party libraries?	  
_If you mean some that come bundled with CI? not in CI3, but some in CI4 (Zend\Escaper)_
- email_helper	_Deprecated; will be removed in 3.2.0 _
- example for Core CI Components	 _lecture_
- Extending Core CI components	 _lecture_
- Formfield usages	_lab_
- Formfields	_lab_
- how do we load the components?	_earlier material?_
- How does code igniter pick which one to load first?	_packages, then application/, then system/_
- how to work on package	 _lecture?_
- If you replace a CI component and do not call it "CI" something, is it an error? or does it just not find the file?	 
_It will be ignored._
- Is a Package a full blown app that can be executed on its own? Or is it like a library?	 
_Neither - it is a bundle of libraries, models, views, etc_
- Is there an alternative to using composer inside your app?	 
_Manual install. There was a CI package manager called Sparks, but that is long dead.  
There are other dependency managers, like NPM or YUM, but I don't think they would help with a PHP app._
- Is there preference between autoloading or explicitly loading a library?	  
_If used everywhere, then autoload; if used in only a few places, then explicit;
for maximum convenience, autoload._
- like where is the library located	_libraries folder?_
- loading external folder in CI	  
_Question unclear ... folders are not "loaded"_
- More Complex Inheritence between Controller and Model	  
_There is no shared inheritance between controllers and models.  
The CI loader does, however, inject a controller's properties into a model.
This is definitely not inheritance!_
- More specific example walk throughs of form handling	_lab_
- More typical usage of helpers. What problems can it slove?	 
_Helpers are collections of global functions.
What can you do with a function in any programming language?_
- security	 
_Would love to dive deeper, but will run out of time first.  
Simple authentication tutorial later._
- Setting up composer could be a bit more clear (slide 30)	_upcoming tutorial_
- what are the default package from CI	_CI has no default packages_
- When Extending Core CI Components, what happens if none of the methods are overriden ( or overidden improperly-- ie mispelling)?	 
_Standard O-O: you inherit the super class' methods and add your own._
- Writing Customized Helpers vs Extending Built-in Helpers	_Build or buy. Levture_
	
- Are there some common resources online for finding packages, libraries, widgets, etc?	  
_The CI forums, the CI wiki (big reader beware caution), Google, packageist.org, github.com  
https://codecanyon.net/tags/codeigniter  
https://forum.codeigniter.com/forum-13.html
_

- How composer helps us	  
_It is the most common way to manage dependencies, regardless of the
framework you are using. Some frameworks are actually installed
using Composer. It can automatically
pull in Composer packages, and the ones that those in turn rely on, etc.
When you do a "composer update", it can pull in the newest versions of
all of those. _

- installing packages	  
*Copy them somewhere accessible ("application/third_party" is suggested),
and add their paths to the $autoload['packages'] = array (); configuration setting.*

- Is controllers the glaring exception to packages?	  
_Yup. There is a popular third-party "addin", "WireDesignz HMVC",
which modifies the CI core so that "packages" can contain controllers too._

- What are the benefits of using a package?	  
_You can avoid clutter inside your "application" folder, if a "package"
would need to be spread across multiple folders (like Caboose)._

- what is the most common Composer package?	  
_http://lmgtfy.com/?q=most+popular+composer+package_


	
###Are there other, related, questions that you would like addressed in class?	

- What are some useful/popular external libraries?	2   
_The most commonly discussed/requested ones are for authentication (ion-auth,
community-auth), "HMVC" (wiredesignz), CRUD generation (groceryCRUD),
debugging aids (kenjis), social service integration (FB, Google), admin._
- alternatives to bootstrap	  
_Foundation, Kube, YAML, blueprint, 960 grid_
- Could you go over our next portion of the assignment in a little more detail? I'm not quite sure I get what our objective is.	  
_Writeup coming_
- How does parser works	   
_foreach loop over substitution variables, performing string substitutions_
- I hope there can be some feedback/comments regarding the assignment 1. Like is there any suggestions of how did we design the database. What are the area that we can improve to make our design/implementation better.	  
_COming_
- I want to see more examples of what kind of things can we build? The small practical problems, e.g. pagination, drag-and-drop some division into grid views and so on.	  
_Would love to, but not enough hours in a day!  
I am working with a fellow in Columbia, who hopes to bring clarity to some of this for CI_
- It would be nice if you could give more intro about Frameworks & widgets: Bootstrap and JQuery	_Out of scope_
- Object Oriented Approach in CI	_lecture_
- Possible to extened external helpers? Any merit to doing this?	  
_Depends totally on the library. Out-of-scope of CI_
- Some examples of JQuery	_Out of scope_
- unrelated question: by any chance you would cover how to deploy codeIgniter on our own website?	  
_Good topic for an upcoming tutorial_
- we've used composer once or twice before but not exactly sure what it is and how it's working	  
_tutorial after break_
- Why exactly do we not want helpers loaded outside the CI context?	  
_Helpers are like legacy stuff? Question unclear_
- will email_helper allow us to send email from a web app like the form?	_Deprecated; use email library_
- Will we be using Caboose in the lab?	_yes_
	
###Trolling questions (looking for bonus marks? or penalty for timewasting?)

- What is O-O again?  _Isn't that a king-side castle?_
- how does the Codeigniter works  _Like a boss?_


### Questions from previous terms

- After we load the packages, do we need to load the same libraries and helpers again?  
_You don't load packages, you add them to CI's Loader path to search in.
Libraries and helpers would be loaded the same either way. There is no "again"._

- What are some other popular libraries , maybe one that can handle login system?  
_Authentication addins: IonAuth, Community Auth_

- Why the deterrence from altering code in the system folder?  
_If you modify code in the system folder, then you cannot update the framework
(eg incorporating security fixes) without manually re-applying any
changes you made. That is why the provision for extending system components
instead._

- why would we want to autoload composer?  
_No such thing.  
Composer refers to "autoloading" as the ability to automatically read a
"vendor/autoload.php" script to find classes in a Composer-installed "package".  
CI refers to "autoloading" as the ability to instantiate named libraries or 
helpers as part of every request handling cycle.  
Composer is enabled in CI by setting a configuration setting._
