<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="robots" content="noindex, nofollow"/>
        <title>{pagetitle}</title>
        <link rel="icon" type="image/png" href="/assets/images/ci-icon.png" />
		<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/learning.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/data/custom.css"/>
    </head>
    <body>

        <!-- top of the page -->
        <div class="navbar navbar-default navbar-fixed-top" id="mainnav" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">{title}</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        {menubar}
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

        <!-- center of the page -->
        <div id="content">
            <div class="container">
				<div class="col-md-8">
					{content}
				</div>
				<div class="col-md-4">
					<div></div>
					{sidebar}
				</div>
            </div>
        </div>

        <!-- bottom of the page -->
        <div class="footer">
            <div class="footer-menu">
                <div class="container">
                    <div class="row bcit50">
                        <ul class="nav nav-pills">
                            {footerbar}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <div class="row">
                        <p class="text-center">
							<a href="{outline}">{coursetitle}</a> is a course from 
							<a href="{site}">{school}</a>
                            <a href="mailto:jim_parry&commat;bcit.ca"><span class="glyphicon glyphicon-envelope"></span></a></p>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </body>
</html>

