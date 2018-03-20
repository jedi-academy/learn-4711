**Week 10**  
Week 10 materials & lab 8 posted.

I added some notes about unit testing, in the supplementary section of the
organizer, for those interested.

**Planning**  
Lab 8 will be the last "regular" lab.  
We will spend the next two weeks helping you with assignment 2.
Its writeup is in draft form, and should be finalized tonight.  
Week 13 will have lab to address questions you have, in particular
about last term's final exam.

**Oops?**  
A number of recent labs are getting an error message...

    Message: Undefined property: Tasks::$app

The stacktrace leads back to line 17 of the `Tasks` model, which tries to get
the `app` property of the current model. That may not be accessible, and the workaround:

    class Tasks {
        private $CI; // use this to reference the CI instance
        public function __construct() {
            parent:__construct...
            $this->CI = &get_instance(); // retrieve the CI instance
        }
        public function getCategrizedTasks() {
            ...
            $task->group = $this->CI->app->group($task->group); // use CI to get at the app model
            ...
        }
    }
        