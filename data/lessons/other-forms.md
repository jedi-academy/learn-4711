# Forms Examples From Other Frameworks

The examples below have been excerpted from the different frameworks' user
guides. They may not be what the framework intended, but they are my interpretation.

The list is scarce, as I had trouble locating specific approaches to forms
in all the frameworks.

## CakePHP

Cake has a [Form helper](), 
<code>Cake\View\Helper\FormHelper</code>.

The user guide addresses each of the specific methods available,
but does not provide a comprehensive example pulling it all together.
I have cobbled the following together from excerpts, and it
probably doesn't do the framework justics.

    // src/Controller/ArticlesController.php:
    public function edit($id = null)
    {
        if (empty($id)) {
            throw new NotFoundException;
        }
        $article = $this->Articles->get($id);
        // Save logic goes here
        $this->set('article', $article);
    }

    // View/Articles/edit.ctp:
    // Since $article->isNew() is false, we will get an edit form
    <?= $this->Form->create($article) ?>

The form helper can generate form fields...

    echo $this->Form->create($user);
    // Text
    echo $this->Form->input('username');
    // Password
    echo $this->Form->input('password');
    // Day, month, year, hour, minute, meridian
    echo $this->Form->input('approved');
    // Textarea
    echo $this->Form->input('quote');

    echo $this->Form->input('birth_dt', [
        'label' => 'Date of birth',
        'minYear' => date('Y') - 70,
        'maxYear' => date('Y') - 18,
    ]);

    $sizes = ['s' => 'Small', 'm' => 'Medium', 'l' => 'Large'];
    echo $this->Form->select('size', $sizes, ['default' => 'm']);

    echo $this->Form->button('Add');
    echo $this->Form->end();

It supports a rich variety of field types, including date & time varieties.

Cake provides for a "modelless form", not specifically connected to
a model.

    // in src/Form/ContactForm.php
    namespace App\Form;

    use Cake\Form\Form;
    use Cake\Form\Schema;
    use Cake\Validation\Validator;

    class ContactForm extends Form {

        protected function _buildSchema(Schema $schema) {
            return $schema->addField('name', 'string')
                ->addField('email', ['type' => 'string'])
                ->addField('body', ['type' => 'text']);
        }

        protected function _buildValidator(Validator $validator) {
            return $validator->add('name', 'length', [
                    'rule' => ['minLength', 10],
                    'message' => 'A name is required'
                ])->add('email', 'format', [
                    'rule' => 'email',
                    'message' => 'A valid email address is required',
                ]);
        }

        protected function _execute(array $data) {
            // Send an email.
            return true;
        }
    }

## Laravel

I did not find anything specifically for forms handling, but did
discover some of its validation support...

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        // The blog post is valid, store in database...
    }

## Symfony

Symfony has a Form object to ease forms creation.

    // src/AppBundle/Controller/DefaultController.php
    namespace AppBundle\Controller;

    use AppBundle\Entity\Task;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;

    class DefaultController extends Controller {

        public function newAction(Request $request) {
            // create a task and give it some dummy data for this example
            $task = new Task();
            $task->setTask('Write a blog post');
            $task->setDueDate(new \DateTime('tomorrow'));

            $form = $this->createFormBuilder($task)
                ->add('task', TextType::class)
                ->add('dueDate', DateType::class)
                ->add('save', SubmitType::class, array('label' => 'Create Task'))
                ->getForm();

            return $this->render('default/new.html.twig', array(
                'form' => $form->createView(),
            ));
        }
    }

Their form handling example:

    // ...
    use Symfony\Component\HttpFoundation\Request;

    public function newAction(Request $request) {
        // just setup a fresh $task object (remove the dummy data)
        $task = new Task();

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($task);
            // $em->flush();

            return $this->redirectToRoute('task_success');
        }

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

It supports a wide variety of field types and widgets. 

## Yii

Yii has an <code>ActiveForm</code> widget to help build forms.

    <?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
    ]) ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end() ?>

