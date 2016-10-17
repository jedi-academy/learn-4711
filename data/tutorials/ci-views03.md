#Views - Making the Order Entry page

_Part of COMP4711 Lab 5, Fall 2016_

<div class="alert alert-info">
This assumes that you have completed parts 1 & 2 of the lab.
</div>


#Job 3 - Shopping Page Features

We want a two-column layout for shopping: the left side (75%) holds a
pictorial ordering menu, and the right side shows the contents
of the user's current order (shopping cart).

The pictorial menu is to have 3 columns, one for each of mains, 
sides and desserts.

##3.1 Basic shopping page

let's make <code>application/views/shopping-template.php</code>
for this, copied from <code>secondary-template</code> to start.

At full resolution, the pictorial menu can have menu item names under
each pixture. The names should be hidden at small resolution.
The 3 menu item columns should collapse into one at extra
small resolution.

The receipt column (far right) takes up 25% of the width regardless
of browser window resolution. So, we end up with a box inside a box,
something like...

    <div class="row">
        <div class="col-xs-8">
            ... pix
        </div>
        <div class="col-xs-4">
            {receipt}
        </div>
    </div>

The receipt can be made up for this lab. I suggest a markdown file,
which is then "rendered" the same way as the meat from the Hiring page.

##3.2 Pictorial menu

Back to the pictorial menu. We want three columns at "full" width, and only one
otherwise.

    <div class="row">
        <div class="sm-12 md-4">
            ... entries for a menu category
        </div>
        <div class="sm-12 md-4">
            ... entries for the second category
        </div>
        <div class="sm-12 md-4">
            ... entries for the third category
        </div>
    </div>

Do you see the refactoring opportunity? Yes, each category column is
the same as the others, so we can use a view fragment.

Just to be clear, this is where we sit...

    <div class="row">
        <div class="col-xs-8">
            <div class="row">
                <div class="sm-12 md-4">
                    ... entries for a menu category
                </div>
                <div class="sm-12 md-4">
                    ... entries for the second category
                </div>
                <div class="sm-12 md-4">
                    ... entries for the third category
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            {receipt}
        </div>
    </div>

And we are heading to...

    <div class="row">
        <div class="col-xs-8">
            <div class="row">
                {pictorial}
            </div>
        </div>
        <div class="col-xs-4">
            {receipt}
        </div>
    </div>

Where the "pictorial" parameter is built by
iterating over the categories, and generating for each

    <div class="sm-12 md-4">
        ... entries for a menu category
    </div>

The entries for a category "x" are built by iterating through the menu
items, and for each one in the category of interest,
add a element with the menu item image visible at all
times, and the menu item title only at medium or higher resolutions.

    <div class="col-??>
        <img src=??? />
        <div class="??">{itemtitle}</div>
    </div>

This may seem terribly complicated, but we are shooting for long-term flexibility.
Phew!

If all went well, you should end up here:


--- need code & screenshot


<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>
