# Frequently Asked Questions - Apache
COMP4711 - BCIT - Fall 2017

This FAQ addresses the most common problems encountered
trying to develop webapps as part of this course.

##Where did phpMyAdmin go?

Bitnami messes with the virtual hosting setup in some of its versions.
The symptom: phpmyadmin used to be accessible before we started adding
virtual hosts, but now it is "gone".

The workaround that I use: install a fresh version of 
[phpMyAdmin](https://www.phpmyadmin.net/), and map a new
virtual host to it. I use `phpmyadmin.local`, for instance, to my copy
installed inside apache2/htdocs.

##Cross-platform issues

Many of the problems are cross-platform issues,
usually encountered when developing on Windows and
testing/deploying on Linux.

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