It supports dropdowns, amongst other things...

    use app\models\ProductCategory;

    /* @var $this yii\web\View */
    /* @var $form yii\widgets\ActiveForm */
    /* @var $model app\models\Product */

    echo $form->field($model, 'product_category')->dropdownList(
        ProductCategory::find()->select(['category_name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Select Category']
    );

It has support for form validation...

    $model = new \app\models\ContactForm();

    // populate model attributes with user inputs
    $model->load(\Yii::$app->request->post());
    // which is equivalent to the following:
    // $model->attributes = \Yii::$app->request->post('ContactForm');

    if ($model->validate()) {
        // all inputs are valid
    } else {
        // validation failed: $errors is an array containing error messages
        $errors = $model->errors;
    }

... with the ability to configure validation rules...

    public function rules() {
        return [
            // the name, email, subject and body attributes are required
            [['name', 'email', 'subject', 'body'], 'required'],

            // the email attribute should be a valid email address
            ['email', 'email'],
        ];
    }

## Zend

Zend has helpers to build forms.

    use Zend\Captcha;
    use Zend\Form\Element;
    use Zend\Form\Fieldset;
    use Zend\Form\Form;
    use Zend\InputFilter\Input;
    use Zend\InputFilter\InputFilter;

    // Create a text element to capture the user name:
    $name = new Element('name');
    $name->setLabel('Your name');
    $name->setAttributes([
        'type' => 'text',
    ]);

    // Create a text element to capture the user email address:
    $email = new Element\Email('email');
    $email->setLabel('Your email address');

    // Create a text element to capture the message subject:
    $subject = new Element('subject');
    $subject->setLabel('Subject');
    $subject->setAttributes([
        'type' => 'text',
    ]);

    // Create a textarea element to capture a message:
    $email = new Element\Email('email');
    $message = new Element\Textarea('message');
    $message->setLabel('Message');

    // Create a CAPTCHA:
    $captcha = new Element\Captcha('captcha');
    $captcha->setCaptcha(new Captcha\Dumb());
    $captcha->setLabel('Please verify you are human');

    // Create a CSRF token:
    $captcha = new Element\Captcha('captcha');
    $csrf = new Element\Csrf('security');

    // Create a submit button:
    $send = new Element('send');
    $send->setValue('Submit');
    $send->setAttributes([
        'type' => 'submit',
    ]);

    // Create the form and add all elements:
    $form = new Form('contact');
    $form->add($name);
    $form->add($email);
    $form->add($subject);
    $form->add($message);
    $form->add($captcha);
    $form->add($csrf);
    $form->add($send);

    // Create an input for the "name" element:
    $nameInput = new Input('name');

    /* ... configure the input, and create and configure all others ... */

    // Create the input filter:
    $inputFilter = new InputFilter();

    // Attach inputs:
    $inputFilter->add($nameInput);
    /* ... */

    // Attach the input filter to the form:
    $form->setInputFilter($inputFilter);

It also has a form factory.

    use Zend\Form\Element;
    use Zend\Form\Factory;
    use Zend\Hydrator\ArraySerializable;

    $factory = new Factory();
    $form    = $factory->createForm([
        'hydrator' => ArraySerializable::class,
        'elements' => [
            [
                'spec' => [
                    'name' => 'name',
                    'options' => [
                        'label' => 'Your name',
                    ],
                    'type'  => 'Text',
                ],
            ],
            [
                'spec' => [
                    'type' => Element\Email::class,
                    'name' => 'email',
                    'options' => [
                        'label' => 'Your email address',
                    ]
                ],
            ],
            [
                'spec' => [
                    'name' => 'subject',
                    'options' => [
                        'label' => 'Subject',
                    ],
                    'type'  => 'Text',
                ],
            ],
            [
                'spec' => [
                    'type' => Element\Textarea::class,
                    'name' => 'message',
                    'options' => [
                        'label' => 'Message',
                    ]
                ],
            ],
            [
                'spec' => [
                    'type' => Element\Captcha::class,
                    'name' => 'captcha',
                    'options' => [
                        'label' => 'Please verify you are human.',
                        'captcha' => [
                            'class' => 'Dumb',
                        ],
                    ],
                ],
            ],
            [
                'spec' => [
                    'type' => Element\Csrf::class,
                    'name' => 'security',
                ],
            ],
            [
                'spec' => [
                    'name' => 'send',
                    'type'  => 'Submit',
                    'attributes' => [
                        'value' => 'Submit',
                    ],
                ],
            ],
        ],

        /* If we had fieldsets, they'd go here; fieldsets contain
         * "elements" and "fieldsets" keys, and potentially a "type"
         * key indicating the specific FieldsetInterface
         * implementation to use.
        'fieldsets' => [
        ],
         */

        // Configuration to pass on to
        // Zend\InputFilter\Factory::createInputFilter()
        'input_filter' => [
            /* ... */
        ],
    ]);

Zend supports a rich set of validations, some of which are bound to models.

## Conclusion?

Form support is important, but a cursory glance at the frameworks
is not enough to uncover the intended ways to handle forms, or
to do justice to the wide variety of tools to help.
