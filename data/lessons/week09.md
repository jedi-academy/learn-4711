#Week 9 Survey Results	
	
Responses for the survey follow, with the number of similar
responses shown to the right of a response.
	
There were 27 responders.
	
I have interpreted and aggregated some of the results, in hopefully an appropriate fashion.
It was hard, because there were a lot of answers, covering a lot of different
interpretations - that suggests I could do a better job
of preparing the online lesson, so it is more focused.
	
##WEEK 9 – BUILDING ON CI
	
###What do *you* think the most important takeaways are from this lesson?	
	
- Using and extending built-in stuff	11 _**Yup**_
- Caboose good for managing addons	9  _**Hmmm - Caboose was meant as an example**_
- components, how they can be extended and syntax of adding new ones	4
- Extend system classes and don't modify them.	3  _**Yup**_
- Loading packages	3
- building and using helpers	2
- Dependency management	2
- Example of how to use CI helper - Formfields	2
- A library contains a class with methods that can be called if loaded.	
- built in libraries that are always already available to you	
- CI allows imports of 3rd party libraries and packages	
- CI_Security	
- CI4 will have namespace, which will resolve some naming confusions	
- Codlgniter	_?_
- Example of how to use CI library - Csboose	
- how prefixes work in CI	
- Image manipulation library	_**?**_
- Learning more about the file structure of CI	
- libraries, helpers and packages, their differences and applications	
- Loading modules	
- Put your own extensions inside application/core.	_**Only core component extensions**_
- replace core components with CI_ prefix and your own versions with MY_ prefix	_**Configurable**_
- Understanding components	
- Using helpers can simplify your web page even further	
- Using librarys is a lot like how it's done in java	
- Using other frameworks inside codeigniter (e.g. caboose)	_**Caboose is not a framework**_
- When loading components, CI looks for components with specific naming	
- You are able to extend components in CI and override or add functionality.	_**Yes**_
- You can create helper functions without needing to create an entire class and referencing the static methods of that class.	
- You can use library and frameworks in your webapp and can use management libraries like Caboose to deal with these libraries and widgets.	_**CSS or JS**_
	
	
	
###What are topics from the lesson that *you* feel need more or better explanation?	
	
- Caboose and widgets	4  
_I will refer to this in lecture. It is an **example**, not something you are expected to use 
in your projects. It is meant to simplify the management of external CSS and Javascript libraries._
- formfields need more code example	2  
_I refered to this in the "Creating Forms" lecture, the week before midterms. 
It is an **example**, not something you are expected to use 
in your projects._
- alot of info, maybe just a summary of the key points for each of the libraries, helpers and packages	  
_Hmmm - that was my intent. Caboose & formfields helper are examples, which could
be used on their own or bundled as either a CI package or a Composer package._
- Are there some common resources online for finding packages, libraries, widgets, etc?	  
_The CI forums, the CI wiki (big reader beware caution), Google._
- Caboose. it's a package then?	  
_Sure. Or a library. It could be bundled either way._
- core/non-core components  
*ok ... "core" is a [specific set of classes](http://www.codeigniter.com/user_guide/general/core_classes.html), while
non-core is pretty much everything else in the framework.
Core components do not have to be explicitly loaded.*	
- Extending Built-In Helpers	  
_ok..._
- extending core ci	  
_ok..._
- extending non core ci	  
_ok..._
- How composer helps us	  
_It is the most common way to manage dependencies, regardless of the
framework you are using. Some frameworks are actually installed
using Composer. It can automatically
pull in Composer packages, and the ones that those in turn rely on, etc.
When you do a "composer update", it can pull in the newest versions of
all of those. _
- how to write a helper	  
_ok..._
- Image manipulation	  
_Yes?_
- installing packages	  
*Copy them somewhere accessible ("application/third_party" is suggested),
and add their paths to the $autoload['packages'] = array (); configuration setting.*
- Is controllers the glaring exception to packages?	  
_Yup. There is a popular third-party "addin", "WireDesignz HMVC",
which modifies the CI core so that "packages" can contain controllers too._
- Libraries	  
_ok..._
- Make and load packages	  
_ok..._
- What are helpers?	  
_ok... collections of related functions_
- What are the benefits of using a package?	  
_You can avoid clutter inside your "application" folder, if a "package"
would need to be spread across multiple folders (like Caboose)._
- what is the most common Composer package?	  
_http://lmgtfy.com/?q=most+popular+composer+package_
- what is the most common uses for Caboose?	  
_See above_
- why do we hold a class just use one library?	  
_It is a common convention, not a requirement._
- Will we have to define a lot of custom helper functions in this course?	  
_That is up to you. I would expect more classes than helpers._

	
###Are there other, related, questions that you would like addressed in class?	
	
- After we load the packages, do we need to load the same libraries and helpers again?  
_You don't load packages, you add them to CI's Loader path to search in.
Libraries and helpers would be loaded the same either way. There is no "again"._
- Caboose  
_This is an example library, which I will reference in lecture._
- layout  
_Yes?_
- security  
_Yes?_
- slide 21. So if two helpers have the same function name and file name, the one inside the application folder is the one used?  
_Properly constructed, yes._
- typo on caboose on header of slide _(fixed)_
- What are some other popular libraries , maybe one that can handle login system?  
_Authentication addins: IonAuth, Community Auth_
- What we should notice when loading libraries and helpers?  
_Not clear. Those are the names CI uses to refer to non-MVC classes or functions.
I am not sure there is anything to "notice"._
- what's different between CI and .net mvc?  
_I am not qualified to answer that. I can address Java and JEE._
- What's the difference between libraries and helpers?  
_See above_
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

	
###Do you have comments or suggestions about the flipped learning process?	
	
- a bit dense, hard to follow on this one
- More code examples and visuals would be helpful
- No specific suggestions, the lecture is well detailed and has several examples as well. Really enjoyed the topic, best portion of the lecture.
