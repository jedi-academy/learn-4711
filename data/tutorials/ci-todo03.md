#Job 3 - Ordered List Page Features

_Part of COMP4711 Lab 5, Fall 2017_

We want to present a two-column layout, with the left side showing
tasks ordered by priority (high to low), and the right side showing
tasks ordered by category (alphabetically).
We will need a controller, layout template, and view fragments for this.

#A. Setup the second template

Copy <code>application/views/template.php</code> to another view file,
<code>template_secondary.php</code>. 

The big change here is that we intend to have two panels 
making up the page, split evenly. Bootstrap can do that :)
Drawing on your COMP1536 memories, we can setup this template
so that the `<body>` has two columns, side by side at large
window sizes and stacked at smaller window sizes.

    ...
    <div id="content">
        <h1>{pagetitle}</h1>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                {leftside}
            </div>
            <div class="col-lg-6 col-md-12">
                {rightside}
            </div>
        </div>
    </div>
    ...

#B. Make a controller for this page

Change the menu link for "Work" to refer to "/views".
This is in `applicaiton/config/config.php`.

We need a controller to load this view. It will start out similar to
our original `Welcome`, but named `Views` to match the navbar link.

    class Views extends Application
    {

        public function index()
        {
            $this->data['pagetitle'] = 'Ordered TODO List';
            $tasks = $this->tasks->all();	// get all the tasks
            $this->data['content'] = 'Ok'; // so we don't need pagebody
            $this->data['leftside'] = 'by_priority';
            $this->data['rightside'] = 'by_category';

            $this->render('template_secondary'); 
        }

    }

If you provide empty `views/by_priority.php` and `views/by_category.php` view files,
the page will render without errors, but without any task lists.

#C. Fix another base controller hiccup

Let's add a simple title to each of these ordered views, so we can get a 
better feel for the layout.

    <h3>Tasks by Category</h3>

And we get... ohoh, the same thing as before !?

Note: the bug in question might have been accidentally fixed in your starter :-/

We uncovered a bug in the base controller :(

Inside `Application:render()`, we had 

    $this->parser->parse('template', $this->data);

and it should have been

    $this->parser->parse($template, $this->data);

Fix this, and... ??

<img class="scale" src="/pix/tutorials/todo/54.png"/>

The two bits of text should be side by side, but I had issues with the CSS
styling for that, and we may have to live with stacked.

Having two panels in the layout is a natural case for having
each panel rendered by a separate method in our controller.
We have already extracted the complete list of tasks, and can pass that
as a parameter to avoid extra work.

    $this->data['leftside'] = $this->makePrioritizedPanel($tasks);
    $this->data['rightside'] = $this->makeCategorizedPanel($tasks);

Now we have two smaller, but similar problems to solve.

#D. Flesh out the prioritized view

We can exploit the table we used on the homepage, to adjust the panel
views to suit our purpose. For instance, the `by_priority.php` view
would look like

    <h3>Tasks by Priority</h3>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Task</th>
            <th>Priority</th>
        </tr>
        {display_tasks}
        <tr>
            <td>{id}</td>
            <td>{task}</td>
            <td>{priority}</td>
        </tr>
        {/display_tasks}	
    </table>

Now, all we have to do is have our panel making method build the list of relevant
tasks in the right order, and pass it as a view parameter.
Here's a start:

    function makePrioritizedPanel($tasks) {
        $parms = ['display_tasks' => []];
        return $this->parser->parse('by_priority',$parms,true);
    }

We need to extract the outstanding tasks, order tham by 
priority, and pass those as a view parameter.

Extracting the undone tasks is similar to what you saw in `Welcome`..

    function makePrioritizedPanel($tasks)
    {
        // extract the undone tasks
        foreach ($tasks as $task)
        {
            if ($task->status != 2)
                $undone[] = $task;
        }
        ...

For sorting these, we can use a [user-defined sort function](http://ca3.php.net/manual/en/function.usort.php),
the "PHP way". This function behaves similar to `compareTo` in Java, and it
is defined outside of the class braces. So, at the bottom of our Views class, below the last
brace:

    // return -1, 0, or 1 of $a's priority is higher, equal to, or lower than $b's
    function orderByPriority($a, $b)
    {
        if ($a->priority > $b->priority)
            return -1;
        elseif ($a->priority < $b->priority)
            return 1;
        else
            return 0;
    }

inside `makePrioritizedPanel`, we can now perform this sort...

    // order them by priority
    usort($undone, "orderByPriority");

and we should replace the priority code with the appropriate name...

    // substitute the priority name
    foreach ($undone as $task)
        $task->priority = $this->app->priority($task->priority);

The objects need to be converted to associative arrays, to use as view parameters...

    // convert the array of task objects into an array of associative objects		
    foreach ($undone as $task)
        $converted[] = (array) $task;

and we are finally ready to pass those to the template parser as a parameter.

        // and then pass them on
        $parms = ['display_tasks' => $converted];
        return $this->parser->parse('by_priority', $parms, true);
    }

Long-winded, to be sure, but I hope it makes more sense now that the code
you have seen over the last few weeks :) Your results should look something like:

<img class="scale" src="/pix/tutorials/todo/55.png"/>

#E. Flesh out the categorized view

The categorized task panel can be handled very similarly, but let's put the logic
inside out `Tasks` model, so you can see the difference.

Remember how the `makePrioritized` method was getting a bit long? Here is the 
`makeCategorizedPanel` method, with the bulk of the logic inside a model...

    function makeCategorizedPanel($tasks)
    {
        $parms = ['display_tasks' => $this->tasks->getCategorizedTasks()];
        return $this->parser->parse('by_category', $parms, true);
    }

Hmmm - we don't even need the `$tasks` parameter, since we are calling the
`$this->tasks` model instead.

We will need to add a method inside `models/Tasks.php`...

    function getCategorizedTasks()
    {
        // extract the undone tasks
        foreach ($this->all() as $task)
        {
            if ($task->status != 2)
                $undone[] = $task;
        }

        // substitute the category name, for sorting
        foreach ($undone as $task)
            $task->group = $this->app->group($task->group);

        // order them by category
        usort($undone, "orderByCategory");


        // convert the array of task objects into an array of associative objects		
        foreach ($undone as $task)
            $converted[] = (array) $task;

	return $converted;
    }

The `Tasks` model will need its own sorting function after the class definition...

    // return -1, 0, or 1 of $a's category name is earlier, equal to, or later than $b's
    function orderByCategory($a, $b)
    {
        if ($a->group < $b->group)
            return -1;
        elseif ($a->group > $b->group)
            return 1;
        else
            return 0;
    }

And the `by_category.php` view, while very similar to the prioritized one, will need
to be tailored for this panel...

    <h3>Tasks by Category</h3>

    <table class="table">
            <tr>
                    <th>Id</th>
                    <th>Task</th>
                    <th>Category</th>
            </tr>
            {display_tasks}
            <tr>
                <td>{id}</td>
                <td>{task}</td>
       		<td>{group}</td>
            </tr>
            {/display_tasks}	
    </table>

Did it work? Did you get something like this...?

<img class="scale" src="/pix/tutorials/todo/56.png"/>

Decide for yourself where it makes most sense to perform data filtering
and conversion!

<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>

