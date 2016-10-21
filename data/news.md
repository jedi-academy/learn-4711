**PHPMyAdmin Issues** *(Thu Oct 20 21:00)*  
*Question:* A lot of students are experiencing an issue where they can't open/connect to their 
phpmyadmin database when their web server is using the port.  
Let say I have my web server port set to 77, I am not able to open/connect to my 
phpmyadmin which causes error when the app tries to grab data from the database.  
However, database works fine after I changed the port to something else as long 
as the web server is not using them.

*Answer*:
The Bitnami XAMPP stack contains some buried configuration file(s) which
setup the virtual host "phpmyadmin". When we setup virtual hosting,
it ap[pears to clobber the original settings, preventing PHPMyAdmin from
being properly accessed. The workaround above is one way to solve it, 
but a bit of a pain in the butt!

What I did was install a fresh copy of PHPMyAdmin, and added my own
local domain (phpmyadmin.local) and virtual host entry for it,
totally avoidiung the package bundled with Bitnami's XAMPP. 
I concluded that, for me, this was the least painful option.

**Week 7** *(Thu Oct 20, 15:00)*   
Oh no - there is a mistake in the Job 1 writeup!!
In step 1.5, the odd/even direction is determined and set as a view parameter.
and then $category is merged with it. I think that $category is an object at
this point, and the operation does not work as intended.

IF you complete this step in the tutorial, and your images are
not shown alternating left/right, then...

Instead of:

	$viewparms = array(
        'direction' => ($oddrow ? 'left' : 'right')
    );
	$viewparms = array_merge($viewparms,$category);
	$result .= $this->parser->parse('category-home', $category, true);
        
I suggest
		
    $category->direction = ($oddrow ? 'left' : 'right');
    $result .= $this->parser->parse('category-home', $category, true);
        
I have fixed this, but the warning may apply if you looked at an early version of the tutorial.

**Assignment 1** *(Tue Oct 18, 15:00)*  
First pass done, and I made a gallery of the homepages.  
Some look great, and some have case sensitivity issues :-/  
Any corrections or changes are to be done in your develop branch,
and not in your master branch, which I am using for marking!
