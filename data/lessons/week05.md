#Week 5 Survey Results

Responses for each of the surveys follow, with the number of similar
responses denoted by a value at the end of the question line, if appropriate.

There were 35-38 responders.

This week deviates from the last few, in that I have a "models in a nutshell" presentation
for in-class, which will hopefully answer many of the questions you raised.
I think that trying to expand the lectures to address all the questions
is making them too long, and the essence is being lost.

Some of your questions are best or most easily addressed here, if they are too specific
or too unclear to tackle in the presentation.

##WEEK 5 – MODELS
			
###What are topics from the lesson that *you* feel need more or better explanation?			

- Object Relational Mapping	5
- SQL dump (gzipped)	5  
_Every RDB has the ability to export data. This is called a SQL dump.  
One of the options doing so is to generate the dump as ASCII text,
compressed in zip format, or compressed in gzipped format (common in *nix).  
Using phpMyAdmin, select a database, then select the "Export" tab and 
specify your parameters._
- Component Models	3
- Database configuration	2  
_In CodeIgniter, this is done in `application/config/database.php`.
You specify the user name and password to use, the name of the database,
and the database driver. There are a number of other advanced options,
some of which apply to non-mysql databases.  
This will be part of the next lab, after the assignment._
- DATABASE FORGE VS DATABASE UTILITIES	4  
_The Database Forge is a utility class to manipulate database and table structures.  
The Database Utilities class is a utility class to import/export data under program control._
- Enterprise Component Model	2  
_An entity model which incorporates persistence._
- Java Beans	2  
_An entity model. COMP2714._
- KINDS OF MODELS	2  
_Encapsulating sources of data._
- Misusing a Base Model? --> Can you detail the "CI singleton model" a bit more?	2  
_The intent of the PHP coding guidelines is to have a single class defined in a sorce file.
CodeIgniter looks for a single source file when loading a model or library, although
it will look in application/ and then system/` for a superclass.  
To trick it into loading more than one class, put more than one class in a source file._
_The singleton design pattern says that a class should only be instantiated once.
Instead of invoking its constructor, you would use a static getInstance() method, 
which would instantiate the class if needed. COMP3711_
- What is a base model/what does it do specifically?	2  
_It is a superclass for other models you may want to build.
Specifically, it holds anything you don't want to repeat, which
is often a core set of useful methods._
- Any concrete examples of models.	
- Anything special about the definition the word "entity" in entity models?	  
_It means as much or as little as it did in COMP2714 and in COMP3711._
- Bad examples of models	 
_Good question. Models simply "are", as in that is the name we give to
encapsulations of data or data sources.  
A "bad" model is anything resulting from poor entity choices (data modeling in 2714),
poor design class choices (usecase realization in 3711), poor implementation choices
(bad smells in refactoring), improper or incomplete error checking (data validation
or lack of cleansing in a framework)._
- DBDriver & Query Builder	
- Enterprise	_aka large-scale software systems_
- Example Working with DB Driver	_No_
- Example Working with QuerY Builder	*MY_Model*
- How CodeIgniter Models different from other Models?	
- How is CodeIgniter going to implement best practices for adding additional models to a file?	  
_CodeIgniter 4 distinguishes between collections and entities, and provides better
pattern implementations (table data gateway, data mapper)_
- how to use model with controller and view with some functions	
- how to using the basic model for design and explaination for diagram	_Unclear question_
- Is the capitalization of model names a generic rule across different frameworks?	 
_Each framework has its own conventions. UCfirst is the choice for CI3._
- Is there a downside to using the CI_Model to give access to all the models with every controller? Encapsulation?	 
*No. Without it, you would need something like $CI = &get_instance(); $CI->something->...`*
- Model conventions	*MY_Model*
- Model-View-Adapter	_Yes?_
- Models For RDB Tables	 _The default perspective for MVC frameworks_
- More about database utilities	_I mention them for completeness_
- more specific examples about the route topics	   
_This isn't about models, right? Ask me in lab please._
- Slide 3, magic access?	 
_CI injects all of its base object properties as properties of your model.
You didn't define them, yet there they are. Like magic._
- some basic methods for model	*MY_Model*
- The Wildcard Routing, I feel need more explanation,	 
_This isn't about models, right? Ask me in lab please._
- Updates between models and views	_Yes?_
- What if we do not use netbeans?	_Yes?_
- What is "Private fields" in JavaBeans?	 
_The convention says that data fields or properties should be scoped as "private". COMP1510 & 2526._
- What is the Data_mapper?	_A generic interface for models, from me not from CI._
- whats an example of a singleton	*https://en.wikipedia.org/wiki/Singleton_pattern*
- Why is object-relational mapping is akward?	_Classes don't always map directly to tables. COMP3711_
	
	

###Are there other, related, questions that you would like addressed in class?			

