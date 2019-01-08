# Frequently Asked Questions - Apache
COMP4711 - BCIT - Fall 2017

This FAQ addresses the most common problems encountered
trying to develop webapps as part of this course.

##Where did phpMyAdmin go?

Bitnami messes with the virtual hosting setup in some of its versions.
The symptom: phpmyadmin used to be accessible before we started adding
virtual hosts, but now it is "gone".

### You could install your own phpMyAdmin...

The workaround that I use: install a fresh version of 
[phpMyAdmin](https://www.phpmyadmin.net/), and map a new
virtual host to it. I use `phpmyadmin.local`, for instance, to my copy
installed inside apache2/htdocs.

### You could use different ports

If you want to leave the XAMPP installation as untouched as possible, listening
on whichever port you specified during installation (eg 80 or 8080), then you
can add a second `listen` directive in the main Apache config file, and
then add `VirtualHost` elements for all of your other work using the new port.

For instance, assuming you setup Apache to listen on port 80, and you want
your COMP4711 work to be reachable on port 5678, look for the

    listen 80

directive in `.../conf/httpd.conf`, and add below it

    listen 5678

Then, in the `.../conf/extra/httpd-vhosts.conf` virtual hosts configuration,
add all of your virtual host elements as

    <VirtualHost *:5678>
        ...
        ServerName 4711lab25.local
        ...
    </VirtualHost>

You may still need an initial `VirtualHost` element before these, for the "normal"
stuff (like the bundled phpmyadmin):

    <VirtualHost *:80>
        ...
        DocumentRoot APACHE_ROOT/htdocs
        ...
    </VirtualHost>

##You want to keep your COMP4711 work separate from everything else

You can do this, for instance putting all your course work inside
`/home/YOURNAME/courses/comp4711/labs`, if you include a
`Directory` element that tells Apache it is ok to look for content there.

I suggest adding such a directive at the top of your `httpd-vhosts.conf` config file,
before any of the `VirtualHost` elements.

It would look like:

    <Directory "/home/YOURNAME/courses/comp4711/labs">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

and your `VirtualHost` elements would then be something like:

    <VirtualHost *:80>
        ...
        DocumentRoot "/home/YOURNAME/courses/comp4711/labs/lab25"
        ServerName 4711lab25.local
       ...
    </VirtualHost>

##Apache service problems

The symptom: you follow the lab, and everything seems fine until you *try* to
restart Apache, and it no longer seems to respond to the XAMPP control panel
or to the `httpd -restart` (or similar command).

The typical root cause: you installed Apache as a service, and you need to use
the services manager to restart it (found as a tab in the Windows task manager,
for instance).

An alternate solution is to disable or uninstall the service, and you can then
restart the web server from the command line or using the XAMPP control panel.

##Default virtual host configuration??

The configuraiton conventions that Bitnami uses have changed a bit over time,
and indeed might be different on different platforms :-/ The biggest problem
this causes for us is related to virtual host configuration.

If your `.../conf/extras/httpd-vhosts.conf` file contains `VirtualHost`
elements where the lines all start with a hash sign ("#"), then virtual
hosting has been enabled, and those `VirtualHost` elements are examples.
You can copy/paste them, remove the leading comment hash, and tailor them
for your needs.

On the other hand, if your `.../conf/extras/httpd-vhosts.conf` file contains 
"legal" `VirtualHost`
elements, without leading comment hashes, then virtual
hosting has **not** been enabled, and those `VirtualHost` elements are examples
that can be modified to suit your needs, **but** you will have to enable
virtual hosting manaully. 

To do so, make the following changes in your `.../conf/httpd.conf`:

    #LoadModule vhost_alias_module modules/mod_vhost_alias.so
    ...
    # Virtual hosts
    #Include conf/extra/httpd-vhosts.conf

needs the virtual host module and configuration enabled:

    LoadModule vhost_alias_module modules/mod_vhost_alias.so
    ...
    # Virtual hosts
    Include conf/extra/httpd-vhosts.conf

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


