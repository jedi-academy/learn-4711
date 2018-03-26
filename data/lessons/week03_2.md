#Week 3 Survey Results

Responses for each of the two surveys follow, with the number of similar
responses denoted by a value after the question, if appropriate.

There were 46 responders.

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

