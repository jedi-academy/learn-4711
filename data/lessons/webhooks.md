#Webhooks
COMP4711 - BCIT - Winter 2017

A few students asked for a writeup to help them setup webhooks
in their repository, and to use the test deployment server.

This is addressed to the team captains.

## Setup your webapp on the deployment server

On the [Umbrella Corp](http://umbrella.jlparry.com) server, initiate your login 
by clicking on the login icon to the far right of the top navbar.
<img class="scale" src="/pix/lessons/webhooks/wh4.png"/>

Signin with your group/team name, and the super secret access token that
I sent you by email.
<img class="scale" src="/pix/lessons/webhooks/wh5.png"/>

Once logged in, click on your group/team name now in the top right of the
navbar. To the right of it is the logout icon.
<img class="scale" src="/pix/lessons/webhooks/wh7.png"/>

Specify your team repository settings, and choose which repo branch
you want to test deploy. Normally, this would be "develop", while
you are working on the next assignment. You would change this to "master"
once you are ready to submit your assignment, so you can test the "final"
version of your webapp.
<img class="scale" src="/pix/lessons/webhooks/wh8.png"/>

Save your settings. The deployment server is now primed to deploy
any webhook deliveries sent from your repo.

## Add a webhook to your repo

On [Github](https://github.com), on your main repository page,
select the "Settings" link, on the far right of your main navbar.
<img class="scale" src="/pix/lessons/webhooks/wh9.png"/>

From the resulting leftside navbar, select "Webhooks".
<img class="scale" src="/pix/lessons/webhooks/wh10.png"/>

Select "Add webhook" in the Webhooks panel.
<img class="scale" src="/pix/lessons/webhooks/wh11.png"/>

Configure this webhook, providing the [Deployment Server](https://deployer.jlparry.com/please)'s payload URL.
Also specify "application/json" as the Content type.
<img class="scale" src="/pix/lessons/webhooks/wh12.png"/>

Select "Let me select individual events".
<img class="scale" src="/pix/lessons/webhooks/wh13.png"/>

"Push" events are slected by default. Add "Pull request" events.
<img class="scale" src="/pix/lessons/webhooks/wh14.png"/>

Save your webhook settings. Your settings/webhooks page will now
show your webhook in a panel. Click on it to edit it.
<img class="scale" src="/pix/lessons/webhooks/wh15.png"/>

Scroll to the bottom of the editing panel. You will see a
"delivery" resulting from setting up your webhook.
Select it.
<img class="scale" src="/pix/lessons/webhooks/wh16.png"/>

It shows the "request" part of the delivery. Looking at it, you will see that it
was a Github "ping", sent to verify the payload URL.
<img class="scale" src="/pix/lessons/webhooks/wh17.png"/>

Select the "Response" tab. It should show a return code of 200 (in a green oval),
and the body of the response should show your team organization and repo, with an "Ok" message underneath that.
If it doesn't, your webhook is not properly configured.
<img class="scale" src="/pix/lessons/webhooks/wh18.png"/>


## Test the webhook

Test the deployment by selecting your repository's readme or changelog file,
in the repo files list. Select the "edit" icon, on the right side of its navbar.
<img class="scale" src="/pix/lessons/webhooks/wh19.png"/>

Make a trivial change to the file, for instance indicating that you have setup or are testing the
deployment server.
<img class="scale" src="/pix/lessons/webhooks/wh20.png"/>

Commit these changes directly to the repo. You will not be penalized for not
using a feature branch and a pull request for this change.
<img class="scale" src="/pix/lessons/webhooks/wh21.png"/>

Go back to editing the webhook in your settings, and you will see a new
webhook "delivery". Select it.
<img class="scale" src="/pix/lessons/webhooks/wh22.png"/>

You will notice that this was a "push" Github event.
<img class="scale" src="/pix/lessons/webhooks/wh23.png"/>

The response should have a status code of 200 again, and
its body should say something about initializing a Git repository, with
your group/team name clearly visible.
<img class="scale" src="/pix/lessons/webhooks/wh24.png"/>

If this is not the case, either your webhook, or your deployment settings on the
umbrella site, are incorrect. Fix them, and select the "Redeliver" button
to resend your webhook event.

For instance, if the body says "Not interested", then the deployment server
is not looking for events from the organization/repo/branch combination
you setup the webhook for.

Repeat until you get success or you give up and see me for help :-/

If you got a "success" message, the reployment server should have automatically
pulled your repo, and deployed it for testing.
This will be reflected in the response body.

## Test the automatic deployment

Test your deployed site with the appropriate URL ... `https://your-team.jlparry.com`.
You should see your website, warts & all :)

If the response is an "Internal server error 500", the usual cause is incorrect
folder permission on the server. If this happens, contact me and I will fix the problem and 
beef up my script.

In my "server-test" case, I just get a directory list, because there is no "meat" to my
project - it was just for testing, and to support this writeup.
<img class="scale" src="/pix/lessons/webhooks/wh25.png"/>

Test each of the pages in your site. If you have a capitalization or UCfirst
mistake, it will be quite clear from the error message you get!

Each time you push to your repo, or merge a pull request, the webapp
will be automatically redployed, and you can test it in a "live" setting :D

## Remote Deployment Notes

I am still working on getting Composer working properly
on my server, so any Composer dependencies will have to be resolved
in your repo for the moment. That means not git ignoring the `vendor` folder
(assuming that is where you install them).

The deployment manager does not provide a database for you to work with, yet.
Once it does support that, it will look for the one and only `.sql` file in your `data` folder,
and import that into the database assigned to your app.

~ * ~
 This should be enough to see you through deployment testing!
