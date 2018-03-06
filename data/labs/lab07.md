#Lab #7 - Unit Testing for Our TODO List Manager
COMP4711 - BCIT - Winter 2018

##Lab Goals

The purpose of this lab is to add unit testing to our TODO List webapp.

We will continue to use gitflow workflow. That means proper branching (master/develop, 
with "develop" merged into "master" just before completion and submission),
completing new work in feature branches (which are throwaway branches, named
"feature/xxx" and merged into "develop" once acceptable), and good commit comments
(to provide a sense of what was done, from looking at the commit history).

##Lab Teams

Use the same "Lab 5-7" team as for the last lab, unless you were a team of one.
If the latter applies, you need to find a classmate who did not join
a team for the last lab, or combine with an existing team of two.
See me in lab if this applies to you.

##Lab Submission

This lab will result in an updated github repository for your team, as well as one for each team
member. You are welcome to use the same repository as last lab, if you are building on it.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository. 

Note: this is not a cloning URL, and I do not need links to the individual
team member repos.

Due: this coming Sunday at 17:30.

##Lab Marking Guideline

A marking rubric will be attached to the lab 7 dropboxes, similar to our
earlier labs. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

##Process

You should already have a team and repo, with suitable roles for the team
members. I don't think you need more direction on this :-/

Make sure that you **merge your develop branch into your master** at the end of the lab.

##Github repository

In your starting Github repo for this lab, make sure that all earlier work has been merged into your
*master* branch before starting this lab, so that your *develop* branch
is "clean".

##Starting Point

Your repository from last week should have role-based maintenance
and persistent data, which will be our starting point..

##Your jobs

1. Install phpunit on each team member's system ...
https://phpunit.de/manual/6.4/en/installation.html

    If you use [composer](https://getcomposer.org/)
    to install it, doing so inside a project lets you use a different
    version of PHPUnit for different projects, while installing
    the tool as a composer dependency in your user account gives
    you the same version of PHPUnit for all your projects.

    If the first case, you would run it as `vendor/phpunit` from your
    project root, and in the latter, you would run it as `phpunit` 
    from your project root :-/

    If you are using a global PHPUnit instance, make sure it is compatible
    with the version your lab instructor is running. Jim, for instance,
    has version 6.1.3 installed. If you are using a project instance
    of PHPUnit, make sure that is clear in your readme, so that
    we do a composer update before testing your code.

2. Build a Task entity class, with setter methods for each property.

    This class should have "magic" setters (`__set`), so that 
    you should not need to change anything else that uses tasks already :)
    This comes from http://php.net/manual/en/language.oop5.magic.php

    Here is an example of this ...

        class Entity extends CI_Model {

            // If this class has a setProp method, use it, else modify the property directly
            public function __set($key, $value) {
                // if a set* method exists for this key, 
                // use that method to insert this value. 
                // For instance, setName(...) will be invoked by $object->name = ...
                // and setLastName(...) for $object->last_name = 
                $method = 'set' . str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));
                if (method_exists($this, $method))
                {
                        $this->$method($value);
                        return $this;
                }

                // Otherwise, just set the property value directly.
                $this->$key = $value;
                return $this;
            }
        }

    The lab 5 starter has `application/core/Entity.php`, which might be useful as a starting point.

    Note that PHP entity classes differ from JavaBeans: 
    - in PHP, use a getter method if you want to over-ride the visibility
    of an attribute (eg `getDateofbirth()` where the `dataofbirth` attribute is private), 
    or to infer an attribute (eg `getAge()`, where the value returned is calculated from the date of birth)
    - in PHP, you only need setters if you want to enforce some business or
    validation rules; you can still assign values directly (eg `$customer->name = 'George');`,
    but any setter method will be automatically invoked
    - variable visibility rules still apply, so that a private attribute `$customer->name` can
    only be referenced through a magic getter or setter, but not directly otherwise
    - Java programmers: you are not in Kansas anymore!

3. Add a `tests` folder to your repo. It will hold the unit test classes
and a bootstrap file (`public/index.php` renamed to `Bootstrap.php`

4. Add a `phpunit.xml.dist` to the root of your project ...
https://gist.github.com/slav123/554d0a4ce91c8a0a68fe

5. Add a `TaskTest` class to verify that your task entity accepts
property values that meet the form validation rules, and
rejects ones that don't.

    See https://gist.github.com/slav123/f4014b4f3a6366de19eb for an example

    Translation: add setter methods for any property you want to apply a rule
    to, and make sure that you have appropriate methods in your test case.

6. Add a `TaskListTest` class to verify that your collection of tasks
has more uncompleted tasks than completed ones. This is an arbitrary business rule
which is an excuse to have more than one test.

    Translation: add test case methods, with meaningful names, that do not
    necessarily correspond one-to-one with object properties.

7. Make sure that you can run and pass the unit tests, and generate the code
coverage report, in a git ignored subfolder inside `tests`.

8. Add a `travis-ci` configuration file to your repo, enabling unit tests
as part of every PR submitted. You might want to check the
[Travis CI Getting Started](https://docs.travis-ci.com/user/getting-started/) guide. 
In fact, each team member should read this!

#Enterprisey Patterns

The reason we are doing the unit testing, is to make sure
that we have robust entity models, regardless of the
origin of data. The drawing below illustrates that.

<img src="/pix/labs/entities.svg" width="800"/>

Form validation rules are used for validation, as part of handling
submitted forms.

Schema validation, with a separate `.xsd` file, is used
for validating incoming XML requests to a RESTful
or XML-RPC endpoint.

Our entity classes are the last line of defense, and
might be on a different server in a large enough enterprise.
We do not want to trust the other system components
that feed us data.
