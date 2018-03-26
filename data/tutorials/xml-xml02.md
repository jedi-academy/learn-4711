#Tutorial xml-xml02 - Handling Sales Orders with XML
COMP4711 - BCIT - Fall 2016

##Planning

Let's plan a few things before we start modifying code.

We have a shopping page, after completing either lab 6 or lab 7, looking somewhat like:
<img class="scale" src="/pix/tutorials/x2/71.png"/>       

We want to make the menu item icons "live", so that clicking on one adds one
of that item to an in-progress order. 

I want to store the order as an XML 
document, because it suits the rich structure of an order, with nested items.
The SQL file I provided earlier has Orders and Orderitems tables, which
would be one good way to handle saving orders if we were to use an RDB.
But that needs two tables. The Orderitems table would be an associative
table, because an order could refer to multiple menu items, and a menu item
could appear in multiple orders. So ... XML makes sense for data representation,
in this case.

The second thing I want to plan is how the shopping page should work,
generally. I would like it to display the current ordering page (but "live")
if we are in the process of entering an order, or else a summary of the orders
processed already, if no order is underway. We can tell the state we are in
by testing if the session contains an order object, the same way
we did for menu maintenance last week.

What we want to do should be clear - how we go about it is the fun part :)


##1. State-Driven Shopping Controller

Starting this tutorial, your <code>controllers/Shopping.php</code> should look something like...

    class Shopping extends Application {

	function __construct() {
		parent::__construct();
	}
	
	public function index() 	{
            $stuff = file_get_contents('../data/receipt.md');
            $this->data['receipt'] = $this->parsedown->parse($stuff);
            $this->data['content'] = '';

            // pictorial menu
            $count = 1;
            foreach ($this->categories->all() as $category) {
                    $chunk = 'category' . $count; 
                    $this->data[$chunk] = $this->parser->parse('category-shop',$category,true);
                    foreach($this->menu->all() as $menuitem) {
                            if ($menuitem->category != $category->id) continue;
                            $this->data[$chunk] .= $this->parser->parse('menuitem-shop',$menuitem,true);
                    }
                    $count++;
            }
            $this->render('template-shopping'); 
	}
    }   

To refresh your memory, the default action of the controller is 
- to retrieve a "receipt" markdown file, the parsed contents of which are passed as the "receipt" view parameter
- to create an empty "content" view parameter, to prevent the base controller trying to parse a "pagebody"
- create a "chunk" view parameter which combines smaller view fragments for
menu categories and menu items
- and then to render the page sing the shopping template.

We don't want to throw this code away, but we only want to show it if the
user is in the middle of an order. We can tell that by testing if there is an
"order" item in the session. If so, display the menu as above; if not, display a summary
of the orders processed so far.

We can start down this road by replacing the beginning of the <code>index()</code>
with a suitable test and then calling the appropriate method.

	public function index() {
		// What is the user up to?
		if ($this->session->has_userdata('order'))
			$this->keep_shopping();
		else $this->summarize();
	}
	
	public function summarize() {
		$this->data['content'] = 'we need to flesh this out';
		$this->render('template');  // use the default template
	}
	
	public function keep_shopping() {
        $stuff = file_get_contents('../data/receipt.md');
        ...

Try this. The result isn't very exciting or informative, but 
should be what we expect at this point.
<img class="scale" src="/pix/tutorials/x2/72.png"/>       

By the way, if you find the page rendering time message annoying, feel
free to remove it from your templates :-/

##2. Order Model

We're not going to get too much further without a model, so let's
start on that. It will encapsulate the state of an order, but
isn't meant to be tied to a relational database table.

Looking at the receipt shown previously, we need to keep track of the
order date & time (when created), and a collection of items that
make up that order. The order total can be calculated from the items.

There should be no mention of XML, as we are not dealing with persistence yet.
This suggests the following starting point, <code>models/Order.php</code>:

    <?php
    class Order extends CI_Model {

            // constructor
            function __construct() {
                parent::__construct();
                $this->number = 0;
                $this->datetime = null;
                $this->items = array();
            }
    }

That's it? Yes, we can set the date/time, and assign an order #, when we save it.
Very minimalist - love it!

Note that is it nowhere near as formal as an entity model in many environments.
There is nothing wrong with planning all the properties ahead of time, making protected variables
for each, and then having getters and setters ... it doesn't add to what we
are trying to do in the tutorial, however.


##3. Start a new order

It is time to provide for an order summary view, although the only thing we know
for sure is that we need to be able to start a new order, which can be done
with a button link.

Not very impressive, but we can add <code>views/summary.php</code>:

    <h1>Orders Processed So Far</h1>

    <a class="btn btn-default" role="button" href="/shopping/neworder">Start a New Order</a>

We will need a new method in our Shopping controller to deal with this.

    public function neworder() {
        // create a new order if needed
        if (! $this->session->has_userdata('order')) {
            $order = new Order();
            $this->session->set_userdata('order',$order);
        }

        $this->keep_shopping();
    }

Did you remember to autoload the Order model?

Fix the Shopping <code>summarize()</code> so that it loads our
new view fragment instead of a hokey message:

	public function summarize() {
		$this->data['pagebody'] = 'summary';
		$this->render('template');  // use the default template
	}

Reloading the shopping page should show our empty order list, and our button:
<img class="scale" src="/pix/tutorials/x2/73.png"/>       

Clicking on the button will lead to the original shopping page :)

