#Week 9 Survey Results	-  WEEK 9 – BUILDING ON CI
	
Responses for the survey follow, with the number of similar
responses shown to the right of a response.
	
There were 39 responders.
	
I have interpreted and aggregated some of the results.
	
###What topics need more or better explanation?	

- caboose library	2
- Caboose Usage	2
- Scaffolding	2  _Not part of CI. Check out https://www.grocerycrud.com/_
- APIs	_?_
- Caboose Alternatives	_https://github.com/codeigniter-id/awesome-codeigniter_
- Can I create my own helper?	_Yes_
- Comparative Speed Tests	  
_https://github.com/kenjis/php-framework-benchmark or
https://medium.com/@asked_io/php-mvc-framework-showdown-7-1-performance-2da52ac9fcba or
https://www.techempower.com/benchmarks/#section=data-r14&hw=ph&test=fortune&l=8vmzgf _
- Creating/Extending library best practices	_Never modify `system/...` _
- Debugging tips	_(1) old school echo, or (2) xdebug with debug bar_
- Dependency Management	_Composer or git submodule_
- Does Caboose work with Bootstrap, or do they fulfill the same purpose?	  
_Caboose *uses* bootstrap. It pulls in referenced CSS/JS frameworks/components/widgets
at the right HTML place, and only on those pages where needed._
- Examples of working with external packages.	
- Finding Components	_awesome^^_
- Formfields Usage	
- Helpers and writing helpers	_Nothing special ... functions, grouped or
not, in `application/helpers` _
- How do I build on CodeIgniter?	 _yes_
- how to add javascript modules	 _N/A_
- How to do REST Api	_later in course_
- I don't understand the topic for this time... need the lecture to understand	
- Loading Components	
- OAuth	_later in course, maybe_
- package	
- package folder structure	
- packages vs libraries?	_Packages can include libraries_
- Scaffolding Controllers from Models	_N/A_
- session variables	_?_
- Sessions	_?_
- sick libraries to checkout	_Slick? see awesome^^; sick? ... _
- unclear about model	_?_
- Useful HTTP client libraries	_Guzzle comes to mind_
- Useful libraries	_awesome^^_
- What is a widget?	_A webpage component, with CSS & JS to accompany, eg date picker_
- What is the significant pros/cons with procedural helper functions vs. class static function since both seem to work in CI ?	  
_Personal preference ... my_cool_stuff() looks legacy, and might conflict with
other functions, but MyGoodies::myCoolStuff() is a bit cumbersome. Not the two
naming styles :-/_
- What libraries would you recommend?	_depends on purpose_
- What other standards besides Composer are there?	_For PHP, nada.
CI used to have "sparks", but that is long dead.
Laravel has "sparks" (no connection), which looks like
boilerplates or scaffolding._
- When do you need to use a package?	
- When writing a helper, why do we have to check if functions are already defined? Do functions names conflict with names in other helpers?	
_Don't want error trying to redfine existing function_
- Why are helper functions not declared inside a class?	_They are functions, not methods_
- Widgets vs Frameworks	_Frameworks >= widgets_
- Writing and extending helpers	

### Earlier questions that seem relevant too

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

- What are the benefits of using a package?	  
_You can avoid clutter inside your "application" folder, if a "package"
would need to be spread across multiple folders (like Caboose)._

- what is the most common Composer package?	  
_http://lmgtfy.com/?q=most+popular+composer+package_

- What are some useful/popular external libraries?	2   
_The most commonly discussed/requested ones are for authentication (ion-auth,
community-auth), "HMVC" (wiredesignz), CRUD generation (groceryCRUD),
debugging aids (kenjis), social service integration (FB, Google), admin._

- alternatives to bootstrap	  
_Foundation, Kube, YAML, blueprint, 960 grid_


- I want to see more examples of what kind of things can we build? The small practical problems, e.g. pagination, drag-and-drop some division into grid views and so on.	  
_Would love to, but not enough hours in a day!  
I am working with a fellow in Columbia, who hopes to bring clarity to some of this for CI_

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
