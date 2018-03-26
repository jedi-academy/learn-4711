#Week 8 Survey Results	
	
I have interpreted and aggregated some of the results, in hopefully an appropriate fashion.
I have adjusted the in-class presentations based on your feedback, and
answered of the questions directly below.
	
There were 53 responders, an increase over previous surveys :)
	
##WEEK 8 – CREATING & HANDLING FORMS
	
###What are topics from the lesson that *you* feel need more or better explanation?	
	
- Data Transfer Buffer	6  _In class_
- Sessions	6  _In class_
- Form validation callbacks	5  _In class_
- "flashdata"	4  _In class_
- Views	3  
_Not sure what you are looking for. The form generating and handling example app
uses the view templating technique introduced earlier in the course.
This is particularly appropriate to have a view fragment for each technique
or slide from the presentation._
- CodeIgniter's form validation	2  _In class_
- Handling Input Using CodeIgniter q02	2  _In class_
- is there any difference in performance with regards to superglobals like $_GET, $_POST and $_REQUEST	2  _In class_
- 3. SESSIONS --> the database session driver	  _In class_
- Adding Data	 
_Yes? adding data to ...???_
- Are session variables secure?	 
_ Session data is stored on the server, hence reasonably secure.
Having said that, if you are performing CRUD, then the password would have to be
stored in the session to avoid rekeying it if a page had to be presented and
handled several times to remove errors.  
There are a number of techniques that can be used to beef up session
security, like IP matching and CSRF tokens._  
_ A cookie is used to hold the CI session key. Session data is kept server-side.
It **is possible** to use cookies to store data client-side, but you are
likely to be "fired" for doing so, because of data exposure. _
- Are the session retrieval and related functions specific to CodeIgniter or general to PHP?	  _In class_
- Building Fields	  
_Not sure what you are getting at._
- Concepts need to be narrowed down further as they are quite broad.	  
_That's what I am trying to do - a slide with the concept, and then
examples for each technique for implementing it.  
If there are concepts that still don't make sense, it would help
to know which those are._
- form demo in class	  _In class_
- Forms	  _In class??_
- Handling controller	  _In class_
- how to use form helper class	  _In class_
- I need detailed explanation and examples for Data Transfer Buffer in Form section	  _In class_
- I need detailed explanation for Error Handling in Form section	  _In class?_
- I need more detailed explanation for each step to understand steps in Creating Forms section.	  _In class_
- I think just seeing a demo of the forms will help me understand the benefits and also how it is used	  _In class_
- Is the session in codeIgniter the same as php session?	 
_The CI Session class is a *wrapper* for the PHP session resource, which means
it uses the native session._
- Once the data is filted by Code Igniter can we just store it in the database safely?	 
_Generally speaking, yes, with some provisos:  
Passwords should be hashed, not stored directly.  
HTML or XML stored in a table column might be better using a BLOB.  
Data that is to be presented after retrieval should be 'escaped' in output._
- Session as a container for key/value pairs	  _In class_
- session data	  _In class_
- Setting up a form	_??_
- the benefits of form in codeigniter compared to the form without php code	  _In class_
- What are Callbacks? Functions called by function?	  
_This is a clunky provision in CI's form validation to let you call a custom
method to handle a custom validation rule. The method is called as part
of running a validation.  
This is different from the conventional notion of a callback function, namely
some code invoked asynchronously when a given event occurs._
- What are the available options for rules regarding form validation?	  _In class_
- what is the best way to access session variables	  _In class_
- What jobs still use form building ?	  
_Not sure of your question's intent.  
There is a set of tools, generally called scaffolding, that can generate 
generic forms for a DB table, amongst other things.  
This is not a CI component._
- when to use a cookie and when to use a session?	  _In class_




	
###Are there other, related, questions that you would like addressed in class?	
	
- A particle is moving around in a circle and its position is given in polar coordinates as x = Rcosθ, and y = Rsinθ, where R is the radius of the circle, and θ is in radians. From these equations derive the equation for centripetal acceleration.  
_Seriously?_
- Can you access the session info from the server side?   
_Only from the server-side_
- Does using HTML helper and form helper make the app run more efficiently?   _In class_
- From last week, why should there be no php in views?  _In class_
- handling submiited data  _In class_
- How do you prevent SQL Injection?   
_Input cleansing (automatic), output escaping, etc_
- How does Codeigniter use HTML helper and form helper to simplify HTML code?   _In class_
- How long does the session dafa persist?   _In class_
- If CI has input filtering that we can use, are there adiitional aspects of input filtering that we should conisder that Ci does not provide?  
_The input filtering and output escaping in CI3 is good, but not bulletproof.
New exploits are reported (for CI and all the frameworks), and the fixes for them
are one of the main triggers for minor releases.  
CodeIgniter participates in HackerOne bug bounties._
- Is the session library similar to sessions php global variable?  _In class_
- Lecture notes shows Session data can be set several different ways. what is that? _??_
- More code examples  _In class_
- Question about Data Transfer Buffer Pseudo-Code. How can I write pseudo-code?  
_Programming 101. Seriously, pseudo code is what I start off with as comments
in a module to be implemented. It is not meant to conform to any specific grammar or programming language._
- Should everything be error checked? Even the most simple of things?  _In class_
- The function of each step. What is pros? What is cons? When do we have use for each step?  
_"Each step"? The presentations address the generating and the handling steps.
Are you looking for more?_
- what happends if we didn't specify an error message? does it have a default error message?  
_No. The example in class should help._
- What is the difference bteween the "data transfer buffer" design pattern and other patterns that control the transfer of data that make it unique?  
_The DTB pattern is a pretty broad and generic pattern, and I would suggest that other patterns would be derivatives of it.  
No other patterns come to mind, by the way._
- where should I use forms?   
_That is *how* input is captured no a webpage, to be sent to the server._
- Which is the best way to get session data?   _In class_