##4. Changing Our Mind?

What if we want to cancel an order? This would be good for testing too :)

We didn't provide a separate single view fragment for shopping,
opting for a view fragment for each menu category and one for a receipt.

The easiest way to deal with cancelling an order is to add
a button in our <code>views/template-shopping</code>, at the proper spot:

    ...
                            {category3}
                    </div>
            </div>
            <div class=row">
                     <a class="btn btn-default" role="button" href="/shopping/cancel">Cancel This Order</a>
            </div>
    </div>
    <div class='col-md-3'>
            {receipt}
            ...

We can then add a <code>cancel()</code> method to the <code>Shopping</code>
controller:

	public function cancel() {
		// Drop any order in progress
		if ($this->session->has_userdata('order')) {
			$this->session->unset_userdata('order');
		}
		
		$this->index();
	}

Try it! You should be able to start and cancel orders at will,
effectively toggling between the order summary and the shopping page :)

##5. Adding an Item to an Order

My "vision" is that each time we click on a menu item
on the shopping menu, one of that item gets added to the order.

We will need to deal with that in our <code>Order</code> model!

My intent is that the array of items in an order would be indexed
by menu item code, and that the value would be the number of that
menu item to go in the order. Simplistic, for sure, but complexity
can be added later if you like.

Our <code>Order</code> will need a new method for this:

	public function addItem($which=null) {
		// ignore empty requests
		if ($which == null) return;
		
		// add the menu item code to our order if not already there
		if (!isset($this->items[$which]))
			$this->items[$which] = 1;
		else {
			// increment the order quantity
			$this->items[$which]++;
		}
	}

We don't know if this works yet ... time to test it.

##6. Enable Menu Item Buttons

Our menu is shown as the images of each menu item available, organized
into columns by category. This is managed by the <code>views/menuitem-shop</code> view
fragment, and the individual menu items are passed to the view fragment
in <code>Shopping::keep_shopping()</code>.

The view fragment right now should look like:

    <img class="scale" src="/images/{picture}"/><br/>

This needs to be made into a link, bound to a suitable method inside our controller.

    <a href="/shopping/add/{id}"><img class="scale" src="/images/{picture}"/></a><br/>

... and the handling method inside the controller:

	public function add($what) {
		$order = $this->session->userdata('order');
		$order->additem($what);
		$this->keep_shopping();
	}

