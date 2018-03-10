**Week 9**  
Materials & lab posted.

The unit testing primer is in place. This is not what you need to do for the lab -
it is an example of unit testing a model and a collection!

There is a note at the top of the primer, pointing out that you will probably
need to add a magic getter (`__get()`) to your `application/core/Entity` class,
in order to have access to all of your model properties.

Some groups have reported issues with this, namely that their unit tests pass but the
webapp no longer works as expected. That shouldn't be the case, and I suspect
some expected CI code not executing when we invoke it from the command line.

Worry about passing the unit tests - we will not be running the app!
This is a good opportunity for me to say a few words about mock
objects for unit testing, but after the break :)

**week 8**  
Materials posted.

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

**FWIW**

Our [Jedi Academy](https://github.com/jedi-academy) has [competition](https://www.the-force-academy.com/en/)?
