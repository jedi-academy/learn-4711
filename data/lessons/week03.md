#Week 3 Survey Results

Responses for each of the two surveys follow, with the number of similar
responses denoted by a value after the question, if appropriate.

There were xx responders.

I have interpreted and aggregated results, in hopefully an appropriate fashion.

##WEEK 3 – CODEIGNITER OVERVIEW
			
###What are topics from the lesson that *you* feel need more or better explanation?			

- Can you go over the query builder?	5 _Week 5 - models_
- entities vs collections	4  
_Think database modeling - an entity is a single object or row in a DB table, while
a collection is a group of related entities, for instance a table itself._
- How to set up SQL for demo app	4  
_`application/config/database`, lines 79-81, are where you specify the username, password
and name of the database to use.  
Using phpMyadmin (for instance), create a database with that name (`comp4711`),
select it, and then use the phpmyadmin "import" command, choosing
"data/contacts.sql" as the data source._
- View Fragments	4  
_I will elaborate in lecture; coming in week 6_
- Models	3  _Data encapsulation ... week 5_
- View Templates	3  
_I will elaborate in lecture; coming in week 6_
- Views and view templating	3  
_I will elaborate in lecture; coming in week 6_
- .htaccess configuration	2  
_If you **really** want to configure an htaccess file for a specific situation,
I suggest one of the [online guides](http://www.htaccess-guide.com/). I can help, but do not proclaim to be an expert!_
- I'm not really sure how the UFfirst convection actually works	2  
_UCfirst means that the first letter of a name is capitalized, and the rest
are lower case. Contrast this with CamelCase or snakeCase.  
In the case of CI, classes are expected to be named folliwing UCfirst, and
stored in files with matching UCfirst names._
- Property injection	2  
_This is a simple form of [dependency injection](https://en.wikipedia.org/wiki/Dependency_injection).
For instance, CI creates (injects) properties in your controller for all the CI components
loaded during bootstrap, as well as any that you load. Similar properties are injected
into your models._
- Views	2 _Week 6_
- App controllers  _Next presentation?_	
- Class Loader	  
*The [CodeIgniter component](https://www.codeigniter.com/user_guide/libraries/loader.html) that finds and instantiates "stuff".*
- Collections	 
_CI does not have a "collection framework", like Java, but PHP's associative array
behaves very much like a java.util.Map_
- Config file configuration	 
_Files inside `application/config`, each of which holds key/value pairs used to
configure the operation of one of CI's components._
- Controllers and how they are used	_Next lesson today_
- Creating branches and switching between them	 
_Off topic for this lesson. Are the Git cheat sheet & command list (in the resources section) helpful?_
- Entities vs Controllers	 
_Hmm. On the surface, entities and controllers have nothing to do with each other.  
However, REST principles suggest that a RESTful service can/should be implemented
by a different controller for each resource (such as entities). Week 12_
- Git Bash needs to be explained better.	 
_Off topic for this lesson. Are the Git cheat sheet & command list (in the resources section) helpful?_
- Going over CRUD again would be very useful	 
_CRUD == acronym for standard database operations - create, read, update and delete.  
What is missing form this?_
- How is the URI segment and controllers folder give CI the ability to route requests by convention?	 
_The **convention** is that the first segment names a controller, the second a method, and so on.
This is built into CI without having to configure anything additional.
More on this in week 4 :)_
- How to connect database with model (config)	 _Week 5. I am going to stick with 
mock databases until then._
- How to construct the different parts of MVC needs better explanation. Although I assume it will be come clear after the next lab/lecture.	 
_Weeks 3, 5 and 6 **are** the MVC parts, while routing (next week) addresses how
we can influence which controller CI might choose to handle some requests._
- I feel we should have been told that the Netbeans extension we were encouraged to use would not work for this lab.	 
_I wasn't aware that there was an issue. Ask me in lab._
- In regards to config files for components. Is it possible to map a config file to a set of user specified components?	 
_You can have config files for any purpose you like.  
Further, you can have environment-specific config files, which is the intended
way to handle different credentials between development and production._
- More on controllers (but it's mentioned that more on controller will come later)	_Next lesson_
- More visual diagrams to illustrate the ideas	 
_I included a number of screenshots and code examples.
What would benefit from more or different visuals?_
- On slide 8, can you explain more about the and heavy model business logic?	  
_A "heavy model" refers to the practice, within MVC, of concentrating business logiv
in your model classes, instead of in your controller classes (which would be a
"heavy controller" practice). The intent is to reduce duplication of code,
and provide guidance for a good spot to put it._
- Personally, I feel like we need a lot more practice/explanation on the database config/setup part. In tern 1, we did a lot of the sql query statements but very little (or not even) thought on setting up a db to the app/project.	 
_Week 5 :)_
- Some example of routing requests to see how other frameworks handle routing vs CI	 _Week 5_
- Support compoments	_Yes... ask me in class if I don't make it clearer._
- The Query Builder's syntax isn't a bit funny	  
*Are you referring to [method chaining](https://en.wikipedia.org/wiki/Method_chaining)? That is a common practice that CodeIgniter uses too.  
If not, your question or point isn't clear.*
- the template parser of ci	_This is just a taste. Coming in lab and week 6_
- This doesn't really need explanation, but you made a typo on slide 27 "needs to be modified to CORRECT reference your system folder."	 _Fixed, thanks._
- what is codeIgniter?	  _I am interpreting this as a trolling question._
- What is entity-level modelling?	_Data modeling ... refer to previous database courses, 3721, etc.
It is outside of a framework; frameworks provide pre-build components to make it 
easier for you to implement your modeling._
- What to do after a wrong commit		 
_Off topic for this lesson. Are the Git cheat sheet & command list (in the resources section) helpful?_
- You say noramally each use case has it's own controller. What are some situations where they wouldn't? (slide 13)  
_If a usecase (shopping) has related subusecases (find new product, view shopping cart, checkout, etc),
you could implement these as separate controllers, **or** you could implement this
as one `Shopping` controller, with different methods to implement each subusecase.  
This will be part of an upcoming lab :)_
			
###Are there other, related, questions that you would like addressed in class?			

- Are there conventions for naming models/view/controllers?  
_Yes. Universally agreed to? No.  
Suggestion: usecase-driven, or customer-centric, or SEO-friendly.
_
- Can you nest base controllers?  
_If you mean Work extends a Shopping Controller, which in turn extends a base
controller, then yes. It is a bit kludgey with CI3, but doable.
This will be coming up when we use the CI-starter-3._
- Can you open CodeIgniter in lecture while doing the lecture?  
_I presume you mean an IDE with  CI app open? Yes!_
- Ci controller _Next lesson_
- convention Vs explicit routing rules? Few examples _Week 4_
- Database connections  _Week 5_
- How exactly do support components make things easier and more convenient?  
_Less that you have to build yourself ... standard RAD practice!_
- How to build a view fragment _Week 6_
- How to build a view template _Week 6_
- Is any database compatible with CodeIgniter or just SQL ones?  
_CI's database abstraction is built around relational databases.
There may be third party implementations, but stock CI does not support
object databases, hierarchical databses, document databases,
distributed databases or search engine databases._
- Is it better to have more models?  
_That depends! Table data gateway design pattern suggests one model
per RDB table; data mapper design pattern suggests one model per
O-O class subtree; maybe the answer is then yes - some table models,
some entity models, some data mapper models._
- It'd really helpful for us if you could do a demo on setting up to a database.  _Week 5_
- More php  _What do you need to know? This isn't a course on PHP; it uses it
because it is so close to Java._
- Most popular framework's routing practices?  _Week 4_
- What are the benefits of models?  _Seriously? Models are **how** we as programmers
encapsulate data._
- what does injection of code or properties mean?   
_See above, about projecty injection. Be aware that code injection usually
has negative connotations._
- What is heavy model?  _See above_
- what would an example of a pure html view fragment be  
_A .php file inside your `application/views` that contained only
HTML ... no PHP, substitution parameters, and no layout engine
directives._
- Why are Javascript libraries not well-supported in CI?  
_That was a conscious decision back when, that Javascript would be
client-side and out-of-scope. CI recognizes AJAX requests, which
could come from Javascript, but it makes no attempt to 
incorporate any expectations ro assumptions about what
is running on the client ... except not to trust the originator
of any request :-/  
Of the other frameworks, I have heard good things about Yii's
support of JS frameworks._
- why is a "heavy model" philosophy common practice?  
_It is a design pattern, i.e. an industry-accepted best practice to
solve common programming/design problems._


##WEEK 3 – CODEIGNITER CONTROLLERS
			
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

