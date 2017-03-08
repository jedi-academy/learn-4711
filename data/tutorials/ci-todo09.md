#Building Out the TODO List
_Part of COMP4711 Lab 7, Winter 2017_

#Job 9 - Install the Caboose package

"Caboose" is a CodeIgniter package that will make your life
much easier working with forms and form fields ("widgets") in your webapp.

It has its own [repository](https://github.com/jedi-academy/package-caboose),
with installation directions in the readme.

We're just going to install it in this job; putting it to use
comes in the following jobs.

##9.1 Install the package

Download the package from its repo, and extract it into `application/third_party/caboose` 
inside your project, such that its readme file is located at 
`application/third_party/caboose/README.md`.

##9.2 Inform CodeIgniter about the package

Then add the package path to your `application/config/autoload.php`, tailoring
the appropriate lines:
    
    $autoload['packages'] = array(APPPATH.'third_party/caboose/');
    $autoload['libraries'] = array(...,'caboose'); // ADD caboose to the list
    $autoload['helper'] = array('formfields',...); // ADD formfields to the list

I repeat, **modify** the existing lines that you find in your `config.php`
file. If it has two or more lines setting the same configuraiton setting,
the last one encountered will replace all the others.

##9.3 Configure the Caboose package

Configure the package by modifying the settings at the top of `libraries/Caboose`,
inside its source code, if you need to.

You would only need to do this if adding additional widgets, or if changing
the default CSS & Javascript files loaded, for instance to incorporate
a newer version of Bootstrap.

Yes, the Caboose package comes with an older version of Bootstrap - it
is meant as a learning tool, and not a production-ready package!

##9.4 Incorporate Caboose into your view templating

In your base controller's `render()` method, set appropriate template
view parameters before invoking the parser on the template file...

    function render() {
        ...

        // INSERT THE NEXT FOUR LINES
        // integrate any needed CSS framework & components
        $this->data['caboose_styles'] = $this->caboose->styles();
        $this->data['caboose_scripts'] = $this->caboose->scripts();
        $this->data['caboose_trailings'] = $this->caboose->trailings();
        // THE ABOVE FOUR LINES GET INSERTED

        $this->parser->parse(...);
    }

##9.5 Incorporate Caboose into your view template

Modify your view template(s) to include the Caboose view parameters in the right place...

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            ...
            {caboose_styles}
        </head>
        <body ...>
            ...
            {caboose_scripts}
            {caboose_trailings}
        </body>
    </html>

Interpretation ... the original hard-coded link to the Bootstrap CSS

        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen"/>

can be replaced by the view substitution reference

            {caboose_styles}

at the end of the `<head>` section in the template.

Similarly, the original hard-coded references to jQuery and the Bootstrap
Javascript files

        <script src="/assets/js/jquery-1.11.1.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>

can be replaced by the view substitution references

            {caboose_scripts}
            {caboose_trailings}

at the end of the `<body>` section in the template.

Make the same changes in `application/views/template_secondary.php` as well.

##9.6 Plan for error handling

We know that we are going to need error messages displayed, and possibly
some "success" ones too. This is not related to the "Caboose", but here
seems a good place to add that ability.

Drawing from the `Umbrella` project, we can add a view template file,
`application/views/_alert.php`, to style a single error message,
using Bootstrap alerts.

    <div class="alert alert-{context}" role="alert">{message}</div>

The intended use of this is to build a view substitution parameter, `alerts`,
holding any messages formatted using this view fragment.

Provide for the substitution parameter, and a corresponding status flag,
by ADDing a couple of lines at the end of your base controller's
constructor.

		$this->data['alerts'] = '';
		$this->error_free = TRUE;

We will use the `error_free` property in our later controller error-handling logic.

The view substitution parameter should be added to both `template.php` and `template_secondary.php`,
just under the `pagetitle` substitution reference...

                <h1>{pagetitle}</h1>
		{alerts}    <!-- ADD this line -->

Finally, here is a suitable method that we can add to our base controller,
that we would call anytime we wanted an error or success message
to show when the page is rendered.

	// Add an alert to the rendered page
	function alert($message = '', $context = 'success')
	{
		$parms = ['message' => $message, 'context' => $context];
		$this->data['alerts'] .= $this->parser->parse('_alert', $parms, true);
		$this->error_free = FALSE;
	}


You are now ready to roll. If you use the formfields helper functions to
create HTML form elements for your views, Caboose will automatically
generate the appropriate references, and the appropriately styled
components.

Further, if you need to display an error/success message, you can use
the `alert` function inside any controller, to add such a message to 
the templated output :)

<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>
