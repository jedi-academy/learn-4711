**Week 12** *(Tue Apr 4, 13:15)*  
- Lesson posted. 
- Example repos mostly ready
- Added some REST examples from other frameworks, as part of "week 17"

- Corrected the lab 8 starter ... I originally posted one version too old, sorry.  
Updated: Crud & Shopping controllers, Order model, and some views.  
These do not impact what you have to change, but they will make it easier
to test if you made all the front-end model changes needed :)  
If you forked the starter, then resynch with it. If you copied the starter,
then download the updated one, and merge `controllers/Order.php`, `controllers/Shopping.php`,
`models/Order.php` and `views/*` into your lab 8 projects.


**Assignment 2** *(Sat Apr 1, 15:40)*
- Assignment 2 FAQ updated (not an April Fool's joke)
- The [server-test](https://github.com/jim-parry/server-test) app is in place, but it is having issues
connecting to the PRC server running on the same box, in a different
sub-domain. If you want to play with it, you will have to download
and run it from your system (after adjusting the config/database.php for your
system).

**Deployment Server** *(Sat Mar 25, 11:45)*  
- The [test deployment server](http://deployer.jlparry.com/) seems to be sorta working.
I need to tweak the deployment script so that it recreates your deployment folder,
rather than just trying to "git pull" into it & update it.
- I am currently enhancing the deployment to include database setup from your SQL script
- Usage: see the ["Webhooks" writeup](/display/lesson/webhooks) 

**Labs** *(Wed Apr 5, 01:30)*  
- Lab 5 marking completed.
- Assignment 2 marking is in progress.
- Lab 6 marking is in the queue.
- Lab 7 marking is in the queue.

**Important**  
Some of you have been deleting your team repos or organizations as you move
forward through labs. This is not a good practice, until you have
received the lab/assignment feedback for them, as the repos need to
be accessible for me to check them!
