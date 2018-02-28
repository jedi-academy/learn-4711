**week 8**  
Materials posted.

**_Typo?_**  
There was a question about whether step 8.1 had a typo, with `action='{completer}'>`,
seeing as the `View` controller had a `complete()` method.  
No - "completer" is a view substitution parameter, filled in inside
`makePrioritizedPanel()` about 9 lines below the questioned
line in the tutorial.

**_Http Authentication error?_**  
A number of Windows-using students
reported getting an "HTTP authentication failed" error whenever they pushed
to their repo in lab today, and they had to re-enter their credentials.
Bottom line ... Github updated their credential strength a few days ago,
dropping support for TLSv1.
Windows users may need to update their Windows Credential Manager
or even re-install the newest Git client (version 2.14.3 IIRC).
Alternately, github.com suggests removing and re-adding your keys on github.com,
and possibly doing the same in your local keystore.

**_Curious data at tail of tasks.csv?_**  
A student group pointed out today that the todo item update code,
specified in the tutorial, seems to end up with the last record
in the `tasks.csv` file containing an extra column, with
the label from the submit button as its value ('Update the TODO task').
This is strange indeed, and probably comes from merging the
input fields with the data transfer object. Why the label is part
of them isn't clear yet, but it does not impact the todo list
data, so not to worry :-/

**FWIW**

Our [Jedi Academy](https://github.com/jedi-academy) has [competition](https://www.the-force-academy.com/en/)?

**Week 6**  
Reading & presentation posted. 
This week's lab has been posted.

**Assignment 1**

I have updated the starter4 repo ... actually removed some code that should
have been experimental (I got carried away, sorry).

The assignment FAQ, in the "assignments" tab below,
is being updated regularly, as more questions come in.
