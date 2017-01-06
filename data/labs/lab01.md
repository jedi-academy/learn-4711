
#Lab #1 - Development Environment
COMP4711 - BCIT - Winter 2017

##Lab Goals

This is a bit of a whirlwind lab, providing a shallow look at a number of things and setting the stage for the labs to come.

The goals of this lab are to equip you with a webapp development environment, and to expose you to github and PHP.

There are three tutorials for you to take advantage of, and then this lab exercise to apply them.

Suggestion: you may want to read the lab and tutorials first, before diving in.

##Lab Teams

This is an individual lab - you each want your development environment working!

There is merit to working in parallel with a partner from your set, for support,
but you need individual submissions.

##Lab Submission

Your lab will be completed in a github repository.

Provide a link to your github repository as part of your dropbox submission. 
Include screenshot(s) sufficient to convince me that you have your environment setup ... your browser window accessing your student list, for instance.

Due: Sunday, Jan 15, 17:30 PST

##Lab Marking Guideline

The lab dropbox has a D2L rubric attached to it, which provides a raw score out of 15.
That will be scaled so that the lab is out of 10 in the gradebook.

I will be making sure that you have a project, with the proper webapp structure. 
It can be a NetBeans project, but doesn't have to be ... in fact, the IDE you use should not be apparent ;p

I will check your github commit history, to see if you appear to using the process properly.

I will be making sure that it runs properly when I deploy the project into my "comp4711" virtual host folder.


##Disclaimer

We will not necessarily be following "best practices" throughout this lab.

Our focus is on "baby steps", that will lead to best practices over the next few labs.


##Lab Preparation

Three tutorials have been provided, to setup your development environment. 
Please make sure you have completed them, if needed, before starting the lab proper.

- [Tutorial 1](/show/tutorial/setup01) XAMPP Installation - if you do not have a web server installed
- [Tutorial 2](/show/tutorial/setup02) Virtual Hosting Setup - if you don't have virtual hosting setup
- [Tutorial 3](/show/tutorial/setup03) PHP Crash Course - if you are really nervous about PHP

#On to the Lab Itself!


##Install Git

Make sure that you have Git installed on your system, for instance from the [git-scm](http://git-scm.com/downloads) site.
<img class="scale" src="/pix/labs/1/1-1b.png"/>

##Install Git Toolbar?

If you are using NetBeans as your IDE, I recommend that you also install the Git toolbar for NetBeans. It will make things easier :)

Find it in the available plugins...
<img class="scale" src="/pix/labs/1/1-1c.png"/>

After installing it, your toolbar should have a few more buttons...
<img class="scale" src="/pix/labs/1/1-1d.png"/>

##Privacy Concerns?

If you have any concerns about the privacy of your contact information, then create your github account using an alias username and email address.
Your work will be connected to your student ID, for grading purposes, only from the D2L dropbox where you provide a link to your repo.

##Create Your Github Account

