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

**Note**: I fixed the code coverage section in the primer, which was only partially done
when I was feeling under the weather.
