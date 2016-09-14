
#Process Prep
#lab #lab02
James L. Parry  
B.C. Institute of Technology  

##Lab Goals

The purpose of this lab was to introduce you to CodeIgniter and the workflow for working with webapps. It looks like I have an incorrect understanding of the background you bring to this lab, both in terms of concepts as well as previous experience. I am revising the original lab 2, splitting it over two labs.

What worked well was my walking the group through the "lab preparation", which took pretty much the entire lab (rather than the 15 minutes I expected!).

Revised purpose: Process Preparation

Suggestion: you may want to skim the slideshow first, before working your way through it.
Lab Teams

This is a pair lab, sharing a single repository, but with each team member using their own github account and computer.

If you insist on working on your own, you will need to setup a second github account, and use two machines, to get the full benefit (and marks) of the lab.

##Lab Submission

Your lab will result in a github repository, ready for the next lab (which will be the "real" conversion from a static site to a CodeIgniter webapp). If you work ahead, and complete the conversion, you are welcome to have that in your repository for lab 2, but I will treat the resulting webapp as part of your lab 3.

Submit a readme *text* file, or a submission comment, to the lab dropbox. It should contain a link to your github repository. Only one of these is needed, for the pair of students.

Each of the students should also submit their httpd-vhosts.conf file.

Due: three days after your lab, eg. Thursday lab period will have theirs due Sunday, Jan 17, 17:30 PST

##Lab Preview

There are a few things to sort out before diving into the CodeIgniter lab itself (which is now lab 3) - "process":

    your D2L group
    get github setup
    clone your repo
    add local domains to your system
    configure your AMP setup (virtual hosting)
    make a CodeIgniter starter
    incorporate the starter into your repository

I originally referenced some devops tutorials for these, but that proved confusing. I will walk you through it, instead.

##Lab Prep - D2L Group

This lab is for group submission, and I have set up groups for each set, with up to two members, self-enrolled.

Choose a partner for this lab. One of you should enrol in a group, to claim it, and the other should join that group.

If you inadvertently end up paired with the wrong teammate, let me know during lab and I can fix that.

The groups are for this lab only, and do not have to be maintained for the assignments. You will be setting up assignment teams next week.

##Lab Prep - Github

If you are a team of one, you will need to create a second github account for yourself, and plan to use a different machine for each acocunt. We want to replicate a collaborative environment, with two developers sharing a common repository.

One of you should fork the starter repository for the lab, and they should then add their teammate as a collaborator, with write permission. You should both be able to push code to the repo!

You are welcome to change the repo name, in its Github settings, if that makes more sense to you. It will still show as a fork of the starter.
Lab Prep - Cloning

Each of you will want to clone the shared repository to your development system, be it your laptop or one of the lab machines.

Clone it into the *htdocs* (or equivalent) folder within your AMP stack.

The foldername can be anything meaningful to you, for instance "comp4711lab02", or you can stick with "example-gallery" all the way through.

##Lab Prep - Post-Cloning

After cloning, you should be able to see the starter's image gallery using the URL "localhost/comp4711lab02/public". This is only to make sure it is in the proper place, and not what you will use for development.

You do NOT want to have to use a URL like "localhost/comp4711/labs/lab02/public" - that is too many folders deep!!

I trust you remembered to inject the port number you assigned during AMP setup, if other than 80 ... for instance, "localhost:4711/comp4711lab02/public"
Lab Prep - Local Domain

We want to use domain based hosting, so that media references work properly in spite of apparent folder names in an URL. The apparent foloder names can confuse your browser if you use sub-sontroller methods.

For instance, "/product/buy/shoes/1" looks to the browser like it is inside the website folder "product/buy/shoes", but there is no such folder. Relative image references, such as "../assets/images/blah" will not work properly.

Add one or more local domain names to your hosts file. This could be names that you remap each week as needed, for instance "comp4711.local", or you could add a new domain each week, eg. "4711lab02.local", "4711lab03.local", etc.

Do this by adding a line to the end of your hosts file, like
127.0.0.1 comp4711.local project.local 4711lab25.local

##Lab Prep - Virtual Hosting

Configure your Apache virtual hosting, found in httpd-vhosts.conf inside the extra folder of your Apache configuration folder.

Your AMP comes with a couple of VirtualHost definitions, that are to be used as examples only - they are not real, and can be deleted or commented out once done.

You want to end up with several VirtualHosts - one for the *default*, and one for each local domain.

Each VirtualHost definition needs a ServerName, eg comp4711.local, and then the DocumentRoot that domain should be mapped to (with no trailing slash), for instance /opt/lampstack-5.5.30-1/apache2/htdocs/comp4711lab02.

The first VirtualHost defined in the config file is special - it is the AMP base installation, eg. the Bitnami start page.

##Lab Prep - CodeIgniter Setup

Download CodeIgniter, the current release from https://github.com/bcit-ci/CodeIgniter/archive/3.0.4.zip

Extract this inside your downloads folder - you should end up with a CodeIgniter-3.0.4 folder, containing application, system and user_guide folders, as well as an index.php and some other files.

Move the system folder inside your htdocs, and rename it to system3.

If you want to keep the user guide handy for local reference, move the user_guide folder somewhere you can easily find it, for instance your desktop, and possibly renamed suitably. If you prefer to read the user guide online, then just delete the user_guide folder.

The stuff remaining in your CodeIgniter-3.0.4 folder will be your "CodeIgniter starter" folder, for new projects. You might want to rename it appropriately.

##Lab Prep - Prepared

Walking you through this in lab will have pretty much consumed the lab time, but you are now ready for the next lab, and you should be comfortable with the process.

You should have your htdocs folder ready to roll, with the CodeIgniter system3 framework folder inside it, as well as your lab's project folder.

You will have a CoeIgniter starter folder, the contents of which can be copied into a new (cloned) CodeIgniter project.

You will have a local domain defined and virtual hosting setup in your Apache.

You may have the CodeIgniter user guide in a folder on your desktop for convenience.

##Lab Marking Guideline

This lab will be marked out of 10, as follows:

    Proper fork and collaborator setup of your repo (3)
    Reasonable vhost configuration (3)
    Correct repo content - starter repo with the CI starter integrated (3)
    Consideration for your pain and suffering - no bonus marks! (1)

The grading scheme above is meant to reflect the work required to result in each of the final results.

##Disclaimer

We will not necessarily be following "best practices" throughout this lab.

Our focus is on "baby steps", that will lead to best practices over the next few labs.

