#Week 10 Survey Results	
	
Responses for the survey follow, with the number of similar
responses shown to the right of a response.
	
There were 9 responders.
	
I have interpreted and aggregated some of the results, in hopefully an appropriate fashion.  
I have bolded what I consider the important takeaways.  
Thank you to those who responded, even though it was optional :)
	
##WEEK 10 – XML
	
###What do *you* think the most important takeaways are from this lesson?	
	
- X M L - eXtensible Markup Language	2
- XML with A schema	2
- different use of XML among HTML CSS	
- Examples of the excerpts	
- handout	
- **Rules, it has a root element, all elements have a matching closing tag or are self-closing, all elements are strictly properly nested	**
- The differences between XML and other technologies	
- Using XML to create a well structered object, with custom attributes.	
- **X M L - eXtensible Markup Language - provides a rich data structure, validation and transformation tools, and is the underlying data representation for many internet accessible services	**
- XML adds semantic meaning. George	
- xml for configuration	
- XML suits data representation better than HTML, because of the structure and element names, that add semantic meaning or intent.	
- XML supports a rich, tree-like model for data	
- XML Tools	
	
	
	
###What are topics from the lesson that *you* feel need more or better explanation?	
	
- expanding more on the XML tools and give some examples of them working	2  
_Out of scope. I just want you to know they exist._
- It's counterparts	  
_Do you mean alternatives to XML? RDB, JSON, text, stone tablets, CSV ...
all can be used to persist data, but XML is the only one of those
with a constrainable tree structure.
A non-relational database (document-centric) would be considered
an alternative by many, though it would need a different approach._
- Its DOM model and processing have become mainstream patterns	  
_I don't see a question here. Yes, the DOM is mainstream._
- synchronization with XML	  
_Again, I don't get your question. XML synchronizing with XML?_
- what is advantage for json and xml	  
_Why one vs the other? They are both ways of representing structured data;
JSON is simple, but you are on your own processing it; XML is not so simple,
but it can be constrained and there are a number of "standard" ways to deal with it._
_If you mean why JSON or XML vs conventional relational data, the answer is that
these are two different data structure strategies - tree structured versus tuples.
Each would/could suit different situations better._
- Why XML is the good	  
_See above._
- XML with A DTD	  
_See the example-xml repo. It provides a number of different XML document
styles for the same data, and a DTD that would be useful to constrain each._
- XML with A schema	  
_See the example-xml repo. It provides a number of different XML document
styles for the same data, and a schema that would be useful to constrain each._

	
###Are there other, related, questions that you would like addressed in class?	
	
- configuration  
_XML is just an alternative for configuration settings, in the broad sense and
not CodeIgniter specific. Alternatives include .ini files, .properties
files, YAML files, etc_
- it looks like an old fashion language  
_You bet. Formalized in 1997. Not like Java, which came out in 1995.  
It could seem old fashioned because it is a markup language, more comparable to HTML
than it would be to a programming language._

##WEEK 10 – JSON
	
###What do *you* think the most important takeaways are from this lesson?	
	
- JSON compared to other technologies	2
- JSON in MongoDB	2
- Constraining Json data	
- JSON advantages	
- **JSON provides a rich data structure, and plays nicely with client-side (AJAX) service requests	**
- **Many services use JSON formatted data structures as the payload of an HTTP message. AJAX, RESTFUL services	**
- MongoDB  flexibility facilitates the mapping of documents to an entity or an object.	
	
###What are topics from the lesson that *you* feel need more or better explanation?	
	
- implementation of json  
_JSON is a data representation convention. It has very 
[comprehensive support in PHP](http://php.net/manual/en/book.json.php) - all two
useful methods! Basically, there is no implementation to speak of - 
you are expected to iterate through whatever format you choose to
decode or cast a JSON object into (array or object).  
Any "implementation" is basically enforcing the syntax, and providing
for converting between JSON and objects/associative arrays._
- JSON for configuration  
_Sure - you could use JSON to store key/value pairs, nested or not.
This would be an alternative to CodeIgniter's associative arrays, for
instance, and it has been suggested for CI. The problem is
declaratively chunking/combining different configuraiton setting groups._
- Json in MangoDB  
_Not sure how much we will get into MongoDB ... I am trying to wrap
my head around a CI driver for it. If anything, I suspect a
supplementary "lesson" addressing that, rather than something we do
in lab._
- JSON structure  
_A JSON object is a collection of key/value pairs, and the values
can be arrays or nested. The only structure comes from your
coding and your interpretation of those. See http://www.json.org/ ...
a single page site explaining the JSON "structure" and having
an organized list of implementations for different programming
languages._
- Should show some useful tools that make use of JSON  
_Er, MongoDB?_
_Seriously, the "usage" is the allowing of JSON-formatted
data for RESTful service requests and responses - that is
not a tool, but a convention._
- Why JSON Matters  
_JSON is *the* data serialization / representation format for
JavaScript, hence appropriate for front-end or back-end JS
coding. A RESTful client or service *has* to support it,
although that is also a convention, as there isn't yet a
REST standard, More on this topic when we address REST
in class :)_

	
###Are there other, related, questions that you would like addressed in class?	
	
- constraints  
_A constraining document for some data representation is a formally
coded set of rules used to attest to the data representation's
validity. For instance, a schema can be used to validate
an XML document, a database schema can be used to validate
RDB records (column types, relationships, etc), and the Java
language spec and corresponding compatibility tests are meant
to validate Java source code or independent implementations
of Java interpreters/compilers._
- what's the disadvantage about JSON?  
_Its simplicity is also its weakness ... loose typing, not
constrainable, interpretation up to developers.  
Actually, JSON data is expected to correspond to the syntax
prescribed by json.org, but even that gets extended (eg BSON from
MongoDB)._
