# Frequently Asked Questions - CodeIgniter
COMP4711 - BCIT - Fall 2017

This FAQ addresses the most common problems encountered
trying to develop webapps as part of this course.

##CodeIgniter conventions

Many problems come from not understanding the conventions
enforced by the CodeIgniter framework.

### Do you get a blank page when your webapp is deployed and run?

Make sure that the case of your included files matches their filenames.  
Including <code>"student.php"</code> when the file is really named
<code>"Student.php"</code> will trigger an error in the Apache log,
and you will get a blank page in your browser.

This will work fine on Windows, but be a puzzler when/if deployed on Linux.

### Do you have a webapp that works fine locally (on Windows) but gives 404s when run on Linux?

Check that your classes have UCfirst filenames as well as class
names internally. Windows doesn't care, but Linux does.

Example: <code>controllers/welcome.php</code> is acceptable to Windows,
but needs to be <code>controlelrs/Welcome.php</code> on Linux.

##Programming mistakes

Simple programming mistakes can lead to problems.

### Fatal error: Call to a member function xxx() on a non-object ... on line xxx

This says that you are referencing an uninitialized variable on the source file
and line indicated, or that the variable you are attempting to reference as an object is a 
scaler or an array,

##Testing techniques

There are several ways to test the correct functioning
of your webapp.

### Unit Testing
PHPunit lets you do all sorts of unit testing.
This really only suits models, so perhaps not so useful.

### CoDecption

This a tool for usecase or scenario testing.

### Use the PHP debugger

Integrated into your IDE, lets you step through your app like the Java debuggers.
Works locally, but there might be server-side extensions.
Might need XDebug installed.

