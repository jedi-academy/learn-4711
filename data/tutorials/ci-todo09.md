#Building Out the TODO List
_Part of COMP4711 Lab 6, Fall 2017_

#Job 9 - Role-specific maintenance list

The existing maintenance page shows a paginated complete list of tasks, which is great,
but we need a way to actually do CRUD maintenance.

The first step is to make sure that an owner sees links to the maintenance
activities.

- Create should be a link beside the pagination nav
- Read is done already
- Update can be enabled by making the task ID in the list a link to
the edit function for that item
- Delete will be deferred to the editing, i.e. only allow deleting an item
if the full item details are displayed.

NOTE: If you haven't already done so, change the links in `views/_menubar.php`
so that the roles are capitalized, eg "/roles/actor/Owner".

##9.1 New item button

We can add a new item link  to the right of the pagination nav by editing
ever so slightly the `Mtce::page()` method.

We don't want HTML inside our controller, so let's add a new `itemadd` view,
which contains the link or button (however we style it) to the pagination substitution
parameter.

    <a href="/mtce/add"><input type="button" value="Add a new todo item"/></a>

Adding this to the pagination is then a small tweak, which I show here in the
`page` method, just before its end ...

    // INSERT next three lines
    $role = $this->session->userdata('userrole');
    if ($role == ROLE_OWNER) 
            $this->data['pagination'] .= $this->parser->parse('itemadd',[], true);
    $this->show_page($tasks);

We don't really need to use the template parser, but it is consistent.

Try it. When you switch roles, the add button should appear or not, as
appropriate.
It doesn't link to a real controller method yet - that will be part of the next job.

<img class="scale" src="/pix/tutorials/todo/77.png"/>


Hmm - the new button shows up below the pagination nav ... a styling error to fix.


##9.2 Make the Task ID a link

We have a view fragment to show a single item in the task list, `oneitem`.
Let's make a comparable one to show for an owner, the only
difference being that the ID should be shown as a link to `Mtce::edit`.

Copy `oneitem` to `oneitemx` & fix it:

    <tr>
        <!-- MODIFY the next line -->
	<td><a href="/mtce/edit/{id}"><input type="button" value="{id}"/></a></td>
	<td>{task}</td>
	<td>{status}</td>
    </tr>

Modify `Mtce::show_page` to choose the correct view fragment to style 
the task list row...

    // INSERT the next three lines. The fourth is already there
    if ($role == ROLE_OWNER)
            $result .= $this->parser->parse('oneitemx', (array) $task, true);
    else
            $result .= $this->parser->parse('oneitem', (array) $task, true);

<img class="scale" src="/pix/tutorials/todo/78.png"/>

That's it? This job is small & easy, because the last one is going to be
a bit of a bear.

<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>
