#Week 2 Survey Results

Responses for the survey follow, with the number of similar
responses shown to the right of a response.	
	
I have interpreted and aggregated some of the results, in hopefully an appropriate fashion.
I have addressed some of the questions here, while others will
be addressed in lecture or in lab.

There were 31 responders, with some good and some challenging questions.
Thank you to those who responded :)
	
There were a lot of different questions, some of which were general:
- Are we expected to ask questions during these surveys every week? Since we're pre-reading these, we can usually google any questions we have.	  
_Yes. Well, you don't have to ask questions if you don't have any, nor do you have to provide three
responses for each part of a survey. You can answer "n/a" if you don't have questions.  
These surveys give you an opportunity to influence the lecture content & direction;
they help me figure out which parts of the material need better explanation;
and they give me a measure of assurance that the content is being read._
- Are we expected to comment on lessons that we feel need explanations? What if you do a perfect job? :)	  
_Simply answering "n/a" or "none" still lets me know that you read the lesson._

##WEEK 2 – MVC FRAMEWORKS			
			
###What are topics from the lesson that *you* feel need more or better explanation?			

- Design Pattern driven (active record, DAO, session facade)	10  _Flagged_
- Fundamental Pattern	8  _Updated_
- CodeIgniter architecture	4  _Updated_
- Frameworks	4  _Updated_
- Approach Evolution	3  _Updated_
- Client/Server side MVC implementation	3
- Web Tier basics (slide 3)	3  _Updated_
- On slide 8, you say that code igniter is not conventional PHP scripting? What is?	2  
_Conventional PHP scripting is snippets of procedural code embedded in an HTML page._
- Advantage and disadvantage using MVC	 
_Separation of concerns, leading to defensible and testable design._
- Are we supposed to have multiple Application Controllers (one for each area) or just one that handles them all?	 
_Yes. Multiple controllers, some of whichh might have sub-controllers, and serving different purposes._
- CodeIgniter development	 _Development of CodeIgniter? Development using CodeIgniter?_
- examples of how the frameworks may differ	 
_For each of the upcoming lessons, I have a separate reading showing how some of the different
frameworks address that lesson's topic._
- Incoming requests are routed (in relation to CodeIgniter) and the appropriate controller handles each one. What types of controllers are there?	 
_I distinguish three kinds of controllers: usecase, service and utility. More on these over the next couple of weeks :)_
- Is there a MVC framework that is most widely used in the industry?	 
_Based on "popularity", Laravel appears to have the edge._
- Just for the diagrams provided in the slides to be explained clearly	_Ok - will add text as I can_
- Maybe more information on the best practices of MVC	_Coming weeks :)_
- Ones with pictures are better than words only, ex. Fundamental Pattern	
- Programming languages that should use MVC frameworks	 
_You name it! https://en.wikipedia.org/wiki/Comparison_of_web_frameworks _
- reasons to use different frameworks (eg in what case would you use fat-free over code igniter)	_Will elaborate_
- Since we are going to use CodeIgniter, I think it would be helpful if you go through the folders and pointed out which one is the Model, View, Controller, database, etc	_In lab_
- The allowed technologies or common alternatives	_Allowed??_
- using/creating the framework	_??_
- Web Server Basics needs some clarification about what each component means.	_Updated_
- why we are using a localhost	 
_Not mentioned in the lesson, hmmm. We use local testing to reduce dependency on an internet connection
for development, and to be in total control of the testing environment.
This is not the only choice. _
			
###Are there other, related, questions that you would like addressed in class?			

- Why do we use CodeIgniter instead of other frameworks?	3  
_Lean, simple, fast, encourages good design practices_
- Any code examples on the MVC controller	 
_Loads on jedi-academy; these will be used and referenced in upcoming lessons and labs_
- Are there other frameworks other than MVC that's used?	 
_The n-tier architecture is still popular with enterprises; you could argue that microservices
are an alternative, but they are really MVC encapsulated (like Java Swing)._
- common backend practices using php	_Security, security and security ... coming_
- going over some php syntax	_Ask me in lab, after reading the reference/PHP comparison to Java_
- How can MVC be incorporated nicely with OOP methods?	 
_Er, MVC *is* O-O ... hard to image it being implemented without OOP._
- How do all the MVC frameworks compare against each other?	 
_Not perfect, but https://en.wikipedia.org/wiki/Comparison_of_web_frameworks _
- how would we determine what belongs in the webclient and webserver	 
_Tell yourself that Javascript is client-side and everything else is server-side.
You can use a framework client-side (eg Angular, Dojo)._
- How would you chose which framework is best? (codeIgniter,CakePHP,Kohana?)	 _Updated_
- I would appreciate a more in depth example of an MVC rlated to a real world example.	_Upcoming_
- is a front controller typically in a seperate file	 
_Yes, unless the web server **is** the framework, as is the case with Tomcat._
- is there a conventional file extension for a front controller	 
_For a PHP framework, it would usually be **index.php**._
- Is there another design pattern that is as or more popular than MVC?	 
_Traditionally, n-tier architecture, which is now considered MVC within
each of several layers, eg client, presentation, application, data access, data storage._
- Other options to an MVC framework(MVVM, MVP)	 
_MVVM, MVP, MVA are variations on MVC. Upcoming._
- php and database	_Upcoming_
- Some background on codeigniter	_??_
- Speaking of CodeIgniter, are there any benefits of it comparing to other handy dev engine/tools such as WIX.com?	 
_WIX is an easy-to-use but proprietary and externally hosted website building tool.
It is not comparable to a developer's framework.
- The allowed technologies or common alternatives	
_If you asking about using a different programming language or PHP framework, no.
If you are asking about common practices, Java EE is huge in enterprises, and ASP
is big too, but both of those have much higher barriers to entry and deployment._
- What are the best practices for MVC?	 
_See the golden rules. Other practices as we address each kind of component._
- what challenges we might face this term specifically from our set standpoint.	 
_Depends on the set. Ask in class or lab._
- What is a virtual host and how does it work?	 
_It is a locally defined domain name, which we map to a specific document root
through Apache or NGINX. The technique lets us play with multiple apps
at the same time._
- what is the core learning intentions	 
_Have you read the course outline / syllabus? What isn't clear?_
- what is the difference between MVC frameworks? (CodeIgniter & Laravel)	 
_Addressed on the framework categories slide ... ask additional questions in class._
- Which MVC frameworks you like the most?	 
_I have seen a number, and worked with a few in more depth (Java servlets, JSP, 
Fat-Free). CodeIgniter caught my eye when I first encountered it, six years ago,
and it is my favorite for a number of reasons and purposes.
"I liked it so much I adopted the project :)"_
			
