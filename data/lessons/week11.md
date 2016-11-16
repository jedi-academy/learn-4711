#Week 11 Survey Results	
	
Responses for the survey follow, with the number of similar
responses shown to the right of a response.
	
There were 29 responders.
	
I have interpreted and aggregated some of the results, in hopefully an appropriate fashion.
Thank you to those who responded :)
	
##WEEK 11 – XML Processing
	
###What do *you* think the most important takeaways are from this lesson?	
	
- DOM API	12
- SimpleXML	11
- **The Document Object Model (DOM) is an API for accessing and manipulating XML, XHTML and even HTML documents	7**
- **DOM Nodes and Elements	6**
- **using XML in PHP (simpleXML and phpDOM)	6**
- There are a handful of useful dom apis that can be utilized.	4
- XML is very commonly used with Java	2
- a paper handout	  
_This one puzzles me. Neither of these words even appear in the lesson, nor can I deduce what you are thinking of._
- a SimpleXMLElement can be simultaneously an object and an array!	
- A SimpleXMLElement is iterable. You saw that earlier but might not have realized it, with the children() method, which returns a SimpleXMLElement.	
- DOM is easy to use and traverse, but can be a memory hog for large documents	
- **DOM tree allows for language neutral way of exchanging information. Enterprise world loves the DOM API.	**
- indexing objects seems interested	
- SimpleXML is quite similar to php	
- The whole lesson. It goes over stuff I am not very familar with.  	
_That is part of the point, to give you an opportunity to tell me what needs elaboration in lecture._
- Using XML object	
- XML is supported in almost all programming languages	
- XML is supported in almost all programming languages, but mostly implemented in java	
- XML Models	
	
	
###What are topics from the lesson that *you* feel need more or better explanation?	
	
