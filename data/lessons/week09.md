#Week 9 Survey Results	
	
Responses for the survey follow, with the number of similar
responses shown to the right of a response.
	
There were 52 responders.
	
I have interpreted and aggregated some of the results.
	
##WEEK 9 – BUILDING ON CI
	
###What are topics from the lesson that *you* feel need more or better explanation?	

- Caboose	9
- Dependency management	6
- Writing Libraries	5
- how to use composer	4
- Working with helpers	4
- Extending Built-In Helpers	3
- Extending Non-Core CI Components	3
- Core vs non Core components?	2
- Caboose Assumptions	
- Caboose Perspective	
- captcha_helper	
- Do the frameworks used with the formFields helper need any special handling to be compatible?	
- Does CI support any third party libraries?	
- email_helper	
- example for Core CI Components	
- Extending Core CI components	
- Formfield usages	
- Formfields	
- how do we load the components?	
- How does code igniter pick which one to load first?	
- how to work on package	
- If you replace a CI component and do not call it "CI" something, is it an error? or does it just not find the file?	
- Is a Package a full blown app that can be executed on its own? Or is it like a library?	
- Is there an alternative to using composer inside your app?	
- Is there preference between autoloading or explicitly loading a library?	
- like where is the library located	
- loading external folder in CI	
- More Complex Inheritence between Controller and Model	
- More specific example walk throughs of form handling	
- More typical usage of helpers. What problems can it slove?	
- Non CI components can be extended similarly to core components, execept using application/lib folder	
- security	
- Setting up composer could be a bit more clear (slide 30)	
- what are the default package from CI	
- When Extending Core CI Components, what happens if none of the methods are overriden ( or overidden improperly-- ie mispelling)?	
- Writing Customized Helpers vs Extending Built-in Helpers	
	
- formfields need more code example	2  
_I refered to this in the "Creating Forms" lecture, the week before midterms. 
It is an **example**, not something you are expected to use 
in your projects._

- Are there some common resources online for finding packages, libraries, widgets, etc?	  
_The CI forums, the CI wiki (big reader beware caution), Google._

- core/non-core components  
*ok ... "core" is a [specific set of classes](http://www.codeigniter.com/user_guide/general/core_classes.html), while
non-core is pretty much everything else in the framework.
Core components do not have to be explicitly loaded.*	

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
- alternatives to bootstrap	
- Could you go over our next portion of the assignment in a little more detail? I'm not quite sure I get what our objective is.	
- How does parser works	
- I hope there can be some feedback/comments regarding the assignment 1. Like is there any suggestions of how did we design the database. What are the area that we can improve to make our design/implementation better.	
- I want to see more examples of what kind of things can we build? The small practical problems, e.g. pagination, drag-and-drop some division into grid views and so on.	
- It would be nice if you could give more intro about Frameworks & widgets: Bootstrap and JQuery	
- Object Oriented Approach in CI	
- Possible to extened external helpers? Any merit to doing this?	
- Some examples of JQuery	
- unrelated question: by any chance you would cover how to deploy codeIgniter on our own website?	
- we've used composer once or twice before but not exactly sure what it is and how it's working	
- Why exactly do we not want helpers loaded outside the CI context?	
- will email_helper allow us to send email from a web app like the form?	
- Will we be using Caboose in the lab?	
	
###Trolling questions (looking for bonus marks? or penalty for timewasting?)

- What is O-O again?
- how does the Codeigniter works


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



Addins:
https://codecanyon.net/tags/codeigniter
https://forum.codeigniter.com/forum-13.html
