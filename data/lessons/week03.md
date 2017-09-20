#Week 3 Survey Results

Responses for each of the two surveys follow, with the number of similar
responses denoted by a value after the question, if appropriate.

There were 30 responders.

##WEEK 3 – CODEIGNITER OVERVIEW
			
###Which CodeIgniter topics do you feel need more or better explanation?

- Controllers	4  
_A controller is a class that handles an incoming request.  
Banana::index() would handle `/banana`, and Banana::yellow() would handle `/banana/yellow`.  
More coming next week._
- Error Handling	4  
_Errors are handled in many ways ... request errors, form validation errors,
authentication errors, logic errors ... this is a broad topic/question.  
I will point out suitable error handling when we address each of the above._
- Property Injection	4  
*This is a simple form of [dependency injection](https://en.wikipedia.org/wiki/Dependency_injection).
For instance, CI creates (injects) properties in your controller for all the CI components
loaded during bootstrap, as well as any that you load. Similar properties are injected
into your models.*
- Views	4  
_A view is a PHP script intended to be or be incorporated in the HTTP response body.
More in week 6_
- Helpers	3  
_Helpers are global functions available to your classes.
You would normally group related ones into one source file._
- Query Builder	3  
_CI's O-O abstraction for building RDB queries. You can use SQL queries directly,
though not considered as elegant. More in week 5._
- Active Record design pattern	2 *[Design pattern](https://en.wikipedia.org/wiki/Active_record_pattern)
originally from Ruby-on-Rails*
- CI Webapp	2  _Literally, a webapp built using the CodeIgniter framework._
- Models	2  _Data source abstractions. More in week 5._
- Security	2  _Hmm - loaded question, which means many things at many levels.
Normal interpretations of this could be authentication (addressed in week 13),
or data sanitizing (addressed in weeks 6 & 7)._
- Support Components	2  _The bundled CI classes._
- View vs View Templating	2  _View templating is *one* strategy that can be used in views._
- ancillary classes	_Support components?_
- auto-loading resource	_Specifying components to automatically load as part of request handling_
- Automating testing	_Usually refers to unit testing as part of continuous integration_
- Base Model	_Intended superclass for most (all?) of your models_
- caching	_CI support component which provides time-to-live based persistence._
- Class Loader: when do we use it?	_CI uses it automatically, to locate and instantiate classes._
- common functions	_Pre-built helpers bundled with CI. See system/helpers_
- Controller & Model	_Controller provides request handling logic, retrieving or passing data to models._
- Controller Methods	_Public methods are usually entry points, while private methods are worker or support methods._
- Does the Controller only handle the scripts and javascript of the application?	  
_A controller doesn't "handle" scripts or javascript. It is implemented using PHP,
a scripting language with O-O extensions. It is not directly related to javascript ... that
is something served from your document root.  
Javascript, client-side, might make an AJAX request to the app - that request would
be handled by a controller._
- Entities	_Think ERDs._
- Entity vs Collections	_Think ERDs._
- Folder structure and how to separate files for models, views, controllers _In class demo_
- Good controllers design	_MVC. Seriously, name methods appropriately,
and avoid direct database access or HTML output._
- handling ajax requests in controllers	_Week 4_
- handling passing parameters using 'get' and 'post'	  
_CI extracts those automatically. "get" parameters are passed as URL segments
and made available to controller methods as possitional parameters.
Post parameters are exposed through CI's Input class.
Both *can* be accessed through other CI helper components.
Query parameters are discouraged.
More coming next week._
- Heavy model	
_A "heavy model" refers to the practice, within MVC, of concentrating business logic
in your model classes, instead of in your controller classes (which would be a
"heavy controller" practice). The intent is to reduce duplication of code,
and provide guidance for a good spot to put it._
- How the view interacts with the controllers	_There is no "interaction" in the conventional
sense. A view can contain hyperlinks, which would be handled by controllers.  
Any "interactivity" would come from client-side Javascript issuing AJAX requests._
- How to avoid hard-coded URLs in source code	_Use relative URLs and let Apache and/or the
browser resolve them. There are some URL helper functions if you need
to create a fully-qualified URL._
- how to set up and use the model?	_This week's lab should help.
More detail coming in week 5._
- If sessions were implemented, where in MVC would we implement it?	
_Sessions, if enabled, would be considered part of the infrastructure.
They would normally be accessed in controllers. _
- if you show us the way setting CodeIgniter with MVC model like tutorial would be one of the praticle ways to get students understand clearly	  
_This week's lab_
- In the example code, "Welcome.php" is a controller, but it extends 'Application', and the controllers in core folder extends 'CI_Controller'. What is the difference?	
_In class demo this week_
- Integrating plugins or helpers	  _Week 9,_
- Is it possible to call a function from the View?	_It is possible, but frowned on._
- Is there a convention to avoid Controller method confusion? What happens if there is a collision?	_Understanding the routing order. Next week's class._
- Libraries	_Support classes that aren't controllers or models. This could be any kind of useful abstraction._
- Libraries: What sorts of libraries can we import? Where is the this->load->ibrary('whatever') method implemented, the controller?	  
_You can use libraries bundled with CI (`system/libraries`) or ones that you write yourself (`application/libraries`). You can even integrate
third party libraries (usually assdembled in "packages"). More in week 9.  
Libraries are usually loaded in your controller, yes._
- More info about Controller. Can a view use multiple Controllers?	  
_A view does not "use" any controller. It might have links back to the server-side
app, and CI might handle any of those links using a controller or subcontroller,
depending on the routing rules you setup.  
Multiple controllers can reference (load?) the same view._
- MVC in relationship to CI	_In class demo_
- php	_This *isn't* a PHP course ... that just happens to be the programming language
we are using. It is similar enough to Java that I would not expect major problems.
What are you having trouble with?_
- profiler	*CI has [profiling](https://www.codeigniter.com/user_guide/general/profiling.html) 
and a [Benchmark class](https://www.codeigniter.com/user_guide/libraries/benchmark.html). 
I don't plan to address those in the course.*
- Project Files	_In class demo_
- Query builder methods - I don't understand what is being selected in the code example	
*The [query builder](https://www.codeigniter.com/user_guide/database/query_builder.html) 
methods generally correspond to SQL verbs/clauses.*
- Routing	_Week 4_
- Routing/Routing conventions	_Week 4_
- Session Library	_Coming in week 7_
- subcontrollers	_Next week, as well as answer above_
- The Model stores the data of the application, would the database connection be made within the Model?	  
_The database connection is made in configuration, and the model accesses it._
- Third party library using e.g. bootstrap	_Week 9. btw, Bootstrap is a client-side
framework, and you would integrate that into your view files._
- Using URI for routing requests. (example)	_Next week_
- View pages syntax	_Literally, HTML source files with a `.php` extension, so that
PHP elements, template parser substitutions, and possibly even template engine directives,
can be handled server-side._
- view parser and fragment	_In class demo, and week 6._
- View Templating	_In class demo, and week 6._
- Views and models	_In class demo, and weeks 5 & 6._
- What are the coding conventions?  
_Source files: UC first for classes, underscores for separators.
Yes, this is dated ... see CodeIgniter 4!  
Controller naming conventions? Yes. Universally agreed to? No.  
Suggestion: usecase-driven, or customer-centric, or SEO-friendly.
_
- When to make collections instead of just entities	_Week 5_
- Why are other JavaScript libraries not supported or well supported?	  
_That was a conscious decision back when, that Javascript would be
client-side and out-of-scope. CI recognizes AJAX requests, which
could come from Javascript, but it makes no attempt to 
incorporate any expectations or assumptions about what
is running on the client ... except not to trust the originator
of any request :-/  
Of the other frameworks, I have heard good things about Yii's
support of JS frameworks._
- why is there an index.html in almost every folder, should there not only be one html entry point?	 
_That is a legacy project organization decision side-effect. The original
expectation was that `index.php` would be in  the project root, and
the `index.html` files are there to prevent code access with a
mis-configured server. You might have also noted the snippet of
code at the top of files ... `defined('BASEPATH') OR exit('No direct script access allowed');`;
that is there for the same reason.  
We avoid that by setting the document root to `public`, and moving `index.php`
inside there._
- working with database	 _Week 5_
