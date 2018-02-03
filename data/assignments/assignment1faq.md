#Assignment #1 - FAQ
COMP4711 - BCIT - Fall 2017

## Do we need a database?

**No**. The data you work with will be 
"mock data" that you create.

There should be **no relational database** used for this assignment.
I want to defer that discussion until we have addressed models and views
in class and lab.

Put even stronger, my marking script will not setup a database for your app
to use!

Looking forward, my plan is to not allow your apps to use a relational
database at all!

## Is there a repository that you fork to start the project?  

No.

I suggest you create an empty team repo, and *download* either the CI starter2 
or starter3 to add to it, like you did for lab 3.

I do not recommend forking any of the CI starters, but *if* you do, remember to rename them!

You only need starter2 for assignment 1, but you will find starter3 adds MY_Model, 
which *might* in assignment 2, depending on how the RDB strategy evolves.

You don't *have* to use the template parser. You could use a third party templating engine
or conventional views. Just remember that PHP script in your view files will cost you marks.

## How do we calculate distance between two airports?

Suggestion: http://www.geodatasource.com/developers/php

## How do we interpret the data fields from WACKY/info/...?

###airlines ... 26 of them, corresponding to D2L groups

- id: unique identifier, corresponds to group name in D2L
- base: airport identifier; your airline's base airport
- dest1, dest2, dest3: airport identifiers; the only places you are allowed to fly to

###airports ... the BC airports with IATA codes; some have an airline based there

- id: unique identifier; referenced by other data
- community: common name of the municipality where this airport is
- airport: proper name of the airport
- region: one of 9 regions in the province, per EnvBC; think of it like zones for future fare calcs
- coordinates: latitude & longitude, encoded
- runway: paved runway length, in metres
- airline: identifier of airline based at this airport

###airplanes ... a hand-picked set of airplanes you are allowed to buy for your fleet

- id: unique identifier, within allowed types
- manufacturer: who makes this
- model: manufacturer model code or description
- price: airplane cost, in $ thousands
- seats: # of passenger seats
- reach: airplane flight range, in kms
- cruise: average cruising speed, in kph
- takeoff: minimum runway length needed, in metres
- hourly: hourly operating cost, in $

##Getting model data

Q: Do i need to provide functions for retrieving individual flights and airplanes from the fleet?

A: If your models are patterned after the Quotes model from lab 4, that has all() & get() methods to retrieve individual collection elements.

##Controller types

Q: in some of the labs we extended Application as opposed to CI_Controller, what is the difference between the two?

A: A controller extending Application is a "normal" one, i.e. intended to return a 
webpage using view templating. A controller extending CI_Controller is anything else, 
i.e. a controller not intended to return a webpage

##RESTish controller methods

Q:  I'm reading the requirements and it says that info should be a controller with subcontrollers for airplanes that return the data as JSON.

In the notes it says that "index() is the default handler and other public methods 
are treated as subcontrollers".  Does this mean that under the Info controller, 
I should have methods for `fleet()` and `flights()`and so forth?  

A: Yes

In the case of the RESTish controller for the assignment, that controller's index() 
method is not used. I would have it return a "403" kind of message, i.e. not allowed on its own