##WEEK 2 – DEVOPS WORKFLOW
			
###What are topics from the lesson that *you* feel need more or better explanation?			

It is clear from the questions that this lesson needs careful explanation in class.

Many of the questions will be answered gradually, in class and lab, as we progress
through the labs and assignments.
I have made a couple of notes below, in addition.

- Branching workflow	8
- Forking Workflow	5
- Centralized Workflow	4
- Gitflow Workflow (slide 4)	4
- Gitflow Workflow Checklist	4
- how to resolve merge conflict	2
- Categorizing MVC Frameworks	
- creation/location of the develop branch	
- Detailing some of the uses and applications of different Design Patterns ( particularily the ones mentioned )	 
_Er, this question is in the wrong survey_
- does each developer have his own dev branch?	
- git commands	
- Gitflow Gotchas (slide 8)	
- GitFlow usage as opposed to any other source control	
- Gitflow workflow checklist could be better if it had an example of the flow	
- How to be safe not to override master accidentally?	
- How to handle the problems mentioned in the second last slide.	
- How well does the Forking Workflow work if there are multiple given maintainer rights for the official repo?	 
_Danger, Will Robinson! Your team repos in this course should have a single maintainer only
(the "Captain"). Larger projects will have several, but that needs to be coordinated._
- If it's possible could you show an example of the proper steps on a github repository	
- Master Vs Develop branch	
- Most open source projects use the "gitflow workflow", could you give some practical examples with this?	
- using the commands in the prompt with examples	
- What are some strategies to use to get around the downfalls of gitflow? (slide 8)	
			
###Are there other, related, questions that you would like addressed in class?			

- Are any of these workflows clearly better/worse than others?
- Are we gonna be proficient with GIT by the end of the course?  _I hope so!_
- handling merge conflicts
- How does forking ensure an extra "protective" measure? ( if it does at all .. )
- How does Gitflow enhance branching? _Convention, not enforcement_
- How to delete a commit
- How to make sure an update doesnt break your code/repo?
- How to revert a commit
- I noticed that some open source uses SVN, not quite sure about SVN. Is SVN a gitflow or forking flow?  
_SVN is an alternative to Git, that can be used as the code versioning within gitflow.
It isn't identical, and you lose/gain some things (eg subtrees vs externals)._
- If we use alternate repos and make pull requests to the original, why would we need any branches besides master and dev?
- Interception Filters ( Hooks ) are briefly mentioned ... what are they meant to do? _Wrong survey_
- Last slide mentioned git has problems, are these problems not solvable by git? Are there any solutions to them?
- synchronization problems vs merge conflicts. What are the main differences between them.
- the difference between pulling and cloning. Arent they doing the same thing
- using backups _??_
- What are other commonly used workflows other than gitflow?  
_You could argue that waterfall, agile, extreme, or rational are all alternatives.
There are variations on gitflow too._
- what are other version control tools besides git that are frequently used in todays industries  
_SVN, Mercurial, BitKeeper, CVS. Git has the majority mindshare._
- What are the best ways to avoid some of the problems mentioned at the end?
- What are the key differences between gitflow workflow and forking workflow?  
_Gitflow incorporates forking_
- What are the most commonly used Git workflow in major industries?  _Updated_
- What are the points of consideration when a specific workflow is decided?
- What is premature closing?  
_Mentioning an issue number improperly in a PR can cause the issue to be closed
when that wasn't the intent._
- What is the difference between the different companies that offer these repository services, why doesn't everyone just use Github?  
_Private vs public, scale, web vs hosted, branding, other tool integration._
- What other workflows are their? Are there any specifically for single developer projects?
- why this survey is the same as the other one  
_The surveys are there to provide an opportunity to ask questions or for elaboration, for each of the
lessons._
- Why use git as opposed to any other source control?
- Why would a dveloper have to fork their changes to their own repo when they can just branch?  
_You fork to keep the team stuff separate from your work in progress.
You branch to group together a feature set, which could be worked on by multiple people._
- Will we learn branching in this course? _Yes_
- Would like to see an example of how git is used _In lab_