If you do not already have one, create a [GitHub](http://github.com) account for yourself.

<img class="scale" src="/pix/labs/1/1-0.png"/>

##Create an Empty Repository

Create a new repository to use for this lab. Name it what you like ... 
your virtual host mapping will need to refer to this name (as a folder) once you have cloned your repository locally.

For a description, I suggest something like "COMP4711 lab 1". I left mine blank :(

*Before* you click "Create repository", please read the notes following the screenshot!

<img class="scale" src="/pix/labs/1/1-1.png"/>

###Repository Properties

Your repository should be public, so that my marking scripts can pull its contents
for me to look at. A private repository is not a viable option.

You could gain a small measure of privacy by creating an account on our [GitLab server](https://git.cit.bcit.ca),
and creating your public repositories there.

Do initialize the repository with a readme file. Changing this will give us an excuse to make sure our IDE is properly configured.

If we were working in a team at this point, it would make sense to have a gitignore directive, but we don't need it now.

Choose a suitable license for your project. Ask me if you have any questions about which one is appropriate.

Ok - go ahead and create your repository!

##Verify Your New Repository

Your repository homepage should look something like...

<img class="scale" src="/pix/labs/1/1-3.png"/>

##Clone Your Repository Locally

You want to clone your repository locally, so that you can work with it.

I have shown here the screenshots for doing that using NetBeans.

<img class="scale " src="/pix/labs/1/1-1e.png"/>

The repository URL is the "cloning" URL...
<img class="scale " src="/pix/labs/1/1-4.png"/>

There is only the one branch to choose from...
<img class="scale " src="/pix/labs/1/1-5.png"/>

The destination folder should be the "htdocs" folder inside your XAMPP folder...
<img class="scale " src="/pix/labs/1/1-6.png"/>

NetBeans won't recognize the project as a PHP one (or any kind, for that matter),
but it will offer to create a project for us...
<img class="scale " src="/pix/labs/1/1-7.png"/>

We tell it that the project will be an "existing" one, since we have a
starting folder to use (the cloned repo)...
<img class="scale " src="/pix/labs/1/1-9.png"/>

Select the folder containing your cloned repo...
<img class="scale " src="/pix/labs/1/1-10.png"/>

Specify that the project will run using the virtual domain that you setup
in the earlier tutorial...
<img class="scale " src="/pix/labs/1/1-11.png"/>

##Update Your Repo Readme

Make a small change to your readme file. This is only so we can make sure our git access is properly configured.

<img class="scale" src="/pix/labs/1/1-13.png"/>

##Add a Homepage

In NetBeans, you can create a "new PHP web page", and it should be named "index".
<img class="scale" src="/pix/labs/1/1-14.png"/>

Add a PHP statement to spit out something other than a blank page.
<img class="scale" src="/pix/labs/1/1-16.png"/>

##Make Sure the App Runs

You'll need to tailor your virtual host configuraiton so that "comp4711.local"
maps to the folder you have your local projhect in...
<img class="scale" src="/pix/labs/1/1-18.png"/>

And if you click the "run" button in the NetBeans toolbar, you should see
a simple webpage in your browser...
<img class="scale" src="/pix/labs/1/1-19.png"/>

##Commit Your Change

Commit your changes, using the toolbar or the context-sensitive <code>git>commit...</code>
menu item...
<img class="scale" src="/pix/labs/1/1-20.png"/>

You will be prompted for a commit message. We will be talking lots more about
proper commit messages in the weeks ahead, but you can have a simple one for now...
<img class="scale" src="/pix/labs/1/1-21.png"/>

##Update Your Repository

"Commiting" just flagged the local changes that we want to see in our repository,
if and when you update the repository, which we are going to do now.

The process is initiated by clicking the "Push" button in the NetBeans toolbar, or by selecting <code>git>commit</code>.
<img class="scale" src="/pix/labs/1/1-22.png"/>

The remote repository should be filled in automatically. Note that its alias is "origin",
even though NetBeans refers to it as "upstream".
<img class="scale" src="/pix/labs/1/1-24.png"/>

The branch to select is pretty obvious...
<img class="scale" src="/pix/labs/1/1-25.png"/>

Updating local references will track differences between your repo and your local project.
<img class="scale" src="/pix/labs/1/1-23.png"/>

If you didn't provide your github account and password when you created the
project, you will be prompted. If you choose to save the password, this prompt
won't be repeated for furure updates.
<img class="scale" src="/pix/labs/1/1-26.png"/>

Once the repo has been updated, check your repository configuration file,
for instance using <code>git>repository>open configuration</code>.
<img class="scale" src="/pix/labs/1/1-28.png"/>

Finally, if you check your repo on github, you will see the changes you made and
pushed to it.
<img class="scale" src="/pix/labs/1/1-32.png"/>


##Webapp Plan

We're going to make a student class, with some properties (surname, first name, a set of email addresses, and a set of grades) and some methods (report contact info, calculate grades average).

We will instantiate a few students, and put them into an associative array that we then order and report.

This is a very simple "app", and only an excuse to explore how the development process works.

Note: You would normally "commit" with a completed set of related changes that don't "break" your app.
You don't have to update the repo with each commit, as they are kept separate by Git.

##Create Your Student Class

Let's start with the student class.

Make a new PHP class, Student. 

Teeny note: the class should be named <code>Student</code> and the source file
should be named <code>Student.php</code>. This only really matters if you want 
full marks for the lab, as Windows will find the source file regardless of case,
while Linux won't. If the source file isn't found when I run the app on my
system, for testing, that is a *BOOM* (2 marks off, per the "Golden Rules").
Just sayin'.

Remove the closing PHP tag, since any whitespace after it is sent to the browser, 
"commiting" the HTML response. Yes, the same term means different things in different contexts.

<img class="scale" src="/pix/labs/1/1-33.png"/>

You don't *have* to "commit" your changes now, but it wouldn't be wrong to do so.


##Add a Constructor

Add a constructor, wherein we initialize the properties...

    function __construct() {
        $this->surname = '';
        $this->first_name = '';
        $this->emails = array();
        $this->grades = array();
    }

Notes: for Java coders:

- The -> operator is used to access class members
- Variable are preceded with a $ sign
- Use single(') or double(") quotes to deliminate strings, but you must use " if it contains special characters, like \n.

<img class="scale" src="/pix/labs/1/1-34.png"/>

You *could* commit at this point, but the changes are still pretty simple.

##Add Some Mutator Methods

Let's add a couple of mutator methods to add an email address or a grade...

    function add_email($which,$address) {
        $this->emails[$which] = $address;
    }

    function add_grade($grade) {
        $this->grades[] = $grade;
    }

Notes: for Java coders:

- If you assign values to an array without the index, PHP will automatically increment the internal reference so each value goes into the next element.

<img class="scale" src="/pix/labs/1/1-35.png"/>

*Now* would be a good point to commit, since we have a complete, albeit somewhat
brain-dead class.

##Calculate a Grades Average

We need to calculate the grades average...

    function average() {
        $total = 0;
        foreach ($this->grades as $value)
            $total += $value;
        return $total / count($this->grades);
    }

<img class="scale" src="/pix/labs/1/1-36.png"/>

##Add a Text Representation

We want to build a fancy text representation for reporting...

    function toString() {
        $result = $this->first_name . ' ' . $this->surname;
        $result .= ' ('.$this->average().")\n";
        foreach($this->emails as $which=>$what)
            $result .= $which . ': '. $what. "\n";
        $result .= "\n";
        return '<pre>'.$result.'</pre>';
    }

Notes: for Java coders:  
- When traversing an array of key/value pairs, for instance "foreach($stuff as $key =>> $value)", you use the => operator to tell PHP to put the current key into the $key variable and the associated value at the key into the $value variable

<img class="scale" src="/pix/labs/1/1-37.png"/>

##Works? Update the Repo

That should do for a start. You might have to fix it a bit :-/

We can't actually test if it works - that will be the next few steps.

<img class="scale" src="/pix/labs/1/1-38.png"/>

And... you can push the changes to the repo, or not.

##Back to the Homepage

Back to the main page, index.php.

The general idea, for the code part of the page...

    <?php
    include('Student.php');

    $students = array();

    foreach($students as $student)
        echo $student->toString();

    ?>

Nothing much will happen yet, as we haven't populated the <code>$students</code> array.
If you run the app, you should see a blank page, but no errors :-/

<img class="scale" src="/pix/labs/1/1-39.png"/>


##Add Your First Student

    $first = new Student();
    $first->surname = "Doe";
    $first->first_name = "John";
    $first->add_email('home','john@doe.com');
    $first->add_email('work','jdoe@mcdonalds.com');
    $first->add_grade(65);
    $first->add_grade(75);
    $first->add_grade(55);
    $students['j123'] = $first;

##Add Your Second Student

    $second = new Student();
    $second->surname = "Einstein";
    $second->first_name = "Albert";
    $second->add_email('home','albert@braniacs.com');
    $second->add_email('work1','a_einstein@bcit.ca');
    $second->add_email('work2','albert@physics.mit.edu');
    $second->add_grade(95);
    $second->add_grade(80);
    $second->add_grade(50);
    $students['a456'] = $second;

##Works? Update Your Repo

Run the app now. Are you getting the expected result?

If so, update your repo.

If not, fix it! You should only commit and update your repo with working code.

##Improve The Student Order

We can add a sort function call, to better order the results.
The following one will order the <code>$students</code> array
in key sequence.

    ksort($students); // one of the many sort functions

##Works? You Know The Drill

If you run your "webapp" now, you should get a list of the two students, ordered by key (Albert then John). The output should look something like ...

    Albert Einstein (75)
    home: albert@braniacs.com
    work1: a_einstein@bcit.ca
    work2: albert@physics.mit.edu

    John Doe (65)
    home: john@doe.com
    work: jdoe@mcdonalds.com

##Make It Look Better

You might have to add a bit of logic to get the students to show with more readable spacing.

##Add Yourself

Go ahead, add a third student (yourself) to the mix. In my case, this might result in the following output...

    Jim Parry (85) work: jim_parry@bcit.ca

##Are We There Yet?

Although not expected, you are welcome to play with the output produced, so it looks better :)

I shouldn't have to remind you to comment your code, right? We're all professionals, or aspiring ones!

Once done, commit any changes and update your repo.

The lab submission will be a link to your repository, NOT a cloning URL.
You may have to add a dummy text file, as D2L wasn't accepting submissions
with text only.
