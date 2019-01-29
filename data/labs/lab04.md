# Lab #4 - Working With Controllers & Routing
COMP4711 - BCIT - Winter 2019

## Lab Goals

The purpose of this lab is to help you explore and practice some of the controller 
strategies and routing techniques for CodeIgniter. 

We will continue to use gitflow workflow, with the new twists of 
GPG signing and simple issue tracking.

## Lab Teams

This week, we want teams of two or three, which should mean crossing
option project boundaries. Each team should have at least one person
who has not had the "captain" role before.

Teams of one are *not* acceptable. This is partly about collaboration, after all.

If you miss the lab, you will end up being a defacto team of one, completing
the tasks yourself before the submission deadline.
This will let you earn some of the lab marks, but none of those for collaboration.

Choose a captain; the other team members will be mates.
The captain might undertake some of the "mate" jobs too.

## Lab Submission

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository
(not its cloning URL). 

Due: this Sunday at 17:30.

## Lab Marking Guideline

A marking rubric will be attached to the lab 4 dropboxes, similar to our
earlier labs. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

I will be looking at the features in your submitted webapp, to see if you
succeeded at fixing it per spec, in spite of the process; and I will
be looking at the repository, its forks, commit history, and issue
history; to determine how well you followed the collaboration process.

# The Lab:

We're going to setup a super simple app to provide RESTish
controllers for a student information system.

### Mock models

Make some mock models for "students" and "classes",
in ``app/Models``.

Each will have a protected ``$data`` array, with dummy data,
and two methods, ``find($id)`` and ``findAll()``, which return
a single record or all of them.

You can extend CodeIgniter's ``Model`` or not.

Sample mock data, for a "fruits" model:

    $data = [
        'banana' => ['id'=>'banana', 'description'=>'Soft, pulpy fruit', 'color'=>'yellow'],
        'apple' => '['id'=>'apple', 'description'=>'Round fruit grown on trees', 'color'=>'red']
    ];

Your data should have 3-4 records for each "model".

### Resource routes

For each model, add a [resource route](https://codeigniter4.github.io/CodeIgniter4/incoming/routing.html#resource-routes).

### Resource controllers

For each resource, add a controller of the same name, with methods per resource routing.

"Use" the [API response trait](https://codeigniter4.github.io/CodeIgniter4/outgoing/api_responses.html)
to make it easy to return data, or failure responses.

Implement each controller's ``index()`` and ``show()`` methods, properly.
The other resource methods should return errors.

### Testing

Make the "app" testable, with links sufficient to demonstrate compliance (i.e. all
possible responses) on either a landing page or the homepage.

### Collaboration

Of course, gitflow workflow is expected!
