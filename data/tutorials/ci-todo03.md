#Job 3 - Ordered List Page Features

_Part of COMP4711 Lab 5, Winter 2017_

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

If you provide empty `by_priority.php` and `by_category.php` view files,
the page will render without errors, but without any task lists.

Let's add a simple title to each of these ordered views, so we can get a 
better feel for the layout.

    <h3>Tasks by Category</h3>

And we get... ohoh, the same thing as before !?

We uncovered a bug in the base controller :(

Inside `Application:render()`, we had 

    $this->parser->parse('template', $this->data);

and it should have been

    $this->parser->parse($template, $this->data);

Fix this, and... ??

<img class="scale" src="/pix/tutorials/todo/54.png"/>

The two bits of text should be side by side. Well, I am going to defer solving that,
and work further with the panels that go inside the two column layout.

Having two panels, effectively, is a natural case for having
each panel rendered by a separate method in our controller.
We have already extracted the complete list of tasks, and can pass that
as a parameter to avoid extra work.

    $this->data['leftside'] = $this->makePrioritizedPanel($tasks);
    $this->data['rightside'] = $this->makeCategorizedPanel($tasks);

Now we have two smaller, but similar problems to solve.

#C. Flesh out the prioritized view

We can exploit the table we used on the homepage, to adjust the panel
views to suit our purpose. For instance, the `by_priority.php` view
would look like

    <h3>Tasks by Category</h3>
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

*****************************************************
I ran out of time here, and will continue elaborating this evening.

COMP4G: I suggest returning to this job once it is fixed.

<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>

