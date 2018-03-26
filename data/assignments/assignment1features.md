#Assignment #1 - Features
COMP4711 - BCIT - Winter 2018

#Features

Your webapp doesn't have to be "world-class" or even necessarily "real", 
but it needs sufficient complexity to provide useful practice for you,
and to be something you could add to a portfolio until you do have "real"
work to showcase your talents.

The theme this term is **accessorizing**. This means providing a catalog of equipment,
in several categories, that can be used to equip someone or something for a
specific activity, by choosing a set of equipment with one accessory from
each category.

An example: equipping your ducklings to play duckey. They would need a helmet,
breastplate, knee pads, and beak protector. For the unitiated, duckey is a team
sport where ducks slip and slide on ice, using their tails to whack a ball
of popcorn towards the opponent's nest, scoring points for getting the popcorn
into the nest.

This assignment will have you setup a plausible set of data, provide an
equipment set selection and viewer on your homepage, and provide
a catalog of the accessories in your database.

##Your Data

Your scenario will need three person or equipment attributes that
accessories are meant to enhance to diffrerent degrees.
In the case of duckey, you might choose protection, speed and weight.
Each accessory would have different values for these, some providing
better protection at the expense of weight, for instance.

In the data description below, (PK) and (FK) are used to denote uniqueness
and references to another collection, in much the same manner as you
would think of primary and foreign keys in an RDB or ERD context,
but without implying that you have to use an RDB.

There are 3 kinds of entities to keep track of at this point:

###Categories

Devise four or five equipment categories that will be used to build
equipment sets. Each should have a code (PK), and a name or description.

The intent is that a complete equipment set will have one accessory
from each category.

###Accessories

Devise a list of accessories, with at least two for each category. 
More are fine too. Each will have a code (PK), description, category
(FK), and then properties for the attribute modifiers for the accessory.

For instance, your breastplates might include a titanium one with attributes
10, 10 & 10; and a cast iron one with attributes 100, -50, 100;
for protection, speed & weight, respectively.

###Equipment Sets

You need to record the sets that have been saved, whether complete or not.
Each set would have at most one accessory from each category.

This could be modeled as _(setid, catcode, accessorycode)*_ or as
_(setid, cat1accessorycode, cat2accessorycode, cat3accessorycode)_,
for example.

Your data should contain two sets, at least one of which is complete.

###How do we store these?

My recommendation: use CSV data files, with your models
extending CSV_Model from the CI starter4. 

Think RDB and data analysis, from your other earlier courses.
Each "table" would be a separate CSV file, created using a
spreadsheet tool initially. The first row would contain
column names, which will become property names when
made available to your app. Second and subsequent rows provide
the data for each record.

##Your Usecases

Your app has two conventional usecases for assignment 1:
"view an equipment set" and "view the accessory catalog".

###Homepage

Your homepage (or landing page) is intended for the
equipment set view.

It should present a selector (drop-down?) to let the user
chose from the available saved equipment sets. Once one
is selected, the app should then present an image of a player
equipped with the accessories from that set.

The selector could be a stock HTML form, with the dropdown and
a submit button linking to a sub-controller method which
built the equipped view; or it could have some Javascript
attached, to pull down the appropriate pieces through AJAX
calls.

The equipment set rendering shall be an appropriate person or thing,
with the selected accessory images overlaid on top.


###Catalog page

Youy accessory catalog should be presented as a grid,
with each accessory category starting on a new row.

You might choose to have 2-4 accessories per row, depending
on your accessory presentation. Each should show the code, name, image
and modifier attributes.


###About page?

If you want to add an "about" page, feel free to do so. 

If you do have one, I suggest clear wording to inform the user that this
is an academic project, and not related to, or endorsed by, any similar
business from the real world.

###Info

In addition to the two usecases above, you need an "info" controller.
This is to be a "RESTish" service controller, returning your model data in JSON format, 
on demand.

This is super useful for testing.

It will need four methods:
- `index()` should return a description of your scenario, eg. {"scenario":"Duckey player"}
- `category($key)` should return the designated category, or all of them if none is specifically requested
- `catalog($key)` should return the designated accessory, or all of them if none is specifically requested
- `bundle($key)` should return the designated category, or all of them if none is specifically requested

Using categories as an example, the URI `/info/category` would return all categories as a JSON document,
and `/info/category/abc` would return the data for just the one.

ps - I chose the name "bundle" to avoid a method called "set", possibly implying some form
of mutator method.


###Navigation?

You should provide a menu or navbar, making it easy to switch between
your pages. More pages will be added in assignment 2, notably maintenance
and equipment set building.

Do not provide for user authentication or roles - that will also come
in assignment two.

##Your Presentation

Your webapp will be evaluated on its functionality, not on how good it looks.
Well, unless the look is so awful that it detracts from usability!
 
It is better to have a consistent design, with elements appropriate to the 
purpose, than it is to have a pretty design. 
Your "job" is to design and implement the back-end of such a site. 
That doesn't mean your site's appearance should be ugly or cringe-worthy - 
there are many freely available website templates online.

It would be appropriate to have some design, with visual elements appropriate
to your "business". Menu item images, for instance, might be added in the next
assignment

What we will be looking for is consistency. It should look like the
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

You will probably have **three models**, with your test data. 
If you use one of the provided base models from 
starter3 or starter4, your models won't need any additional methods for
this assignment :-/ If you don't use one of the base models, you
will need to provide methods to retrieve some or all the records
from a collection.

You will have a **view template**, and probably **view fragments** for the header, footer
and navbar (if not part of the header). Yes, this implies a consistent
layout for the whole app, at this point.
You will have other view fragments to support the pages above.

This could mean one of the team members piloting a controller, view
or model, and then the others doing the same thing for the others.
Alternately, you could assign workload according to component type.

A labor division that has worked well in the past: having one subteam
focusing on the "front-end" (views) and one focusing on the "backend" (controllers/models).
The captain would ruthlessly enforce the team agreement, gitflow, and
defect uncovering.

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
