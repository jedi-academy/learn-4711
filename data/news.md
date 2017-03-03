**Week 8** *(Fri Mar 3, 13:00)*  
- Week 9 reading & survey posted.

- **Session errors when running on Windows?**  
Apache on Windows may run as the user "None" on your system, depending
on the version of xAMPP that you setup. This user does not have
proper permissions to your **tmp** folder, giving an error message
when you try to change the user role.  
The role changes, and is in fact stored, but you have to live with the error
message for now, unless "chmod 777 tmp", from your bash shell inside your
project folder, works.  
I will add moving the session storage to a database table for the next lab :-/

**Deployment Server** *(Fri Mar 3, 13:00)*  
- The [test deployment server](http://umbrella.jlparry.com/) seems to be working well.; 
15 of the teams have configured their webapp on it, at the time this was written.  
The "plants" page is there now - you can get a feel for what some of your
classmates are up to.  
I continue to chip away at this, as time permits.
I have added a ["Webhooks" writeup](/display/lesson/webhooks) 
in the "Reference" section of the course hub organizer,
for any who need help with setting up their webhook.


**Labs** *(Fri Mar 3, 13:00)*  
- Lab 3 marking is in in progress, slowly but surely  
- Lab 4 marking is in the queue.  
- Assignment 1 is in the queue.
- Lab 5 marking is in the queue.
