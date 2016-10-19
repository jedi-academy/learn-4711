#Week 7 Survey Results	
	
Thank you to those who responded to the survey, in spite of my late
posting of the lessons.
Responses for the survey ready on time follow, with the number of similar
responses shown to the right of a response.
	
There were 18 responders, in spite of the crazy timing.
	
I have interpreted and aggregated some of the results, in hopefully an appropriate fashion.
It was hard, because there were a lot of answers, covering a lot of different
interpretations - that suggests I could do a better job
of preparing the online lesson, so it is more focused.
	
##WEEK 7 – CREATING FORMS	
	
###What do *you* think the most important takeaways are from this lesson?	
	
- Many different ways to do the same thing	5
- building fields	2
- Data Transfer Buffer	2
- Sessions	2
- Adding data to forms	
- Basic Forms	
- CI Input and Form Validation classes	
- creating custom form helpers	
- Data binding	
- Data in object form	
- Difference between traditional form handling and CI form handling	
- Form	
- Forms can be styled with CSS	
- helper class	
- how to use object with the html form	
- HTML helper functions	
- It's up to us where we want to put most of our code for form creation. More HTML or more code. If we prefer CI's help, then more code.	
- Passing data in codeigniter (data transfer)	
- That there is a CI framework to handle form validation and there will be an easy way through CI to create a form view nicely. Also, introduction to the use of Session variables to keep data throughout the user's session. In this case, to hold form inputs.	
- Using codeigniter's helpers (HTML helper, Form helper, etc)	
- Using our own helper	
- very good sample code and explanations to go with them. Helped understand CI forms better.	
- What About Error Handling?	
- You are able to generate forms using straight up html	
	
	
	
###What are topics from the lesson that *you* feel need more or better explanation?	
	
- More details as to the pros and cons of each method	3
- Data Transfer Buffer	2
- Form helper	2
- More example of custom helper.	2
- Are there any limitations to using CI to help create forms?  
_ The biggest two I have noticed are the clunkiness of dealing with multi-part
form elements (like radio buttons or comboboxes) and its poor integration with
CSS and Javascript frameworks (for styling and client-side logic) _ 
- buiding fields	
- Database integration in forms	  
_ Coming next week's lab _
- For editing the forms created with CI, would using the CSS be any different than for forms created manually with HTML?  
_ If using the CI form helper, much of the form would be regenerated dynamically.
That could make "editing" awkward. _	
- how do you add inline css styling with the form helpers or if you wanted to add some classes to the input fields	  
_ Use the last parameter in the form helper functions (for custom attributes),
or use my formfields helper or something similar _
- Session library	  
_ in class today _
- When generating the form, it it possible for the generated form to follow specific css rules?	
- when to use what version of the Sessions, and why?  
_ Versions ... as in which storage mechanism to choose? Files are easy to setup,
easy to cleanup, and don't need a DB engine. Database storage suits high
volume sites, but messy to cleanup. _

	
###Are there other, related, questions that you would like addressed in class?	
	
- Are the surveys meant to be split like for the lesson notes?  
_ I try to come up with two online lessons per week, each with its own survey.
I didn't get them completed in a timely fashion, but the surveys were
setup ahead of time. _
- creating forms  
_ Demo/questions in class _
- Database  
_ Not directly related. Lab next week will address this _
- Form rest method  
_ **Not clear what your question is** _
- the code examples on the side kept getting cut off (not sure if this was only for mac os)  
_ I know, sorry. I didn't have time to edit & fix that.
For the most part, they are meant to be a foil for explanations, and
all the code is in the example-forms repo. _
- using own helper

	
###Do you have comments or suggestions about the flipped learning process?	
	
- The link for the slide is broken, but can be accessed if manually typed.	3
- actual demonstration	
- More group work	


##WEEK 7 – HANDLING SUBMITTED FORMS	
	
Interestingly, 8 students found the previous term's presentation, and completed
this survey. The organizer link to the lesson was purposefully crippled, as the
lesson content had not been updated yet.

###What do *you* think the most important takeaways are from this lesson?	
	
- $this->session->userdata and set_userdata
- CI can handle validation and error handling for forms
- CI provides flashdata and session library to adhere to the data transfer buffer design pattern.
- CI provides input class to allow for input filter.
- Code structure
- form validation class and its functions
- Good examples
- Great example to show the basics of handling a form
- Handling input in codeigniter
- Proper form validation
- Transferring data in codeigniter (data transfer)
- You can access the data passed from the form within the controllers in CI
- You can use sessions to store form data so it is not lost if the form was rejected.

###What are topics from the lesson that *you* feel need more or better explanation?	
	
- Is it bad to store the form data in a session if the data contains things such as a password?    
_ Session data is stored on the server, hence reasonably secure.
Having said that, if you are performing CRUD, then the password would have to be
stored in the session to avoid rekeying it if a page had to be presented and
handled several times to remove errors._
- More about sessions, what are they? what are they used for?
- more detailed examples/ different use cases would be great
- More situational explanations   
_ The above three are dealt with in the "proper" version of this lesson,
and the example repo that accompanies it._
- Would validating forms using ajax or javascript be difficult to implement with CI?   
_ The answer to this will be revealed today in class :) _

###Are there other, related, questions that you would like addressed in class?	
	
- how would you delete the session->userdata? would you just set it to NULL again ?  
_ unset($_SESSION['whatever']) or $this->session->unseret_userdata('whatever') _
- Sessions vs Cookies  
_ A cookie is used to hold the CI session key. Session data is kept server-side.
It **is possible** to use cookies to store data client-side, but you are
likely to be "fired" for doing so, because of data exposure. _

###Do you have comments or suggestions about the flipped learning process?	

- Cannot open the material for this lesson  
_ See note above. _
- I hope I answered the right parts of each survey since it wasn't really specified aside from the headers in the notes. I manually typed in the url of the lesson and then went to d2l to find the surveys.  
_ See note above. _
- I put all i had in the other Form survey, didnt realize there was 2!  
_ See note above. _
	

