#Week 12 Survey Results	
	
Responses for the survey follow, with the number of similar
responses shown to the right of a response.
	
There were 19 responders.
	
I have interpreted and aggregated some of the results, in hopefully an appropriate fashion.
Thank you to those who responded :)
	
##WEEK 12 – REST
	
###What do *you* think the most important takeaways are from this lesson?	
	
- **The lack of REST standards**	5
- **Rest in Codeigniter**	4
- **Restful services**	4
- What AJAX is and how it relates to REST.	3
- **Client-Server Connections**	2
- Service Oriented Architecture	2
- The different REST approaches	2
- a working demo	
- Architecture	
- CI REST still needs to data format conversions, and provide sets of verb based routing rules for each service.	
- Communication between pages/classes within a site	
- Relatively simple	
- REST Implementation	
- REST is awesome	
- Stateless	
	
	
###What are topics from the lesson that *you* feel need more or better explanation?	
	
- Restful Pagination	2  
_My point was that there is no standard or better explanation, just different interpretations :(_
- Service oriented architecture	2  
_In lecture..._
- A little bit more on Rest Issues	  
_In lecture..._
- Ajax implementation	  
_Out of scope_
- Ajax.	  
_Separate lesson for that_
- client server	  
_Hmmm. Client-server is a style or convention where one component (client)
sends a request to another (server) and expects a response. The normal
reason for wanting to do this is because the "server" component has
exclusive or elevated access to a resource, and you want it to do something
on your behalf.  
Using "client-server" style, you have lots of choices for the transport,
data representation, and application interfaces.  
A component can be both client and server!_
- For distributed systems, what does it mean when different components are conceptually on different servers?	  
_Use distinct names, eg client.local and server.local, which both map to your computer, making
testing easier, although they **could** map to systems elsewhere._
- Microservers. Are they API's or seperate physical servers or just seperate domains	  
_They are "servers" that manage a specific subset of functionality for a company.
Each would be a separate endpoint, which **could** suggest separate domains.
Done carefully, they would be implemented in the cloud, and it would not be
apparent if they were physically separate or not._
- Microservices	  
_See above?_
- Rest implementation	  
_In lab..._
- Rest in CodeIgniter	  
_In lab..._
- What does using multiple endpoints for a single REST service accomplish?	  
_Confusion, IMHO_

	
###Are there other, related, questions that you would like addressed in class?	
	
- Some images are broken	3  
_I uploaded the images to the wrong folder originally, sorry.  
You could always send me a quick email if this happens ... 
the issue is likely to be fixed sooner than if I don't become
aware of the problem until after I check the survey responses, 
once the survey closes._
- How do you create a server?	  
_Unclear question. Physical? HTTPD? REST?  
The latter should be clearer after lecture/lab._
- How large can data be transferred using REST	  
_That is a PHP or HTTP configuration issue, depending on the
HTTP type of the request.  
A "get" would be limited by the length of a URL with query string, while
a "post" would be limited by the maximum upload file size in php.ini._
- RPCs - Do they have other uses?	  
_Other uses ... other than what?  
RPC, REST, SOA ... these are all distributed application "glue",
all of them used for reducing coupling, increasing cohesion,
and separating responsibilities ... all basic and sound O-O principles.  
Some of the techniques would favor one of the O-O principles over the
others, but all are good._
- Using J query with Ajax  
_Out of scope_	
- what is differece of restful between CodeIgniter and regular platform?	  
_There is no "regular". REST implementations, client or server (especially
server) differ for each platform or framework you use._

###Do you have comments or suggestions about the flipped learning process?

- Broken images	3  
_addressed above._
- Dont like it	  
_Acknowledged. I trust you completed the "planning ahead" survey, so
your voice is counted when I summarize my experiences with it for
the rest of the CST faculty._
- I strongly feel that it is a good learning process for small class sizes.	  
_Acknowledged. I trust you completed the "planning ahead" survey, so
your voice is counted when I summarize my experiences with it for
the rest of the CST faculty._
