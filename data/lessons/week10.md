#Week 10 Survey Results	
	
Responses for the survey follow, with the number of similar
responses shown to the right of a response.
	
There were 34 responders.
	
I have interpreted and aggregated some of the results, in hopefully an appropriate fashion.  
I have bolded what I consider the important takeaways.  
Thank you to those who responded, even though it was optional :)
	
##What needs more explanation for XML?

- Constraining XML With A DTD	4	  
_See the example-xml repo. It provides a number of different XML document
styles for the same data, and a DTD that would be useful to constrain each._

- XML vs RDB	4  
_These are two different data structure strategies - tree structured (XML)
versus tuples (RDB). Each would/could suit different situations better._

- What is a schema/how is it used/implemented?	2	  
_See the example-xml repo. It provides a number of different XML document
styles for the same data, and a schema that would be useful to constrain each._

- XML tools	2  
_Out of scope. I just want you to know they exist._

- Data representation	  
_There are many, many ways to represent data, and to visualize it.
Out of scope._

- different ways to structure XML data	  
_See the example-xml repo. It provides a number of different XML document
styles for the same data, and DTDs/schemas that would be useful to constrain each._
- DOM model?	 
_Document Object Model, which is also in browsers & Javascript._
- How granular do we need to make our XML documents?	 
_See the example-xml repo. There is no one way._
- I'd like to know more about international use and how to support multiple languages	 
<em>That is a can of worms!
The W3C has suggested [best practices](https://www.w3.org/TR/xml-i18n-bp/),
and is working on an [international tag set](https://en.wikipedia.org/wiki/Internationalization_Tag_Set),
but I don't believe there is a definitive answer.</em>
- Should we split seperate complete elements within an XML document into multiple documents?	 
_You can (they would be called external entities), but don't need to.
This is usually done to break up large documents._
- Strategy	 
_See the example-xml repo... in lecture._
- what is ! inside the XML tag	 
_XML comments take the form <!-- ... -->  
DTD syntax has exclamation marks, eg. <!ELEMENT ...  
If your question is other than this, bring it up in class._
- What makes schemas so complex?		 
_See the example-xml repo... in lecture._ 
- What would you use RDB for?	 
_Tuples, or tabular data, with relationships between groups of data.
Think 2714 etc._
- when use html when use xml?	 
_Use HTML for poorly structured, loosely organized HTML, exploiting
vendor extensions to the language. Use XHTML when you want better structure and
the possibility of validating the syntax and structure of a document.  
If looking at (X)HTML vs XML, HTML is used to represent the structure and content
of an HTML page; XML is used to represent the structure and content of whatever
you want it to, using constraining documents. XML can be used
to store the state of objects, while HTML cannot._
- when would it be more apporpriate to use XML data representation vs JSON?  
_Use XML for its standards, richness and constrainability; use JSON for its simplicity._	
- Why do people still use XML if JSON seemed to be so much more useful?	 
_standards, richness and constrainability_
- XML as payload/payload wrapper	  
_The payload of a message is the intended data to exchange, regardless of its
format or representation.  
A payload wrapper is a document with metadata, for instance the sender, the
intended format of the payload, etc._
- XML is still on employers skill sought- for how much longer?	 
_I don't see XML disappearing until there is a standard for constraining JSON,
or a new constrainable notation emerges.  
Once either of these happens, XML should decline as a sought-after skill,
with a typical ramping down time measured in years._
- XML seems kind of messy, are there any other better ones out there?	 
_Sure: text (totally up to you what to do with it), CSV : comma-separated values 
(full of ways to defeat parsers)_
- XML vs CSS	 
_No relation. CSS is part of HTML, and uses element attributes defined using XML
syntax, but CSS styles are their own beast._
	
	
##What needs more/better explanation for JSON?	

- JSON Strategies	3  
_I don't know enough to answer this._
- Can we discuss good tools for validating/testing your JSON requests/API, such as postman?	2  
_I don't know enough to answer this._
- It would be nice giving more practical examples of JSON in MongoDB	2  
_I don't know enough to answer this._
- Besides MongoDB for JSON, what other popular DB uses JSON?	  
_I don't know enough to answer this._
- BSON	  
_I don't know enough to answer this. MongoDB only??_
- Can we discuss the use of callback functions that interact with JSON via AJAX?	  
_I don't know enough to answer this._
- Can you explain more about the magic stuff from slide 9?  
_I presume you are referring to the slide on page 1??
"Magic" refers to whatever other distributed "glue" you might use:
different transport conventions, different application conventions._	
- Constraining data	  
_I don't know enough to answer this._
- How do you use middleware?	 
_I presume this *does* refer to slide 9 ...   
Conventionally, middleware refers to server-side code that provides
interfaces to front-end (browser) or client code (presentation),
and to backend persistence (data) or infrastructure (messaging,
mail).  
Middleware would be used by application logic ... for instance to connect
a System A to a System B (as shown in the diagram). If the middleware you use
doesn't support JSON, a simple translation layer might be added.  
Nowadays, in the PHP world, middleware refers to "HTTP middleware",
which is used *within* a web framework to provide pipelined processing
of HTTP messages. Yes, this is confusing. Yes, this is another
bit of PHPism that I disagree with, but that is only my opinion._
- How to parse json	 
<em>json_encode & json_decode. Examples coming</em>
- how to use Json to store binary data?	 
_I don't know enough to answer this. I would guess some form of encoding._
- how to use MongoDB ?	 
_I don't know enough to answer this._
- Hwo json notation can be converted to json object	 
_There is no such thing as a JSON object. JSON is a notation. 
A PHP associative array or object can be encoded into a JSON-formatted
string, and a JSON-formatted string can be decoded into a PHP associative
array or object.  
What is normally called a "JSON object" is actually a reference to the
JSON-formatted string._
- I want to know how we can use Json to facilitate communication between diffferent platforms	 
_COMing up in Week 12._
- Is JSON data representation always a better choice for NoSQL DB's?	 
_I don't know enough to answer this._
- JSON vs JSON	  
_JSON is flexible, so flexible that there could be a multitude of ways
to represent the same data, each of these having programming implications.
You need some way of defining or constraining the data structure._
- JSON vs RDB	 
_JSON is part of the unstructured evolution of data models, whereas RDB
is currently the most evolved of the structured data models._
- what does M->D on slide 5 diagram mean?	 
_Logo from https://www.slideshare.net/Dataversity/nosql-now-nosql-architecture-patterns-23589170_
- what is RESTful services? example?	 
_Coming in Week 12_
- Why use JSON over php array? Or the other way around?	  
_JSON is used to store or exchange PHP data. You can json_decode a JSON
string into a PHP array for manipulation._

----------------------

JSON is a data representation convention. It has very 
[comprehensive support in PHP](http://php.net/manual/en/book.json.php) - all two
useful methods! Basically, there is no implementation to speak of - 
you are expected to iterate through whatever format you choose to
decode or cast a JSON object into (array or object).  
Any "implementation" is basically enforcing the syntax, and providing
for converting between JSON and objects/associative arrays.

Its simplicity is also its weakness ... loose typing, not
constrainable, interpretation up to developers.  
Actually, JSON data is expected to correspond to the syntax
prescribed by json.org, but even that gets extended (eg BSON from
MongoDB).
