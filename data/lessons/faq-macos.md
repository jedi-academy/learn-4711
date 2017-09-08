# Frequently Asked Questions - MacOS
COMP4711 - BCIT - Fall 2017

This FAQ addresses problems and tips unique to MacOS.

##How can you store files outside of Apache?

Apache normally runs on Apache as the "daemon" user, which may not
have access to your home folders, if that is where you want to store
your web projects, per the "keep your COMP4711 work separate" item
in the more general Apache FAQ.

If you place your web projects directory under your Documents (which may sound intuitive), 
you will get 'access forbidden' issues because the permission on 'Documents' 
directory is by default set to 700 which means only the login user can access it 
and directories under it. 
The daemon user that runs the apache process doesn't have r and x permission to access the project folder.

A suggested workaround: place your wwwroot in the root directory `/wwwroot` and 
run `sudo chmod 0755 /wwwroot` to fix the permissions. This has the added benefit of separating your 
personal projects from XAMPP, and they won't get deleted if you uninstall XAMPP.

_(Thanks, J.L.)_
