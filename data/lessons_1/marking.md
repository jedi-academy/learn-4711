#Marking Process
COMP4711 - BCIT - Winter 2017

I thought I would share with you the marking scripts that I use
for submissions.


## Early-Course Marking (before using a DB)

This is the marking script I use in the beginning of the course,
before your apps start using a database. I copy the repo link provided by you
and invoke the script with it as a parameter ($1 below).

    # Script to pull a student repo down into the marking directory
    # it is then opened in NB, the repo is opened, and the webapp is "run" in the browser
    cd /pub7/htdocs
    rm -rf comp4711
    mkdir comp4711
    cd comp4711
    git init
    git pull -f $1.git master
    cd ..
    firefox $1
    firefox comp4711.local
    # /usr/local/netbeans-8.0.2/bin/netbeans --open /pub7/htdocs/comp4711

The script basically pulls your repo into an empty folder on my system,
which I have pre-configured for the `comp4711.local` virtual host.
It  then opens up your Github repo in one browser tab, and runs your
app in a second browser tab.

## Mid-Course Marking (with a DB)

Once we start using an RDB, I switch to the following script.

    #!/bin/bash
    #------------------------------------------------------------------------------
    # Script to pull a student repo down into the marking directory.
    # It is then opened in NB, the repo is opened, and the webapp is "run" in the browser
    #
    # Usage: ./mark.sh repo-name [branch [commit-hash]]
    #------------------------------------------------------------------------------

    if [ "$1" = "" ]; then
            echo "Usage: ./mark.sh repo-name [branch [commit-hash]]"
            exit 1
    fi
    # configuration pulled in from "myconfig", for better security
    source myconfig

    # Where are we working? (ps - this should be where this script lives)
    cd $htdocs

    repo=$1				# repo name to pull from

    # branch to pull (assume master)
    if [ "$2" = "" ]; then 
            branch='master'
    else 
            branch=$2
    fi

    echo "********************************************************************"
    echo "Marking $1 $branch"
    echo "********************************************************************"

    # create the project folder & pull contents from repo branch
    rm -rf $dest
    mkdir $dest
    cd $dest
    git init

    # optionally target a specific commit
    if [ "$3" != "" ]; then 
            git pull -f $repo.git $branch $3
    else
            git pull -f $repo.git $branch
    fi


    # fix writeable folders permissions
    chmod 777 ./data
    chmod 777 ./public/images

    # copy our local CodeIgniter config
    cd $htdocs
    cp -r ~/Desktop/application $dest/

    # find the first SQL script
    script=($(ls $dest/data/*.sql))
    if [ "$script" != "" ]; then
    #	# make sure the script doesn't try to create a database
    #	if [grep -Fxq "create database" "$script"]
    #	then
    #		exit 1
    #	else
    pwd
    echo "About to run script $script"
                    # execute that script to populate this project's database
                    $mysql/mysql -h localhost -P 3306 -S $socket -u $user -p$password -D $database < $script
    #	fi
    fi

    # open up the repo in a Firefox tab
    firefox $repo
    # and open up the app itself in another tab
    firefox comp4711.local
    # open the project in NetBeans
    $netbeans/netbeans --close-group --open $htdocs/$dest

You probably notice a couple of differences from the first script!

I can pull a specific branch, or even a specific oommit inside that branch
(in case you keep working past the deadline).

This script also populates a Mysql database for you, with a name of my choosing.
There is some commented logic above to detect if you are naming the database to
use explicitly. The marking script is still a work in progress - at the moment, 
mistakes in your SQL script don't work, because the
mysql account I use when running this has very limited rights.

I choose the folder, port, virtual domain, database, and database
credentials to use. These are all deployment considerations.
I put these inside a configuration file, which defines variables to use above.
An example of this config...

    #----------------------------------------------------
    # Marking script configuration
    #----------------------------------------------------

    # htdocs folder
    htdocs=/pub7/htdocs
    # destination project/folder inside htdocs
    dest=comp4711
    # netbeans executable
    netbeans=/usr/local/netbeans-8.2/bin
    # mysql executable
    mysql=/opt/lampp/mysql/bin
    #mysql socket endpoint
    socket=/opt/lampp/mysql/tmp/mysql.sock

    # local MYSQL configuration
    user=marking
    password=secret
    database=bcitdb

## Remote Deployment

I am experimenting with remote deployment, such that you can configure
a webhook for your repo, connected to an endpoint on my server. With a
bit of luck, it might be ready for your assignment 1, but more likely your assignment 2.

When a webhook event is triggered, and if that event is a merge for
the appropriate branch of a monitored repo, my app will
generate a configuration file and run a script similar to the long one above.

This is for testing your projects in a real (and Linux) setting.
Each team will receive a "key" that they can use to access a project
configuration page on my server. You will specify the name of the repo
to monitor, and the branch for which a merge will trigger the
deployment.

This way, you can use it to test your `develop` branch, until ready to test your
`master` branch.

Once the assignment deadline arrives, I will disable the event handling
and pull all of your `master` branches for deployment on my server.

There will be a page cross-listing all of the projects, so that you can
see what your classmates are up to :)

I am deploying this course hub using git, but manually - it is the guinea
pig for the above script.

One hiccup - I am still working on getting Composer working properly
on my server, so any Composer dependencies will have to be resolved
in your repo for the moment. That means not git ignoring the `vendor` folder
(assuming that is where you install them).