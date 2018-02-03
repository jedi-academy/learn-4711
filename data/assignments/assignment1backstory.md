#Assignment #1 - Backstory
COMP4711 - BCIT - Winter 2018

#Backstory

It is often a challenge to choose the right set of gear or accessories
for a given profession (eg football) or customizable acquisition (eg a car).
In the case of a sport, for instance, you have tradeoffs between 
protection (more is better) and weight (less is better).
And, of course, you have to worry about aesthetics (will these knee pads
match my helmet).

You are going to build a small webapp to help accessorize someone or
something, to partially address this challenge.

Here are three examples:

<table border="1">
    <tr>
        <td width="33%">
            <img src="/pix/assignments/hockey.jpg" width=300 /><br/>
            A hockey player, with the different kinds of accessories identified.
        </td>
        <td width="33%">
            <img src="/pix/assignments/stormtrooper.jpg" width=300/><br/>
            A stormtrooper, again with the different kinds of accessories identified.
        </td>
        <td width="33%">
            <img src="/pix/assignments/d3_character.jpg" width=300/><br/>
            A Diablo 3 character, together with the game
            interface depicting the gear or accessory choices.
        </td>
    </tr>
</table>

These are just examples, and a [more complete set](/download/gear.zip) can be viewed if
you are still unclear on the idea.

##Your Story

Each team shall pick a profession or customizable thing, of interest to the
team members, and four or five kinds of visibly different accessories
for their scenario. Each accessory category will need four or five
choices, but not necessarily all in place for the first assignment.

The intent of the webapp is to allow a guest to view the pre-built sets
of accessories, and the catalog of available accessories. An approved user
will be able to create or customize a set of accessories (choosing one
from each category), and an admin will be able to maintain the
accessory catalog.

There is lots of room for creativity and fun, and you can make your
webapp interactive and/or fancy (or not), so long as you
conform to the MVC and/or CodeIgniter constraints specified.

##Your Versions

The two implementation phases for this project:

###Planning & Test "Database" (Assignment 1)

Build a suitable model and collect suitable images for
the starting accessory catalog.

Implement the accessory set viewing and the catalog presentation,
for the "guest" role.

###Accessorize (Assignment 2)

Flesh out & unit test the accessory set model.

Implement the customization and maintenance components, for the user and
admin roles.

##Business Rules

Choose three or four attributes for your scenario, that would be modified
by a given accessory. These could be something like weight, horesepower,
torque and emissions, for a car; or strength, intelligence, dexterity
and vitality, for a Diablo3 character.
Whatever your choices, each accessory will have a modifier property
for each attribute.

The sum of the attributes of each
selected accessory in a set will be calculated properties of that set.
There *may* be a requirement for your second assignment to propose an
accessory set based on maximizing one of the attributes.

An accessory set will need to be presented, certainly as part of
the initial viewing and possibly while a set is being customized.
There are two conventional ways to do this, with pros & cons to each:
- using HTML "div" elements suitably positioned, so that the
chosen accessories are layered appropriately (skates over the feet, for instance), or
- rendering an image server-side, with the accessories overlaid appropriately

Either way, you will need to plan for transparent accessory images, whether they
get overlaid client-side or server-side. PNGs might be a good choice.
If you are rendering an accessory set client-side, you are welcome to use
a JS library with/without AJAX calls - that is up to you and your team's
comfort level with that.
