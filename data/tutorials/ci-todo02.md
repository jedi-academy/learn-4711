#Job 2 - Homepage Features

_Part of COMP4711 Lab 5, Winter 2017_

<div class="alert alert-info">
This assumes that you have already setup your repo and database properly, per Job 1.
</div>

#Preview

We have the beginnings of our webapp, and a database, but there is no functionality
behind the scenes. This tutorial will have us setup the homepage.

The "views" lesson showed a multiple layout image:

<img class="scale" width="736" height="552" src="/pix/lessons/5/5-11.jpg"/>

Referring to this image, our welcome page will  use a "home" layout,
our Work page will use a "secondary" layout, our Maintenance page
will switch between two layouts, and
our Help Wanted page will use a "generic" layout.

#A. Base controller tweaking

Out-of-the-box, our base controller is setup for view templating:

    function render($template = 'template')
    {
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->parser->parse('template', $this->data);
    }

It provides for a layout, as a "$template" parameter. 
Let's use that layout template parameter, defaulting to the value
'template' if not expressly provided. The templating will be no different
than the original, unless we over-ride the parameter in one of our
controllers.

Let us make our rendering more
flexible, by only using the 'pagebody' fragment if we haven't already
built the content to used in a layout.

These two enhancements will leave our base controller's `render`
method looking like:

    function render($template = 'template')
    {
        $this->data['menubar'] = $this->parser->parse('_menubar', $this->config->item('menu_choices'),true);
        // use layout content if provided
        if (!isset($this->data['content']))
            $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->parser->parse($template, $this->data);
    }

Now we can over-ride the layout, on a page by page basis, and we have the option of
providing pre-rendered "content".

ps - Change the 'pagetitle' view parameter, in the base controller's
constructor, to reflect your team name!

#B. Our homepage - beginnings

Our homepage is intended to show summary information (the number of tasks
outstanding) and then the latest five.

**View construction** refers to how we build the panels that will make up the page,
while **view assembly** refers to using a template to arrange the page's panels
according to some sort of layout. If we want to arrange elements inside
a panel, that is best done with CSS styling, in accordance with the principle
of "separation of concerns". This line will get blurred, for sure,
but if we start out "properly", it will be easier to keep these different
view aspects separate.

Let's use the template parser to construct the homepage content, without using view fragments.

We will start with counting and showing the number of remaining tasks.

I suggest planning the view first, and then making sure that our controller
passes appropriate view parameters to it.

We can use an "alert" to present this so it stands out, by adding the following
to `views/homepage.php`:

    <div class="alert alert-info">{remaining_tasks} tasks are left to do!</div>

We can determine the # of tasks remaining by iterating through the tasks and
counting those whose status is not "2" (determined by checking the table data).

This could be done in the model, or in the controller. I suggest using the controller,
so that we can build the second part of the homepage display in the next step.

That will mean a bit of code in our `index()`...

    $tasks = $this->tasks->all();	// get all the tasks

    // count how many are not done
    $count = 0;
    foreach($tasks as $task) {
            if ($task->status != 2) $count++;
    }
    // and save that as a view parameter
    $this->data['remaining_tasks'] = $count;

Try it. You can play with the styling if you want the message to stand out more.

<img class="scale" src="/pix/tutorials/todo/51.png"/>

#C. Our homepage - details

We want to add the latest five tasks. Those will be the last five in the tasks table.

We can use an HTML table for this, and Bootstrap will style it nicely if we add
the "table" class to the `table` element. How does the following look for a start?

    <table class="table">
        <tr>
            <th>Id</th>
            <th>Task</th>
            <th>Priority</th>
        </tr>
    </table>

We need a row for each task...

    <tr>
        <td>{id}</td>
        <td>{task}</td>
        <td>{priority}</td>
    </tr>

Notice that I used the same substitution variable names as those in the table,
planning to make life easier in a few minutes.

And we should put that inside a repeating group...

    {display_tasks}
    <tr>
        <td>{id}</td>
        <td>{name}</td>
        <td>{priority}</td>
    </tr>
    {/display_tasks}

Now, all we have to do is fill in the data.

We have an array of the tasks already, `$tasks`, and PHP has a handy
`array_reverse` function we can use to order that the way we want to process it,
so...

    // process the array in reverse, until we have five
    $count = 0;
    foreach(array_reverse($tasks) as $task) {
        $display_tasks[] = (array) $task;
        $count++;
        if ($count >= 5) break;
    }
    $this->data['display_tasks'] = $display_tasks;

Oh dear - the priority shows as a code, and one might think that "1" is higher 
priority than "3". We should show the priority code text instead.
Perhaps not the best practice, but we can substitute the 
priority code's name for its value...

    foreach(array_reverse($tasks) as $task) {
        $task->priority = $this->priorities->get($task->priority)->name;
        $display_tasks[] = (array) $task;
        ...

Looking pretty good:
<img class="scale" src="/pix/tutorials/todo/52.png"/>


<div class="alert alert-success">
Synch, commit, push, merge, synch ... you know the drill.
</div>

