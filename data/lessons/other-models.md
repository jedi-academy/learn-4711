# Model Examples From Other Frameworks

I excerpted all of the samples below from the user guides of the respective
frameworks.

CodeIgniter, CakePHP, Fat-Free, FuelPHP, Laravel and Slim all have similar tabel-level
data abstractions, with entity-level properties magic. They call these ORMs,
but "Eloquent" appears to be the only one with the extensive two-way
connection between database and code that would be considered part of
a conventional enterprise ORM.

Symfony has the Doctrine ORM, which is entity-centric. It starts with
with an entity-level base model, and table/collection
abstractions are built on top of that.

Zend doesn't come with an ORM - developers are expected to integrate their own.

###Note
In CodeIgniter 3, properties magic is built into the framework, but "ORM" behavior comes from a
base model (like mine). CodeIgniter4 has these built-in.

## CakePHP

CakePHP uses a built-in ORM, which provides base collection and entity classes to
build on. 

A sample collection-level usage:

	use Cake\ORM\TableRegistry;

	// $articles will be an instance of our ArticlesTable class.
	$articles = TableRegistry::get('Articles');

	$query = $articles->find();
	foreach ($query as $row) {
		echo $row->title;
	}

To customize the handling of a table:

	namespace App\Model\Table;
	use Cake\ORM\Table;

	class ArticlesTable extends Table
	{
		...
	}

A sample entity usage:

	namespace App\Model\Entity;
	use Cake\ORM\Entity;

	class Article extends Entity
	{
		...
	}

CakePHP has a command-line tool, <code>bake</code>, that can generate skeleton
code for models.

## Fat-Free

Fat-Free describes its Mapper as an ORM. It looks similar to CI, to me.
Here is an example of using it.

	$user=new DB\SQL\Mapper($db,'users');
	// or $user=new DB\Mongo\Mapper($db,'users');
	// or $user=new DB\Jig\Mapper($db,'users');
	$user->userID='jane';
	$user->password=md5('secret');
	$user->visits=0;
	$user->save();

Fat-Free models are at the table level.

	class Vendor extends DB\SQL\Mapper {
		function __construct(DB\SQL $db) {
			parent::__construct($db,'vendors');
		}

		function listByCity() {
			return $this->select('vendorID,name,city',null,array('order'=>'city DESC'));
		}
	}

	$vendor=new Vendor;
	$vendor->listByCity();

## FuelPHP

FuelPHP models at the table level too. 

	namespace Model;
	class Articles extends \Model {

		public static function get_results() {
			// Database interactions
		}

	}

	// find all articles
	$entry = Model_Article::find_all();

	// find all articles from category 1 order descending by date
	$entry = Model_Article::find(array(
		'where' => array('category_id', 1),
		'order_by' => array('date' => 'desc')
	));

FuelPHP has a built-in ORM, that looks very similar to the base model in
my CI starter3, as far as I can tell.

FuelPHP has a command-line tool, <code>oil</code>, that can generate
skeleton code for your models.

## Laravel

Laravel has its own ORM, <code>Eloquent</code>. A command line tool generates
a base model, at the table level.

	php artisan make:model Flight

This creates a model similar to CI's, which can be tailored.

	namespace App;
	use Illuminate\Database\Eloquent\Model;

	class Flight extends Model
	{
		/**
		 * The table associated with the model.
		 *
		 * @var string
		 */
		protected $table = 'my_flights';
	}

And using the model seems similar too:

	use App\Flight;

	$flights = App\Flight::all();

	foreach ($flights as $flight) {
		echo $flight->name;
	}

## Slim

Slim uses Laravel's Eloquent ORM.

	composer require illuminate/database "~5.1"

## Symfony

Symfony has its own ORM, Doctrine, which can be used by itself outside the
framework.

It starts with entity models, for instance:

	// src/AppBundle/Entity/Product.php
	namespace AppBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;

	/**
	 * @ORM\Entity
	 * @ORM\Table(name="product")
	 */
	class Product
	{
		/**
		 * @ORM\Column(type="integer")
		 * @ORM\Id
		 * @ORM\GeneratedValue(strategy="AUTO")
		 */
		private $id;

		/**
		 * @ORM\Column(type="string", length=100)
		 */
		private $name;

		/**
		 * @ORM\Column(type="decimal", scale=2)
		 */
		private $price;

		/**
		 * @ORM\Column(type="text")
		 */
		private $description;
	}

And the ORM can create tables from those. You would then use the ORM to create
getters and setters:

	php bin/console doctrine:generate:entities AppBundle/Entity/Product

It looks like you work with entities, and use the ORM to persist things properly:

	// src/AppBundle/Controller/DefaultController.php

	// ...
	use AppBundle\Entity\Product;
	use Symfony\Component\HttpFoundation\Response;

	// ...
	public function createAction()
	{
		$product = new Product();
		$product->setName('Keyboard');
		$product->setPrice(19.99);
		$product->setDescription('Ergonomic and stylish!');

		$em = $this->getDoctrine()->getManager();

		// tells Doctrine you want to (eventually) save the Product (no queries yet)
		$em->persist($product);

		// actually executes the queries (i.e. the INSERT query)
		$em->flush();

		return new Response('Saved new product with id '.$product->getId());
	}


## Zend

Zend is huge, and broken into a number of packages. <code>zend-mvc</code> appears
to provide a skeleton for a webapp module. The docs talk about such a module having
a controller, view script, and routing.It doesn't talk about data.

The <code>zend-db</code> package provides a database abstraction layer.
It appears very low-level, though.

	$adapter->query('SELECT * FROM `artist` WHERE `id` = ?', [5]);

It looks like the intent is that developers integrate their own ORM, such as
Doctrine or Eloquent, into their apps.
