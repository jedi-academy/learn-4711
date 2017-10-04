#Views - Making the Maintenance page

_Part of COMP4711 Lab 6, Winter 2017_

#Job 7 - Simple User Roles

We have a maintenance list, with pagination, but we plan to add
some maintenance CRUD tasks, which should be restricted to
appropriate user roles.

User roles are normally determined by a property of a logged-in user,
but authentication is still a lab or two away.
We are going to prepare for it, in this tutorial, by
adding some user roles, and making it easy to switch
between them for testing.

##7.1 Defining Our User Roles

Let's keep this simple, and only define two user roles: "guest" and "owner".

These will be used in a few places, so let's define them as constants
in `application/config/constants.php':

    defined('ROLE_GUEST') OR define('ROLE_GUEST', 'Guest');
    defined('ROLE_OWNER') OR define('ROLE_OWNER', 'Owner');

There should be no change to the webapp output at this point.

##7.2 Add the user role to the navbar

In the next step, we'll add a controller to handle role-switching.
Right now, we just want to add the roles to the navbar.

The cheesy way to do this (which is good enough for now), is to
enhance the `views/_menubar.php` adding a dropdown for the roles
to the other navbar items.

Following the Bootstrap docs, we could end up with...

    <ul class="nav">
        {menudata}
        <li><a href="{link}">{name}</a></li>
        {/menudata}
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">User Role<b class="caret"></b></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                      <li><a href="/roles/actor/guest">Guest</a></li>
                      <li><a href="/roles/actor/owner">Owner</a></li>
          </ul>
        </li>	
    </ul>


Yes, this is cheesy, and the list of roles should be data-driven.
We'll deal with that when we add authentication, and we have more roles.

Of course, this won't work until we add the controller for it.
You should see the change in the navbar, but the role links will be broken.

##7.3 Add the role switching controller

We should store the role in our session, and return to whatever page we were
on when a role is switched, for testing different roles on different pages.

We need a `controllers/Roles.php`, with an `actor` method to store the newly
selected role.

    class Roles extends Application
    {

            public function actor($role = ROLE_GUEST)
            {
                $this->session->set_userdata('userrole',$role);
                redirect($_SERVER['HTTP_REFERER']); // back where we came from
            }

    }

Try it, and... 
Oops - this blows up because we don't have sessions loaded :(

Let's configure sessions using the file system (for a change),
in `application/config/config.php`, about line 380:

    $config['sess_driver'] = 'files';
    $config['sess_cookie_name'] = 'ci_session';
    $config['sess_expiration'] = 7200;
    $config['sess_save_path'] = '/tmp';     // this should be a writeable folder on your system
    $config['sess_match_ip'] = FALSE;
    $config['sess_time_to_update'] = 300;
    $config['sess_regenerate_destroy'] = FALSE;

Note: make sure you replace the writeable folder from my system, `/tmp`,
with one that will work on yours! If you are unsure where would be best,
I suggest adding a "tmp" folder inside your project root, alongside `application` and `public`,
and then setting the
'sess_save_path' parameter above to '../tmp'. You would then modify your `.gitignore`
file to exclude anything inside that folder, so you don't transfer unnecessary
stuff between repo copies.

Then enable sessions in `application/config/autoload.php` ...

    $autoload['libraries'] = array('parser', 'database', 'parsedown','session');

It looks like it works (doesn't blow up) when you test, right?. How do we know for sure?

##7.4 Make the owner role visible on the maintenance page

In the `show_page` method of `Mtce`, we set the page title.

Let's add the current user role to the title...

    $role = $this->session->userdata('userrole');
    $this->data['pagetitle'] = 'TODO List Maintenance ('. $role . ')';


Cheesy, but we will save the heavy lifting until next lab :)

Test it.

Et voila :)

Note: the user role will only be visible in the title of the Maintenance page, 
and not on any of the other pages.

<img class="scale" src="/pix/tutorials/todo/63.png"/>

<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>
