###########################
COMP4711 Course Hub Website
###########################

This is the course hub for 
`COMP47111 Introduction to Internet Software Development 
<http://www.bcit.ca/study/outlines/20163035498>`_.

*****
Setup
*****

Extract & serve from the **public** folder.

You might need to do a **composer update** first.

*****************
Programming Style
*****************

Some of the programming design decisions reflected:

-   The architecture adheres more to the "model-view-adapter" convention,
    where the view is unaware of the source of data and the model is unaware of
    how any data might be presented. The controllers are go-betweens.
-   A "theme template" presents the organizing pages for a course, in a
    visual style consistent with the main CodeIgniter site.
-   A "show template" presents a learning activity as a slideshow suited
    to presentation or print, using the S5 framework from Eric Meyer.
-   A base controller takes care of assembling finished pages, using the 
    master template.
-   Using the template parser eliminates PHP code from the views, where possible.
-   View fragments are used to style single "records" on their own, improving cohesion.
-   An ".htaccess" file is incorporated, to configure Apache to remote
    index.php from any URLs.
-   The site is XML-driven, abstracting as much as possible so that the
    webapp can be used for other courses. XML was chosen over an RDB
    because of the rich data structures it can support.

***************
Project Folders
***************

/application	The course hub engine
/data           XML & figures for learning activities
/download       Files to download from the site
/feedback       holder for feedback
/public			public-facing website
/system			CodeIgniter 3.1.0 framework

*******
License
*******

MIT license.

*********
Resources
*********

-  `Informational website <http://codeigniter.com/>`_
-  `Source code repo <https://github.com/bcit-ci/CodeIgniter/>`_
-  `User Guide <http://codeigniter.com/userguide3/>`_
-  `Community Forums <https://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki/>`_
-  `Community IRC <http://codeigniter.com/irc>`_

***************
Acknowledgement
***************

This webapp was written by James Parry, Instructor in Computer Systems
Technology at the British Columbia Institute of Technology,
and Project Lead for CodeIgniter.

The Parsedown library comes from https://github.com/erusev/parsedown, and has an MIT license.

CodeIgniter is a project of B.C.I.T.