#Week 13 Survey Results	
	
Responses for the survey follow, with the number of similar
responses shown to the right of a response.
	
There were 20 responders.
	
I have interpreted and aggregated some of the results, in hopefully an appropriate fashion.
Thank you to those who responded :)
	
##WEEK 13 – Authentication
	
###What do *you* think the most important takeaways are from this lesson?	
	
- **Authenticate, and enforce access based on user roles**	9
- **CodeIgniter Authentication**	6
- bot detection and coding against them (captcha)	3
- importance of hashing and securely storing passwords	3
- Access Control Pseudocode	2
- **CodeIgniter Authorization**	2
- Consider implementing facebook or google integration	2
- Access(or/ing), and Audit(or/ing)	
- Categories of users	
- codeigniter doesn't come with provision for authentication	
- How codeigniter does it	
- Make the process easy, verify user through email, defeat bots using tools like captcha	
- Security involves authentication, authorization, access, and auditing.	
- Sessions	
- The structure	
	
###What are topics from the lesson that *you* feel need more or better explanation?	
	
- Auditing	2  
_A verifiable, datetime-sequenced record of activity/events; searchable & reportable.  
See system/core/Log and system/core/Common_
- How does a hidden comment field detect bots?	2  
_It is hidden through CSS, which bots do not normally process.
They will fill it in, so you can test for content in such a field to recognize a bot.  
The User Agent library provides an is-robot() method, but that can be defeated by a
malicious bot._
- Accessing	  
_Refers to the mechanism you choose to authenticate users & make sure they
are authorized to access something (a URI?).  
It is commonly done through user roles._
- advantages/disadvantages to each authentication choice	  
_Addressed during lecture_
- Authorization choices? What is rule?	  
_ACL has rules, per asset or user, on allowable access rights.  
Eg. /admin can be accessed by user in "admin" role, with IP address within intranet.  
Rules can be asset-based (eg an Asset Control List: who is allowed to do what to a folder), or
user-based (eg a User Capability List: what is this user allowed to do with different assets)._
- CodeIgniter Authentication	  
_Addressed during lecture_
- CodeIgniter Authorization	  
_Addressed during lecture_
- Demonstration and code examples of oAuth as it is a popular method of applying authorization	  
_Out of scope_
- i feel more will be taught in lab.	  
_No lab on this. Tutorial provided instead, for those interested._
- if users login with social logins, can we see their email for that service?	  
_That depends on whether the user has chosen to share that with an app._
- Practical social media code with increasing use of social media login	  
_Out of scope_
- Show how other authorization solutions work	  
_Out of scope_
- The practice	  
_Yes? addressed during lecture?_
- The two security models - what is the federations of trust?	  
_A federation of trust is an agreement between apps to grant access.  
Eg login to BCIT campus network (A), and be allowed to access employee benefits site (B).  
(B) can ask (A) for token proving that the user is an employee._
- Third party libraries	  
_Yes? slide 23??_

	
###Are there other, related, questions that you would like addressed in class?	
	
- are sessions safe?  
_Yes. The only thing exposed is the session ID, stored as a cookie client-side.
CSRF can be used to foil spoofing._
- Are there any new methods of authentication that are currently being developed  
_Biometrics, RSA keys, AI bad behavior detection..._
- Bad patterns to avoid?  
_Generally, don't roll your own unless super simple app; never store passwords
in plaintext; never send credentials in the open_
- Can you get user roles from OAuth authentication?  
_Sort of: resource owner, resource server, client app, authorization server.  
OAuth has "scopes", which can be treated as conventional "roles"._
- More detail about oAuth    
_Out of scope_
- showing the psuedocode was helpful
- What kind of technologies/techniques are used to detect bots?  
_Well-behaved: user agent string. Others: (re)captcha, suspicious request patterns
or frequency, ICE, blacklists..._

###Do you have comments or suggestions about the flipped learning process?

- I am not a robot.
- Section 2 of the lesson seems to come out of nowhere.  I need more explanation on those diagrams.    
_Addressed during lecture ... I am surprised this question didn't come up sooner :-/_


