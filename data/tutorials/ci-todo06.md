#Views - Making the Maintenance page

_Part of COMP4711 Lab 6, Winter 2017_

<div class="alert alert-info">
This assumes that you have completed lab 5, or that you are working with the second starter repo.
</div>


#Job 4 - Pagination

So far, our maintenance item list is presentable as is, because it is small.
This will change as the work load piles up :-/

The solution - add pagination to the item list.

"Pagination" means being able to show a "page" worth of items at a time,
with navigation to show the previous or next page, and the first or
last page. 

Codeigniter has a 
[Pagination Class](https://www.codeigniter.com/user_guide/libraries/pagination.html) 
to make this "easier", but I have found it overkill and not always a good fit.
Let's roll our own :)

##6.1 Pagination basics

We need to specify how many items go on a page. This could be a property in our
`Mtce` controller, set at the top of the class body. 

	private $items_per_page = 10;

The page # to display will end up
being a parameter passed as a URL segment.

We should then have a method to display a set of items.
Pagination can then be done by extracting the proper items,
creating the navlinks for that, and then displaying
the relevant set of items.

Let's refactor our `index` method, having it pass the entire task list
to a `show_page` method.

Extract the task presentation from `index` into a new method `page`,
which takes the tasks to display as a parameter...

	public function index()
	{
		$tasks = $this->tasks->all(); // get all the tasks
		$this->show_page($tasks);
	}

	// Show a single page of todo items
	private function show_page($tasks)
	{
		$this->data['pagetitle'] = 'TODO List Maintenance';
		// build the task presentation output
		$result = ''; // start with an empty array		
		foreach ($tasks as $task)
		{
			if (!empty($task->status))
				$task->status = $this->statuses->get($task->status)->name;
			$result .= $this->parser->parse('oneitem', (array) $task, true);
		}
		$this->data['display_tasks'] = $result;

		// and then pass them on
		$this->data['pagebody'] = 'itemlist';
		$this->render();
	}

The `show_page` method is private, so that it cannot be directly referenced
from the browser.

So far, there is no apparent difference in the output. We need to refactor a bit
so that we extract only the tasks of interest.

##6.2 Item page extraction

Let's make a `page` method, with the desired page # as a parameter.
This is intended to be callable from the browser.

It will need to extract `items_per-page` tasks, from the proper starting point.

The starting point will be the page # less 1, times the # of items per page.

For instance, page "3" will contain 10 items, starting from task 21 (if numbered from 1).

	// Extract & handle a page of items, defaulting to the beginning
	function page($num = 1)
	{
		$records = $this->tasks->all(); // get all the tasks
		$tasks = array(); // start with an empty extract
		
		// use a foreach loop, because the record indices may not be sequential
		$index = 0; // where are we in the tasks list
		$count = 0; // how many items have we added to the extract
		$start = ($num - 1) * $this->items_per_page;
		foreach($records as $task) {
			if ($index++ >= $start) {
				$tasks[] = $task;
				$count++;
			}
			if ($count >= $this->items_per_page) break;
		}
		$this->show_page($tasks);
	}

Try it ... in your location field, pass "/mtce/page/2" after your domain name.
You should see items 11 through 15.

Do you see what's coming? Our `index` method can be simplified even further:

	public function index()
	{
		$this->page(1);
	}

##6.3 Pagination navigation



<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>