If we try to add an item to our order, however, our webapp blows up :(
<img class="scale" src="/pix/tutorials/x2/74.png"/>       

Oh dear! Saving objects in a session is more complicated in PHP than
it is in Java :(

The solution: save the object as an array in the session,
and recreate it from the array state when we get it out of the session.

This will involve changing the <code>Shopping::neworder()</code> method:

    $this->session->set_userdata('order', (array) $order);

and the <code>Shopping::add()</code> methid:

    $order = new Order($this->session->userdata('order'));

and we need to beef up our <code>Order</code> constructor:

	// constructor
	function __construct($state=null) {
		parent::__construct();
		if (is_array($state)) {
			foreach($state as $key => $value)
				$this->$key = $value;
		} else {
			$this->number = 0;
			$this->datetime = null;
			$this->items = array();
		}
	}

Make these changes, cancel your order, and try again.

It no longer blows up, but how do we see what is in an order?

Ah - we didn't save the updated order in the session.
We can add that to <code>Shopping::add()</code>:

		$this->session->set_userdata('order',(array)$order);

That may be an improvement, but there is no visible difference after making this change.
Did we actually add anything??

##7. Show Order Receipt

Hmmm - the right column in our shopping page is supposed to show the
in-progress order. It sounds like we need to generate that inside our <code>Order</code>
class now, and modify the <code>Shopping</code> controller to
use the order-generated receipt rather than the fake one we had before.

Our <code>Order</code> can generate a text receipt in markdown format,
loosely modeled after what you have in your fake receipt.

Mine would be something like:

	public function receipt() {
		$total = 0;
		$result = $this->data['pagetitle'] . '  ' . PHP_EOL;
		$result .= date(DATE_ATOM) . PHP_EOL;
		$result .= PHP_EOL . 'Your Order:'. PHP_EOL . PHP_EOL;
		foreach($this->items as $key => $value) {
			$menu = $this->menu->get($key);
			$result .= '- ' . $value . ' ' . $menu->name . PHP_EOL;
			$total += $value * $menu->price;
		}
		$result .= PHP_EOL . 'Total: $' . number_format($total, 2) . PHP_EOL;
		return $result;
	}

Use this in place of the dummy receipt, with a slight change inside
<code>Shopping::keep_shopping()</code>:

	public function keep_shopping() {
            $order = new Order($this->session->userdata('order'));
            $stuff = $order->receipt();
            $this->data['receipt'] = $this->parsedown->parse($stuff);
        ...

My shopping page now shows my receipt:
<img class="scale" src="/pix/tutorials/x2/75.png"/>       

Yours would show your diner name, of course, and would reflect what you have put into 
your order :) You can play with different date formatting constants, or
even build your own, inside the receipt generation - up to you.

##8. Initiate Order Checkout

Ok - we are ready to take money from our customers :)

We need to add a "checkout" button on the shopping page.
I suggest the easiest place for that is beside the "Cancel this order"
button that we added earlier.

You are probably feeling that hard-coded buttons inside a template is a
bad practice, and you are correct. Fixing that, with a different view
fragment, for instance, is a task for another day :-/

Inside our <code>views/template-shopping.php</code>,
we need to add another line above the  button link we added in step 4.

    <div class=row">
             <a class="btn btn-primary btn-default" role="button" href="/shopping/checkout">Checkout</a>
             <a class="btn btn-default" role="button" href="/shopping/cancel">Cancel This Order</a>
    </div>

Reload the shopping page and ...
<img class="scale" src="/pix/tutorials/x2/76.png"/>       

Woohoo!

Wait a minute ... have you noticed anything funny?
When we added an item, the browser location field changed to
".../shopping/add/...". Whenever we reload the page, we are adding 
another of the last menu item we added to our order.
With my testing, I am up to an order which includes six turkeys!

Oops! At the end of <code>Shopping::add</code>,
we should redirect to the shopping page, rather than simply
rendering the menu.

		redirect('/shopping');

That will fix that problem :-/

##9. Handle Order Checkout

What about actually checking out? We need to see if we are ready to check
out, and then we need to save the order if so.

The boss has dictated that an order has to have at least one menu item
from each menu category in order to be acceptable.

We should add some validation to the <code>Order</code> to test that:

	// test for at least one menu item in each category
	public function validate() {
		// assume no items in each category
		foreach($this->categories->all() as $id => $category)
			$found[$category->id] = false;
		// what do we have?
		foreach($this->items as $code => $item) {
			$menuitem = $this->menu->get($code);
			$found[$menuitem->category] = true;	
		}
		// if any categories are empty, the order is not valid
		foreach($found as $cat => $ok)
			if (! $ok) return false;
		// phew - the order is good
		return true;
	}

We can use this inside the <code>Shopping::checkout</code> handling.
Cheesy, in that we ignore invalid orders, but ...

	public function checkout() {
		$order = new Order($this->session->userdata('order'));
		// ignore invalid requests
		if (! $order->validate())
			redirect('/shopping');
		
		$this->data['content'] = 'Ready for checkout.';
		$this->render();
	}

You were probably wondering when XML would come into play
in the tutorial. Now is the time, as we need to save the order.
We will add an <code>Order::save()</code> method to
create an appropriate XML document and store it :)
This will draw on the XML processing lesson, and on the
example-simplexml repository discussed in class.

	public function save() {
		// figure out the order to use
		while ($this->number == 0) {
			// pick random 3 digit #
			$test = rand(100,999);
			// use this if the file doesn't exist
			if (!file_exists('../data/order'.$test.'.xml'))
					$this->number = $test;
		}
		// and establish the checkout time
		$this->datetime = date(DATE_ATOM);
		
		// start empty
		$xml = new SimpleXMLElement('<order/>');
		// add the main properties
		$xml->addChild('number',$this->number);
		$xml->addChild('datetime',$this->datetime);
		foreach ($this->items as $key => $value) {
			$lineitem = $xml->addChild('item');
			$lineitem->addChild('code',$key);
			$lineitem->addChild('quantity',$value);
		}
		
		// save it
		$xml->asXML('../data/order' . $this->number . '.xml');
	}