- Nodes vs Elements	4  
_A Node is an entity in a tree-like structure, with traversal methods, but no data interpretation.  
An Element is an node with additional methods to expose its value, properties, and nested elements._
- Some DOM API Details	3  
_I am guessing here that you are interested in DOM class methods?  
The DOM classes are depicted in slide 8, listed on slide 9, and the most relevant
methods shown on slides 16-18.  
The [PHP DOM API reference](http://php.net/manual/en/book.dom.php) is part of the PHP manual._
- DOM Alternatives	2  
_In the broadest sense, DOM is one strategy for processing XML, the others being shown on slide 11.  
If you are looking for alternatives to PHP-DOM specifically, those are shown on slide 14.
The only real contender is SimpleXML._
- Using PHP-DOM	2  
_My recommendation is to use SimpleXML wherever possible - it is simpler.
You would use PHP-DOM when necessary, for instance validation (last week), node deletion (slides 27-28),
or output formatting (slide 29)._
- When should i use XML over DOM or vice-versa?	2  
_DOM is an approach to handling XML; there is no one or the other.  
SimpleXML and PHP-DOM are two PHP libraries to process XML. See answer above._
- XML models	2  
_I didn't go into this extensively - just pointing out that you *could* build
an XML_Model that was similar in interface to MY_Model.  
In lab this week, we will be building an entity model, using XML for persisting data._
- "the DOM API can be extended to handle different kinds of documents" what are other examples?	  
_THe basic DOM ius shown on slie 7. SLide 8 is an example of extending that with HTML
specific methods. You do build similar extensions for MathML, ChemML, or any of the
other markup languages built on XML._
- Does "knowing" and "getting" the DOM, simply imply that you understand how XML is structured? or is there something else that we should know?	  
_No. It is both the structure (tree-like) and the processing strategy (parse it all in,
traverse and manipulate as needed). The "getting" part is realizing the implications
of this strategy (eg. entire data structure read into memory) and how it differs
from the other language implementations (eg concrete classes vs interfaces)._
- DOM weakness is "interface only" what is an example of a way that restricts us?	  
_With an interface only, you don't know the intended structure of an appropriate
in-memory tree, just what you are able to do with it. This is a "good" O-O
principle, but most interface prescribers will also provide a reference implementation
or even a hierarchy of these (abstract, default & a specific example).  
Being interface only, the different implementors are "free" to choose how
to interpret some of the methods and needed data structures, and have done so :(_
- How exactly do you navigate a tree?	  
_PHP-DOM:   
"down": each <code>DOMNode</code> has a <code>DOMNodeList childNodes</code> property,
which can be iterated over;  
"up": each <code>DOMNode</code> has a <code>DOMNode parent</code> property, referencing its
containing element  ;
"left/right": same ide,a but using the <code>previousSibling</code> and <code>nextSibling</code>
properties.  
SimpleXML:   
"down": the <code>children()</code> method of a SimpleXML element gives that node's
child elements in iterable form;
"up": not done; start at the document root and descend; I will dig up an example;  
"left/right": done from the parent node, not specifically addressed in SimpleXML.  
"digging": referencing a SimpleXML element's "property" gives you all of its
children as an iterable list or array ... no equivalent in PHP-DOM._
- how simpler is SIMPLEXML than normal XML?  
_I presume your question is about SimpleXML vs PHP-DOM? Each of these offers a diffrerent
way of processing XML. SimpleXML suits dealing with XML fragments in memory,
especially when you want to use PHP-like techniques for digging._	
- how to decode xml by php	  
_Decoding XML? You can get the value of an element or one of its attributes.
What you do with that is up to you.  
An XML element can be cast as an array or JSON object, if that is more
comfortable. See the supplementary lesson, xml04, this week._
- I would say all. Not that you didn't explain them well... Just that it only touches a little bit on  each and everybody could self-learn more.	
- maybe a more concrete hands on example... but im guessing that will be our lab :)	  
_You guessed right! And I have added a link to a repo with examples, that I will talk about during lecture._
- nodes vs elements, node state "what does this node contain?" what does that mean? just more dynamic data? or?	  
_The "state" of a Node, or its "value", is literally everything inside the opening and closing
element tags. That could be mixed, withy text and nested child elements. 
This is accessed through the <code>nodeValue</code> property.  
A Node also has a <code>textContent</code> property, which is the nodeValue
with nested tags removed._
- phpdom vs other dom	  
_In PHP, there is no other DOM package._
- Saving SimpleXml Formatted	  
_See slide 29?_
- SAX	  
_SAX is an event-driven API. Instead of parsins an XML document into an in-memory
tree, you provide callbacks for the different events that occur pasring such
a document ... tag open, tag close, text value, and so on.  
You have to keep track of state and deal with it, for instance treating
a <code>name</code> element different if inside a "customer" or an "employee"
element. You also need to keep track of what the current element is, in case
you want to do something with its text value when that event is trigger :-/  
SAX is considered good because it is fast & doesn't take as much memory as DOM._
- SimpleXML and its relation to PHP-DOM (if any)	
- What are the most common apis that we would use for this course for processing XML?	  
_I thought that was clear: SimpleXML and PHP-DOM._
- What does this mean: XML support is defined by Java	  
_The reference implementations for all the different ways of dealing with XML
are built in Java, and more often part of JEE._
- What is a cursor? "Dom has no cursor.a SimpleXMLElement can be simultaneously an object and an array!"	  
_A cursor is a relational database result set concept ... which row in the result set
is currently being processed. Different JDBC versions can be distinguished
by their level of "cursor" support ... forwards only, forwards and backwards, etc._
- What is a living standard?	  
_One which is not set in stone, but continues to evolve over time.  
See slide 5.  
HTML is another living standard.  
XML is not so much a living standard._
- Will we touch on any of the other alternatives for XML?	  
_As in JSON? yes. If you are referring to processing alternatives,
just SimpleXML and PHP-DOM._
	
###Are there other, related, questions that you would like addressed in class?	
	
- Is it possible to use JSON instead?	2  
_Instead of XML in a real-world app? Yes - there is no requirement to use
XMl, JSON or RDB for a webapp :-/  
For our labs and project? You will have the opportunity to use JSON
for the REST lab and for assignment 2, but your webapp will
also need to handle XML._
- Any important notes for processing XML?	  
_Use SimpleXML for XML fragments & manipulation, PHP-DOM for validating and
saving._
- Are there alternatives to using xml?	  
_See above. In terms of structured data, no practical alternatives I am aware of._
- benefits of using xml vs json	  
_Strong typing with schema, ability to validate, more widespread._
- Do we need to understand what the difference between HTML and XHTML is?	  
_Given the many, many differences between them ... YES!_
- Is it necessary to know XML for PHP websites?	  
_Not strictly speaking...  
unless you work for or with an enterprise webapp...  
or you have to consume services from an enterprise...  
or you want strict type validation for your data...  
or you want to claim to be a "[full stack web developer](https://www.sitepoint.com/full-stack-developer/)"._
- Is this the current standard for dom?	  
[DOM Level 3](https://www.w3.org/DOM/) is the "current" standard._
- Maybe it would fit in beter with next weeks presentation, but how would we then use XML to be sent over the web.	  
_You will see and use XML in lab this week and next :-/_
- Real life examples of xml usage.	  
_Hmmm, data exchange for any REST service (Google, Facebook, Paypal), 
configuration and data exchange for providing or consuming *any* SOAP service,
*any* XHTML webpage (especially one you want to manipoulate server-side rather than client-side),
configuration and data exchange for playing on the Enterprise Service Bus,
working with SVG images, working with Microsoft Office document raw data.  
Just a couple, eh?_
- What is SAX?	  
_Already addressed above._

###Do you have comments or suggestions about the flipped learning process?

- Although I understand that issues happen, I found it unfair to be given the material to finish the lab on Saturday and have it due on Sunday at 5:30 during a long weekend.  
_Agreed. I am doing the best I can, but it hasn't always worked well. You & I are both guinea pigs this time round._
- Good amount of code snippets and visuals, very helpful.
- I don't usually get a full understanding of the learning material until when we do them in lab.  The lab is way more helpful than these lessons in my opinion.
_That is purposeful. The online readings are meant to provide some concepts and examples, the
in-class lectures are intended to address questions about them, and the
labs/assignments are meant to give you practice._
- I find it fits my learning style very well
- It is kind of unfortunate that we only get a chance to go through the slides the day before class, it would be ideal to have them available sooner so that we could have more time to look through it.
_Agreed. Same answer as a few questions above._
- No suggestions. I just want to say I like it.
- off topic but will we still learning about secruity ?  
_I haven't decided how best to integrate that. It isn't clear if that would be an 
appropriate topic for the "loose ends" week, or better addressed as a tutorial
that you can use to add authentication to your app.  
If you are talking about XSS, CSRF, hacking, intrusion detection,
or OWASP - we will not have time to dive into them._
