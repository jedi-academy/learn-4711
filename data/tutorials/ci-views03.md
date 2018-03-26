#Views - Making the Shopping page

_Part of COMP4711 Lab 5, Fall 2016_

<div class="alert alert-info">
This assumes that you have completed parts 1 & 2 of the lab.
</div>


#Job 3 - Shopping Page Features

We want a two-column layout for shopping: the left side holds a
pictorial ordering menu, and the right has a sidebar, showing the contents
of the user's current order ("shopping cart").

Here is an example of such a menu, to give you the idea...

<img class="scale" src="/pix/tutorials/5/71.png" />

In our case, we want the pictorial menu to show a column for each menu
category, with pictures only for the menu items in that category.

Job 1 focused on assembly, and Job 2 focused on construction.
This job has both :-/

##3.1 Basic shopping page assembly

Let's tackle the view assembly first.

I said menu on the left, sidebar with receipt on the right.

Make <code>application/views/template-shopping.php</code>
for this, copied from <code>template-secondary</code> to start.

The basic template, with the above split...

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>{pagetitle}</title>
            <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
            <link rel="stylesheet" type="text/css" href="/assets/css/default.css"/>
         </head>
        <body>
            <div class="container">
                {navbar}
                <div class='row'>
                    <div class='col-md-9'>
                        Pictorial menu
                    </div>
                    <div class='col-md-3'>
                        Receipt
                    </div>
                </div>
                {content}
                <p class="footer">Page rendered in <strong>0.0155</strong> seconds. 
                    {ci_version}</p>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </body>
    </html>

Let's only worry about medium & large windows, to keep things simple.

Let's add a simple controller to test this.

    class Shopping extends Application {

        function __construct() {
            parent::__construct();
        }

        public function index() {
            $this->data['content'] = '';
            $this->render('template-shopping'); 
        }

    }

We don't strictly need a content substitution variable, since all
of our real content will be going inside the columns,
but we can keep it, and set it to empty, to prevent the base
controller trying to render a 'pagebody'.

Here's our boring shopping page, so far:

<img class="scale" src="/pix/tutorials/5/72.png" />

Let's construct this panel now, since it is straight forward.
The receipt can be made up for this lab. I suggest a markdown file,
which is then "rendered" the same way as the meat from the Hiring page.

My receipt file, which is **only** an example (you should make your own):

    Jim's Joint
    2016.10.31

    Your order:
    - 1 Big Burger
    - 2 Coffee
    - 1 Cheese

    Total: $18.84

That can get "rendered" the same as for job 2:

    public function index() {
        $stuff = file_get_contents('../data/receipt.md');
        $this->data['receipt'] = $this->parsedown->parse($stuff);
        $this->data['content'] = '';
        $this->render('template-shopping'); 
    }

And we need to adjust the assembly to match the construction.
This snippet of code is passing the rendered receipt as the "receipt" view
parameter, so we need to modify the template too...

    <div class='row'>
        <div class='col-md-9'>
            Pictorial menu
        </div>
        <div class='col-md-3'>
            {receipt}
        </div>
    </div>

And the result is ...

<img class="scale" src="/pix/tutorials/5/73.png" />

It could probably be styled so that the receipt stood out more, that we
will leave that to our designer :-/

##3.2 Pictorial menu assembly

In our template, we can provide for three columns in the left panel
of the shopping page, with placeholders for the view parameters
to pass in the constructed pieces.

    <div class='row'>
        <div class='col-md-9'>
            <div class='row'>
                <div class='col-md-4'>
                    {category1}
                </div>
                <div class='col-md-4'>
                    {category2}
                </div>
                <div class='col-md-4'>
                    {category3}
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            {receipt}
        </div>
    </div>

Yes, this isn't flexible (for instance, if we have other than three
menu categories), but that is a topic for another day.

With just this change, our page looks like ...

<img class="scale" src="/pix/tutorials/5/74.png" />

##3.3 Pictorial menu construction - Categories

In our Shopping controller, let's construct the pictorial
menu by iterating over the categories, and building the
appropriate content for each.

Add a bit of logic for this, to our Shopping controller:

    // pictorial menu
    $count = 1;
    foreach ($this->categories->all() as $category) {
        $chunk = 'category' . $count; 
        $this->data[$chunk] = $category->name;
        $count++;
    }
    $this->render('template-shopping'); 

And the result should be:

<img class="scale" src="/pix/tutorials/5/75.png" />

Let's use a view fragment to build whataver we want at the top of each category
column, for instance <code>application/views/category-shop.php</code>:

    <h2>{name}</h2>

We can then incorporate that into our controller...

    // pictorial menu
    $count = 1;
    foreach ($this->categories->all() as $category) {
        $chunk = 'category' . $count; 
        $this->data[$chunk] = $this->parser->parse('category-shop',$category,true);
        $count++;
    }
    $this->render('template-shopping'); 

And the result of this set of small changes:

<img class="scale" src="/pix/tutorials/5/76.png" />

##3.4 Pictorial menu construction - Menu Items

We're almost done! All we need to do now is iterate through the
menu items in a category, and the image for each to the
category's view parameter.

Let's setup a view fragment to render a menu item, for instance
<code>menuitem-shop</code>:

    <img class="scale" src="/images/{picture}"/><br/>

The logic to iterate over the menu items, using this fragment...

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

If all went well, you should end up here:

<img class="scale" src="/pix/tutorials/5/77.png" />

Wow! Hopefully, this will make view construction and assembly much clearer, 
and equip you with a few techniques to use wit your own work!

<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>
