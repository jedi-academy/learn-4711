#Assignment #1 - FAQ
COMP4711 - BCIT - Fall 2016

## How elaborate should our database be?

You can build a simple database, with relationships handled in code,
or you can build a more elaborate one, with foreign keys for relationships.
It is up to the team and its comfort level with database design.

## Do we have to use XML data?

There is no requirement for that in the assignment.

Having said that, it would seem appropriate as a way to represent sales data
flexibly. Personally, I find it easier to model that using an XML document
per sales order, with variable/flexible structure, rather than figuring out
and setting up multiple tables to handle the different kind of stuff
that would go into an order.

The choice is yours.

## Should we specify the backend virtual host name?  

Excellent idea - that will make marking easier :)

Please use <code>backend.local</code> as the domain of the webapp with
your RESTful controller.


## Any advice for wise time use?

- Convert your mock data to real RDB tables
- Work on the usecase functionality and maintenance separately
- Don't worry about teasing apart your app into frontend and backend until it
works as a single, unified app. The split would be the last major development
step.

## Rubric complete?

Not yet, sorry.

## Given the late feedback so far, will we see the results from this assignment before Easter?

Yes. We work to a hard deadline of Dec 19th for marks submission, so everything
will be properly graded before then.

## Guidance for our homepage/dashboard?

Now that your app will have real data, the dashboard should show a summary
of that. This will involve iterating over RDB tables for some of it (eg we
have $24.65 worth of stock in our pantry) and some will involve processing the
log files (eg. we sold $123.45 worth of stuff, or our best seller by volume
is the Big Mac).

## Case sensitivity?

Yes, you need to worry about case sensitivity!

I am using git for the CodeIgniter site deployment, but my deployment/testing script is 
still being refined and tested for general use and not ready yet. I don't think it will be 
in place in time to help with this assignment :(