There are a number of improvements that could be made to this,
but there is only so much time to work on it :-/

With the saving ready, our <code>Shopping::checkout()</code>
can be modified to use it.

	public function checkout() {
		$order = new Order($this->session->userdata('order'));
		// ignore invalid requests
		if (! $order->validate())
			redirect('/shopping');
		
		$order->save();
		$this->session->unset_userdata('order');
		redirect('/shopping');
	}

Note: you may find that you get a permission error trying to save
the order file inside your <code>data</code> folder, and you
may have to make the folder writeable :-/

##10. Fix the Order Summary

After saving an order, the only way we can find out if it worked is by checking
our <code>data</code> folder :( We need to show a list of the orders
on the shopping page, when we aren't in the middle of creating a new one.

We need to find all the order files in our data file, open each up
as an <code>Order</code> object,
and a one-line summary for it.

First up is enhancing the <code>Order</code> constructor (again), so that it can
retrieve its state from a stored XML document. Do this by passing the name
of the file to the constructor...

	// constructor
	function __construct($state=null) {
		parent::__construct();
		if (is_array($state)) {
			foreach($state as $key => $value)
				$this->$key = $value;
		} elseif ($state != null) {
			$xml = simplexml_load_file($state);
			$this->number = (int) $xml->number;
			$this->datetime = (string) $xml->datetime;
			$this->items = array();
			foreach ($xml->item as $item) {
				$key = (string) $item->code;
				$quantity = (int) $item->quantity;
				$this->items[$key] = $quantity;
			}
		} else {
			$this->number = 0;
			$this->datetime = null;
			$this->items = array();
		}
	}

Before we dive into our controller, we should plan how we are going to
preent the order summary. I suggest changing <code>views/summary.php</code>
to provide for iterating over order lines that we will need to create.

    <h1>Orders Processed So Far</h1>

    <table class="table">
            <tr><th>Order #</th><th>Date/time</th><th>Amount</th></tr>
    {orders}
        <tr>
                <td>{number}</td>
                <td>{datetime}</td>
                <td>{total}</td>
        </tr>
    {/orders}
    </table>

    <a class="btn btn-default" role="button" href="/shopping/neworder">Start a New Order</a>

This is perfect, well except for having any data :-/
<img class="scale" src="/pix/tutorials/x2/77.png"/>       

Now we can beef up the <code>Shopping::summarize()</code>, to provide
the data to report. From the planned view,
we know we need to build an associative array of arrays.

	public function summarize() {
		// identify all of the order files
		$this->load->helper('directory');
        $candidates = directory_map('../data/');
		$parms = array();
        foreach ($candidates as $filename) {
		   if (substr($filename,0,5) == 'order') {
			   // restore that order object
			   $order = new Order ('../data/' . $filename);
			// setup view parameters
			   $parms[] = array(
				   'number' => $order->number,
				   'datetime' => $order->datetime,
				   'total' => $order->total()
					   );
		    }
	    }
		$this->data['orders'] = $parms;
		$this->data['pagebody'] = 'summary';
		$this->render('template');  // use the default template
	}
	

Ohoh - I planned to add a <code>total()</code> method to the <code>Order</code>
class, but forgot to do so. That would be...

	public function total() {
		$total = 0;
		foreach($this->items as $key => $value) {
			$menu = $this->menu->get($key);
			$total += $value * $menu->price;
		}
		return $total;
	}	

That's more like it!
<img class="scale" src="/pix/tutorials/x2/78.png"/>       

##11. Examine an Old Order?

It would be nice to see the details of a processed order, for confirmation.
Let's add a link to the line for each order displayed in the summary,
and have that trigger a recreated receipt for that order.

Modify the summary view fragment, embedding the order # in a link...

    <tr>
            <td><a href="/shopping/examine/{number}">{number}</a></td>
            <td>{datetime}</td>
            <td>{total}</td>
    </tr>

Add an <code>examine</code> method to your shopping controller...

    public function examine($which) {
        $order = new Order ('../data/order' . $which . '.xml');
        $stuff = $order->receipt();
        $this->data['content'] = $this->parsedown->parse($stuff);
        $this->render();
    }
	

And ...
<img class="scale" src="/pix/tutorials/x2/79.png"/>       

The change to have the order # show up, like it does, is not in the above;
that is something for you to figure out! :)

##12. Are We Safe?

You should have a functional shopping page by now.
We can only add to an order, and not remove items if we change our mind,
but we are functional, and the orders are stored in and retrieved from
XML documents :)

I was pleasantly surprised at how small a role XML played, but it "feels right".
