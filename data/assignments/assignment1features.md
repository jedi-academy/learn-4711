#Assignment #1 - Features
COMP4711 - BCIT - Winter 2018

#DRAFT DRAFT DRAFT 

#Features

Your webapp doesn't have to be "world-class" or even necessarily "real", 
but it needs sufficient complexity to be dynamic, personalized and scaleable/integrated.

The theme this term is ...

##Your Data

There are x kinds of data to keep track of at this point:

...

##Your Usecases

...


###Homepage

...


###Catalog page

...



###About page?

If you want to add an "about" page, feel free to do so. 

If you do have one, I suggest clear wording to inform the user that this
is an academic project, and not related to, or endorsed by, any similar
business from the real world.

###Info

This is to be a "RESTish" service controller, returning your model data in JSON format, 
on demand.

...


##Your Presentation

Your webapp will be evaluated on its functionality, not on how good it looks. 
It is better to have a consistent design, with elements appropriate to the 
purpose, than it is to have a pretty design. 
Your "job" is to design and implement the back-end of such a site. 
That doesn't mean your site's appearance should be ugly or cringe-worthy - 
there are many freely available website templates online.

It would be appropriate to have some design, with visual elements appropriate
to your "business". Menu item images, for instance, might be added in the next
assignment

What I will be looking for is consistency. It should look like the
different parts of the site, which will likely be built by different
team members, share a similar look & feel!

Feel free to use any CSS/javascript frameworks you are familiar or comfortable 
with, subject to the constraints described next.

##Webapp Constraints

There shall be no PHP in your view source files.

You are welcome to use a third party templating engine, but without PHP in your view.

Remember the golden rules, especially case sensitivity!

##Webapp Components

You are probably stressing out by this point ... just how much do we
have to build for this bleep-bleep assignment?

You will have some configuration, probably `config/autoload` and `config/config`.

You will have **three or four controllers**, with any subcontrollers implemented as
methods. You can split these further in assignment 2 refactoring, if that
makes sense then.
You can use the base controller from the CI starter, just like in lab 3.

You will probably have **three models**, with your test data. These will probably only have a couple
of methods each at the moment: one to retrieve all the data and one to
retrieve a specific record. 



You will have a **view template**, and probably **view fragments** for the header, footer
and navbar (if not part of the header). Yes, this implies a consistent
layout for the whole app, at this point.
You will have view fragments, to support the pages above.

This could mean one of the team members piloting a controller, view
or model, and then the others doing the same thing for the others.
Alternately, you could assign workload according to component type.


Phew!

Wait a minute - what about smaller teams? the members of a smaller team will 
have a bit more to do individually, sorry - no break.

##Your Code

You are programmers, and you want to be professional. Code like it.

That means clearly written and formatted code, properly commented.
This applies specifically to classes, which at this stage will be
your controllers and models.

Your views should have no PHP in them.

Remember the golden rules!!! (Can't stress this enough, obviously)

##Cautions

Don't get carried away, spending days coming up with “perfect” design or content, etc.

This is a course assignment, not a job, and not an industry-sponsored project. 
It is a vehicle to learn how to use CodeIgniter to build a simple webapp, 
incorporating good practices.
