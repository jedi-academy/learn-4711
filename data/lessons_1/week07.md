#Week 7 Survey Results	- Forms Creation & Handling
	
Thank you to those who responded to the survey.
Responses for the survey ready on time follow, with the number of similar
responses shown to the right of a response.
	
There were 41 responders.
	
I have interpreted and aggregated some of the results, in hopefully an appropriate fashion.
	
###Are there any "forms creation" topics you would like me to elaborate on?	
	
- Adding data	4 _Demo in class_
- Data in Object Form	4 _Demo in class_
- Using your own helper	3 _Demo in class_
- Form Helper	2 _Demo in class_
- HTML helper	2 _Demo in class_
- Which form creation technique do you use?	2 _My own helpers ... week 9_
- Adding controls	 _Demo in class_
- ajax post?  
_You provide controller endpoints to handle AJAX posts,
by mutual agreement with whoever is coding the client-side logic_
- Best practice for creating forms	 _Demo in class_
- building form fields	 _Demo in class_
- collaborate with javascript (which means client side)?	  
_Client to server is done via AJAX (see above), server to client
is done in view or using CSS/JS framework, coordinating these
would be an "asset management" task (week 9)_
- Common mistakes in forms creation	  
_Not escaping output that you know should be, mis-forming URLs for
targets or referenced stuff, mixing up names and IDs, 
not defending mission critical usecases against CSRF or
page reloads or duplicate posts, malformed HTML,
providing for data to be returned in the open_
- Creating a custom form helper	_Week 9_
- Creating forms using a database	 _Demo in class_
- customization of scaffolding	_CI doesn't have scaffolding_
- Form validation	_lab_
- Grabbing user input	 _Demo in class_
- model form binding	  
_Models aren't usually bound to forms,
but a common practice is to have a `rules` method, which
returns form validation configuration rules_
- More array checkbox in forms and other sorts of listviews	_Week 9_
- populating dropdown from db	 _Demo in class_
- posting form	 _Demo in class_
- scaffolding	_Yes...? There are third party tools to handle scaffolding.
You may have to elaborate on this in lab._
- Security (XSS, SQL injection, etc.)	  
_Basic filtering is done automatically by CI's Input class.  
CI's Securityclass provides additional XSS filtering, and
gives you CSRF detection._
- Template parser	 _Demo in class_
- What kinds of techniques are there?	 _Demo in class_
- What the $starter object is for in the Adding data (p05) section	 _Demo in class_
- why no PHP in views? is it an anti-pattern? what could go wrong, is it due to security reasons?	  
_IN CLASS_
	
	
	
###Are there any "forms handling" topics you would like me to elaborate on?
	
- Error handling	7 _Demo in class; lab_
- Sessions	5 _Demo in class; we will use sessions in lab. _
- CodeIgniter's Form Validation	4 _Demo in class; lab_
- Data Transfer Buffer	4 _Demo in class; lab_
- Form Validation Callbacks	4 _Will try to incorporate into the lab ... _
- An example of function form_prep($str)	_Convenient escaping of data if creating HTML form elements manually_
- any other way to store except session?	_Sessions are intended for cross-request persistence. You need to elaborate._
- Best practice at handling form errors	_Demo in class_
- Can we trust CIs form validation or should we consider other 3rd party validators?	  
_It is considered trustworthy. The occasional bug has cropped up on [HackerOne](https://hackerone.com/codeigniter), but not many._
- client-side validation	  
_Always useful, as a user convenience (easy to make valid choices) and
as a technique to eliminate many errors. Don't rely on it, though!_
- Common mistakes in forms handling	  
_Not validating input, having only trivial
input validation (eg "numeric"), trusting the user,
not handling multi-byte strings properly (eg foreign language characters),
getting "cute" with PHP globals_
- Displaying error messages	_No best way ... demo in class_
- Error callbacks	_Not sure what you mean, if not form validation callbacks._
- error messages	_Yes? Elaborate_
- form handling with JQuery	_^^_
- form textarea	 _It is treated as a text input field which might be visually different
when rendered through HTML._
- Form validation and script tags - how to prevent	_^^ input & security classes_
- Getting session data	_Demo in class; lab_
- Handling sessions and globals	_Demo in class; lab. Globals: global variables (poor practice) 
or PHP globals (poor practice)?_
- How does it work under the hood?	_The Input class provides most of the magic_
- how reliable is Sessions on mobile devices?	  
_Session data is stored server side. All we need client-side is a cookie for the session
identifier.  
You *could* resort to URL rewriting to avoid even that cookie, but that
requires discipline, can be defeated, and results in ugly & non SEO-friendly URLs._
- Images?	_Uploading? See "leftovers" in FYI organizer section._
- In the validation callback example in the slide, the parameter $str is not used id the function body, is it part of the callback fuction signature that must be passed onto the callback function?	  
_That is coincidence. I chose a poor example here. My callback is testing if at least one of three
options has been set, and I happened to associate it with the field shown in the example._
- is it safe to store multiple things like an array in one cookie? or one session?	  
_We would normally use sessions instead of cookies, for security & performance.
Sessions can hold anything serializable, including arrays._
- password inputs	  
_Normal practice is to use an HTML "password" field,
obscuring the text entered. Normal handling practice is to validate
the hash of the password, not to compare the submitted value against
a plaintext field in a database table. See http://ca3.php.net/manual/en/book.password.php_
- Security (XSS, SQL injection, etc.)	_^^_
- server-side validation	_Demo in class_
- Session examples, if any	_Demo in class_
- Session Flashdata	_Demo in class_
- there is a explanation for data transfer buffer degin pattern. is there any other alternative patteren being able to substitue the patteren? and when to use?	  
_Sometimes called a data transfer object, it is the standard way to save in-progress data through a user dialogue,
until the input is sufficiently validated to pass on for storage._
- Time outs/session kickout like you have 10 mins to put in your credit card info or else you lose your yeezys you had in cart	  
_PHP & CI sessions have timeout issues, and are not considered reliable.  
A better practice is to store a "timeout" value in your session, and to invalidate
the session (with appropriate consequences) if a request arrives that is "stale"._
- Validating input	_^^_
- Whats the best way to mess with someone through form input?	  
_Injection, foreign characters, multiple posts/reloads,
produce invalid field values using browser debugger, malformed filenames, invalid image formats,
modify HTTP headers_