- .gitignore usage  _This will come up in our next lab._
- Are the model conventions only for code igniter?  _Depends on which conventions you are referring to_
- can object-oriented mapping be effected by a PHP environment and if so how?  _No_
- Classic Model-View-Controller
- Could you give some examples on how to implement OBJECT-RELATIONAL MAPPING? _No - out of scope_
- Defined synchronization for github  _? Ask me in lab._
- desgin for databas web app   
_Databases are usually stored/managed in their own server tier. 
There are some enterprise design patterns that would inform your design decisions,
but the DB design is basically the same as COMP2714_
- Do we need to do migration every time like in laravel  _No_
- Does the DB query method also sanitize the input?  _Yes..._
- Examples of using database utilities and forge _No_
- Is javabeans just trivia or will we ever have to know it?  
_You will never have to use a JavaBean in a PHP program.  
If an enterprise developer mentions the word, they will assume that you know
exactly what they are talking aboutm however._
- Is there a recommended ORM package to use with CI?  _No_
- Is using a Query Builder more platform independent that using a query call and inserting SQL statements? Does the latter have better performance?  
_A query builder is definitely more platform independent, but also more "expensive"._
- Models for RDB tables  *MY_Model*
- Models for XML  *Xml_Model*
- some functions or methods about model and database 
- the requirement for lab4 is a little confusing. _Ask me in lab or after class_
- What a "gzipped"?
- what are ORMs used for?
- What is this new hip thing call Rational Rose   
_The latest tea, developed by & for programmers. Doesn't do much for PHP programmers,
sadly or thankfully, depending on your perspective._
- Which one do you prefer? Database driver or SQL builder?  _Query builder._
- Will we be implementing Enterprise JavaBeans eventually in this course?  _No. seee above._


			
##WEEK 5 – MODEL PATTERNS
			
###What are topics from the lesson that *you* feel need more or better explanation?			

- Model-view-view-model	5   
_Appropriate only for rich client side systems, eg using ASP.NET, Java Server Faces, AngularJS_
- Active record model	4
- Classic Model-View-Controller	3
- Classic MVC And The Web	3
- Domain Models	3
- (In the section Models for Service) What other ways are there to access services? Which ones are regarded as "best practice"?	2  
_If a service is intended to access a managed data resource, then a model is **one** way to implement that.
For instance, to access a remote databasem you night have a local model, which
is a REST client interacting with a REST server somewhere, where the real data
and conventional modle would live._
- Can you give us real world examples of when one model pattern is better than the other?	2
- models for folder and model for services.	2  _If the shoe fits..._
- models for RDB tables,	2
- Models for Services	2
- Models for XML	2
- a Models for folders example	
- Benefits of model patterns	 
_Each is a different approach to glueing app components together.
Some work well on the web and some don't._
- Could you explain model for data stored as XML?	*Xml_model*
- how to design a model pattern	 _You don't design a pattern, you apply it. COMP3711_
- Model views	_Unclear question_
- Models Use	 _Unclear question_
- Record Properties in Practice	_Unclear question_
- The first figure shows a broswer as sparate from a view. I thought all the browser "sees" is a view (ie, aren't they the same thing?)	  
_Multiple perspectives, similar & often differently used names :(  
If strictly concerned with server-side, the presentation layer would probably be
considered to be the view generating logic of yours; if building a rich client,
the client UI would probably be considered the presentation later.
The former approach treats the browser as a destination, while the latter treats it as the view. 
It's all a matter of perspective._
- The model patterns example, I think need a more clearly figure	
- Usualy models are Relational Databases?
- What does it mean to propagate an event?	
_An event handling chain, where an unhandled event is passed "up" the chain until it is eventually
dealt with.
- What is that data aware widget on slide 6?	 
_It oculd be the entire view (page), with a biewmodel for what goes where,
or it could be a calendar component, with its own model of calendar periods
and relevant events
- What's an RDB table? You say that you've mentioned it but I'm unaware.	_COMP2714_
- XML	


			
###Are there other, related, questions that you would like addressed in class?			

- Different patterns that may can work in different situations  _See JEE blueprits_
- Does the materialize design pattern have anthing to do with this topic? https://msdn.microsoft.com/en-us/library/dn589782.aspx  
_That sounds like a different name for MVA or MVP, although it sounds very similar
to what I call "view templating"._
- is M-V-D still use nowadays?  _"MVD"?_
- is M-V-VM still use nowadays?  _Yes - ASP.NET etc. See above._
- Is Model-View-ViewModel one of the most popular model for web apps?  
_In some circles, I am sure. However, the empirical evidence I have suggetss MVA is more prevalent._
- is one design pattern superior to the other ie model view adapter vs model view viewmodel  
_They each have strengths and weaknesses. A proper answer to your question lies
in usecase refinement ... COMP3711_
- The slides say the model calls the view. Is it wrong if the controller calls the view?
- What's the most common uses of models?  _Data_
- Would be interested in models for RDB Tables examples.
- You mention that we can use subfolders as categories (slide 17). Files can also be given tags through their properties menu. Are Tags a viable alternate method of categorizing files like images?  
*Yes, but that would be expensive ... you would need to open & process image file metadata in order to determine those
tags, would you not?  
A better idea might be to encapsulate those tags as a property of an Image_file model.*

