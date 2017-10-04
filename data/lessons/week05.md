#Week 5 Survey Results - Models

Responses for each of the survey questions follow, with the number of similar
responses denoted by a value at the end of the question line, if appropriate.
There were 41 responders.

This week deviates from the last few, in that I have a "models in a nutshell" presentation
for in-class, which will hopefully answer many of the questions you raised.
Some of your questions are best or most easily addressed here, if they are too specific
or too unclear to tackle in the presentation.

##Which model *concepts* need more or better explanation? These will likely stem from the second reading this week.

- Model-View-ViewModel	6  _Lecture_
- Object Relational Mapping	6 _Lecture. https://github.com/jedi-academy/simple-orm might be of interest._
- Model-View-Adapter	4 _Lecture_
- Active record design pattern	3 _Lecture https://github.com/jedi-academy/simple-orm might be of interest._
- Domain Models	3 _Lecture_
- Component models	2 _Lecture_
- DB-driver vs query builder	2 _Lecture_
- Enterprise component model	2 _Lecture_
- how do query builders work?	2 _Lecture_
- Any other major component models besides Javabean?	  
_Microsoft has its Component Object Model (COM), with the DCOM or .NET frameworks
to support it._
- Are we going to be looking more in-depth at viewmodels?	_No_
- Classic Model-View-Controller	_It is the starting point for building
applications, web or not. A distributed environment presents challenges
with event propagation, leading to MVA or MVVM as possible solutions._
- Controller vs Presenter	_^^_
- CRUD	_https://en.wikipedia.org/wiki/Create,_read,_update_and_delete_
- Data_mapper interface	 _https://github.com/jedi-academy/CodeIgniter3.1-starter3_
- Example of 'JavaBean' model in PHP	  
_No. It is a **Java** convention.  
If an enterprise developer mentions the word, they will assume that you know
exactly what they are talking about, however.  
You will never have to use a JavaBean in a PHP program.    
This could be close...
https://symfony.com/doc/current/doctrine.html  _
- Example of a view being bound to a model  
_More the idea that a view is intended to present
data from a specific model, without having a reference to that model_
- Exploring more domain models with JavaBeans	_No_
- how php connects to database	_http://php.net/manual/en/refs.database.php ?_
- i want to know more about different patterns of model	 _Lecture,
or perhaps https://github.com/jedi-academy/simple-orm_
- If accessing the model from the view is poor practice, why use MVC over MVP (MVA?)?	
_More common in standalone programs_
- Lazy loading	_https://en.wikipedia.org/wiki/Lazy_loading_
- Mapping	 _Lecture_
- methods	_? unclear_
- Models for RDB tables	 _Lecture or https://github.com/jedi-academy/simple-orm_
- Models for services	 _Lecture or https://github.com/jedi-academy/simple-orm_
- non-base models	_Any that extent CI_Model, rather than MY_Model_
- RDB	_MY_Model?_
- RDB Tables	 _Lecture_
- Transaction and deadlock	_https://www.codeigniter.com/user_guide/database/transactions.html_
- use and misuse of base models	 _Lecture_
- Visibility between Model, View, and Controller	  
_Controller has references to model & view; it passes data to a view as a aprameter_
- What is the functionality of the Data_Mapper in the Model.	  
_It is an interface, i.e. prescription for how we want to use with models._
_https://github.com/jedi-academy/CodeIgniter3.1-starter3_
- When you say "model represent data sources", does this mean that it holds the database or is the database?	 _Lecture_



	

##Which CodeIgniter model *practices* need more/better explanation? These are likely to stem from the first reading this week.

- What is Object Relational Mapping? (Example?)	4 _^^_
- DB Driver vs Query Builder	3  _Lecture_
- Encapsulating file system folders	3 _https://github.com/jedi-academy/simple-orm ?_
- Auto-loading model	2  _Adding your model to config/autoload.php is convenient,
but at a small performance penalty.  
Yes, the model then becomes a property of every controller, which isn't always a good idea._
- Encapsulating XML	2 _https://github.com/jedi-academy/simple-orm ?_
- Implementing models in CodeIgniter	2 _https://github.com/jedi-academy/simple-orm ?_
- Active Record Models	 _https://github.com/jedi-academy/simple-orm ?_
- Base Model	 _https://github.com/jedi-academy/simple-orm ?_
- Best practices for extending models	 _https://github.com/jedi-academy/simple-orm ?_
- Best practices for sharing Database dump	
_Every RDB has the ability to export data. This is called a SQL dump.  
One of the options doing so is to generate the dump as ASCII text,
compressed in zip format, or compressed in gzipped format (common in *nix).  
Using phpMyAdmin, select a database, then select the "Export" tab and 
specify your parameters.  
This SQL dump can then be "imported" on another system,
to recreate a database and/or its tables there._
- Can CodeIgniter handle VERY LARGE or multiple databases?	_Yes_
- CI_Model	_CodeIgniter injects the controller properties into
any class loaded as one of these._
- Component models	 _Lecture_
- Database conventions	
_In CodeIgniter, this is done in `application/config/database.php`.
You specify the user name and password to use, the name of the database,
and the database driver. There are a number of other advanced options,
some of which apply to non-mysql databases.  
This will be part of the next lab, after the assignment._
- Database utilities	_Do you mean https://www.codeigniter.com/user_guide/database/utilities.html ?
We don't specifically address it in class, but you are welcome to use it in an app._
- DB driver	 _Lecture_
- I am confused about the singleton that CodeIgniter instantiates when a core-class is loaded.  Are you saying that the core class being instantiated is, in itself, a singleton?  Whatever the case, why does it make it awkward to deal with interfaces/abstract classes?	  
_This is a legacy design decision from CI2. Yes, it makes it awkward to deal with interfaces
and abstract classes.  
A workaround is in https://github.com/jedi-academy/CodeIgniter3.1-starter3_
- I don't understand the submission convention for databases. What does a database dump mean exactly?	_^^_
- If a model is loaded by autoload, is it exposed to ALL the controllers? Is that not a good practise to let unrelated controllers get access to the model?	_^^_
- if there is something that differenciates model in CodeIgniter from other model in general, i just want to know more about	 _Lecture_
- inheritance?	_O-O? If thinking model inheritance, lecture._
- Is it worthwhile to study migrations libraries?	_Only if you plan to use
CI for an app with changing database design_
- methods	 _Lecture_
- Model View ViewModel please!	 _Lecture for the concepts. We are not pursuing this in lab or assignments._
- model-view-adapter	 _Lecture_
- Namespaces	_CI3 does not explicitly support namespaces - legacy design decision.
Yes, this leads to potential collisions with same-named classes in different folders :(
CI4 addresses this :)_
- Possible other models? And their practices	 _Lecture_
- Query builder	_An O-O abstraction for SQL_
- Query building	_The query builder has methods corresponding to most SQL verbs,
meaning that a SQL statement could be easily translated to a query builder method
call chain. If too complicated, use the SQL directly._
- Transaction and deadlock	_^^_
- using models to interact with database	_^^_
- Visibility between Model, View, and Controller  _^^_	
- Whih is better practice: writing our own SWL statements or using a Query Builder?	_^^_


##What if I don't want to play this game?

- I will do the readings. In my own time. I got my priorities. _Alrighty_
- I'm not going to participate in these surveys. _Ok. Each is only worth a fraction of a mark anyway._
