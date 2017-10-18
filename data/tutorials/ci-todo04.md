#Views - Making the Maintenance page

_Part of COMP4711 Lab 6, Fall 2017_

<div class="alert alert-info">
This assumes that you have completed lab 5!
</div>


#Job 4 - Maintenance List

We have some ordered & excerpted lists of the todo items already, but they're not quite
appropriate for maintenance (we want task id sequence), and we want to use
view fragments for each item, for flexibility.

Lab 5 left us with a `Mtce` controller, with placeholder content.
Let's fix that :)

##4.1 Basic item list

With view fragments, we will end up with a view assembly fragment for the list as a whole,
and a separate view fragment for each item. We will build the item views (rows)
one at a time inside our controller, and pass the result as a view parameter
to the list view.

Let's tackle the view assembly first. You won't be able to properly test the changes 
until mentioned, as they are inter-related.

Copy `views/by_category.php` to `views/itemlist.php'. It is a good starting point.

We should display "Status" instead of "Category", and we don't need a header.
Reflecting these minor changes, your `itemlist` should look like:

    <table class="table">
            <tr>
                    <th>Id</th>
                    <th>Task</th>
                    <th>Status</th>
            </tr>
            {display_tasks}
            <tr>
                    <td>{id}</td>
                    <td>{task}</td>
                    <td>{status}</td>
            </tr>
            {/display_tasks}	
    </table>

The `index` method of our `Mtce` controller can then be fleshed out a bit,
drawing on the code in `Views` as an example, but simplifying.

    class Mtce extends Application {

            public function index()
            {
                    $this->data['pagetitle'] = 'TODO List Maintenance';
                    $tasks = $this->tasks->all(); // get all the tasks

                    // substitute the status name
                    foreach ($tasks as $task)
                            if (!empty($task->status))
                                    $task->status = $this->statuses->get($task->status)->name;

                    // convert the array of task objects into an array of associative objects		
                    foreach ($tasks as $task)
                            $converted[] = (array) $task;

                    // and then pass them on
                    $this->data['display_tasks'] = $converted;
                    $this->data['pagebody'] = 'itemlist';
                    $this->render();
            }

    }

Now you can test the changes. The result after making these changes:
<img class="scale" src="/pix/tutorials/todo/61.png"/>

##4.2 Individual item view fragments

Instead of using the "variable pair", we want to build the table
row for each item inside our controller, so that we can choose
different presentation later.

Again, you won't be able to test the next three changes until they have all been made.

Extract the table row part of `itemlist` and save it in a new view, `views/oneitem.php`...

    <tr>
            <td>{id}</td>
            <td>{task}</td>
            <td>{status}</td>
    </tr>

The `itemlist` view can now be simplified, by making `display_tasks` a single substitution
parameter...

    <table class="table">
            <tr>
                    <th>Id</th>
                    <th>Task</th>
                    <th>Status</th>
            </tr>
            {display_tasks}
    </table>

And now, instead of building an associative array of tasks, we can build
the actual output for those tasks instead, in our controller...

    // substitute the status name
    foreach ($tasks as $task)
            if (!empty($task->status))
                    $task->status = $this->statuses->get($task->status)->name;

    // build the task presentation output
    $result = '';	// start with an empty array		
    foreach ($tasks as $task)
            $result .= $this->parser->parse('oneitem',(array)$task,true);

    // and then pass them on
    $this->data['display_tasks'] = $result;
    $this->data['pagebody'] = 'itemlist';
    $this->render();

Now you can test your app again.
There is no change in the output, but it is being constructed differently.

This change will let us choose a different item view template if
the current user is allowed to make changes.

<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>
