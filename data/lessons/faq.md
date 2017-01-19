#FAQ - Frequently Asked Questions
COMP4711 - BCIT - Fall 2016

This FAQ addresses the most common problems encountered
trying to develop webapps as part of this course.

It will contain helpful information, honest, but only once I have time
to flesh it out.

##Cross-platform issues

Many of the problems are cross-platform issues,
usually encountered when developing on Windows and
testing/deploying on Linux.

### Do you get a blank page when your webapp is deployed and run?

Make sure that the case of your included files matches their filenames.  
Including <code>"student.php"</code> when the file is really named
<code>"Student.php"</code> will trigger an error in the Apache log,
and you will get a blank page in your browser.

This will work fine on Windows, but be a puzzler when/if deployed on Linux.

##CodeIgniter conventions

Many problems come from not understanding the conventions
enforced by the CodeIgniter framework.

### Do you have a webapp that works fine locally (on Windows) but gives 404s when run on Linux?

Check that your classes have UCfirst filenames as well as class
names internally. Windows doesn't care, but Linux does.

Example: <code>controllers/welcome.php</code> is acceptable to Windows,
but needs to be <code>controlelrs/Welcome.php</code> on Linux.

##Deployment mistakes

Some problems come from common deployment or submission mistakes.

### Does your webapp mysteriously blow up or show a folder list when deployed?

That sounds like a virtual hosting configuration problem.
If you have to reference your homepage as <code>comp4711.local/labx/public</code>,
that tells me that your VHOST configuration is mapping the virtual domain to
your project root, not the document root inside it.

### Do you get a 403 trying to run your webapp?

Check that the <Directory> entry for your Apache DocumentRoot
(probably line 230-250 in your Apache's <code>httpd.conf</code>
has 

    Options FollowSymLinks Multiviews Indexes

and make sure that the rewrite module is enabled (uncommented) in <code>httpd.conf</code> too

    loadmodule rewrite_module libexec/apache2/mod_rewrite.so

### Do you get a 500 Internal Server Error when your webapp is deployed?

Setting your folder/file permissions to 777 may work locally,
but many hosting Apache configurations run a security module which
will fail under the same circumstances. You can have a writeable
data folder with 777 permissions, but the bulk of your webapp would normally have 755.

This can be determined from the Apache error logs for the app, if you
have access to them.

### Does your virtual domain always give you the Apache DocumentRoot folder list?

That sounds like you may not have virtual hosting enabled in <code>httpd.conf</code>.

Check that the virtual hosting alias module is enabled (uncommented)

    LoadModule alias_module modules/mod_alias.so

and check that the virtual host configurations are included (uncommented)

    Include conf/extra/httpd-vhosts.conf

### Do you have to specify "index.php" as part of your URL?

You have a <code>.htaccess</code> file, and you expect to be able to use <code>/work</code>,
but your app only works with
the URL <code>/index.php/work</code>.

This sounds like the rewrite module needs to be enabled (uncommented) in <code>httpd.conf</code>.

    LoadModule rewrite_module modules/mod_rewrite.so


##Programming mistakes

Simple programming mistakes can lead to problems.

### Fatal error: Call to a member function xxx() on a non-object ... on line xxx

This says that you are referencing an uninitialized variable on the source file
and line indicated, or that the variable you are attempting to reference as an object is a 
scaler or an array,

##Webapp testbed

It is possible to setup a testbed that closely matches
your deployment environment.

### VirtualBox with a VDI setup with Linux & Apache

Setup a VirtualBox, with a suitable Linux distro (eg CentOS6)

### Vagrant on top of VirtualBox

Vagrant is a tool that sits on top of VirtualBox. 
It makes the runnning VirtualBox easer, and has provision to setup your project
inside, for testing.

### Docker container

Docker is an emerging devops processing pipeline manager.
I don't know enough to help you with it, but plan to experiment.

### Git deployment

Still testing this, and working out configuration deatils.
Once ready, you configure your project on my server, and add
a webhook to your github repo.
Whenever you merge to your team repo, that triggers a git pull on my VPS
to deploy your webapp for testing :-/

##Testing techniques

There are several ways to test the correct functioning
of your webapp.

### Unit Testing
PHPunit lets you do all sorts of unit testing.
This really only suits models, so perhaps not so useful.

### CoDecption

This a tool for usecase or scenario testing.

*** Use the PHP debugger

Integrated into your IDE, lets you step through your app like the Java debuggers.
Works locally, but there might be server-side extensions.
Might need XDebug installed.
