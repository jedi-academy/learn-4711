# Best View Practices?

The examples below have been excerpted from a number of
online tutorials, and are allegedly represenative
of "best practices". I look forward to tearing
them apart in class :-/

## An example to insert some data in to the MySQL database using PHP

INDEX.PHP

    <html>
        <body>
            <h1>A small example page to insert some data in to the MySQL database using PHP</h1>
            <form action="insert.php" method="post">
                Firstname: <input type="text" name="fname" /><br><br>
                Lastname: <input type="text" name="lname" /><br><br>
                <input type="submit" />
            </form>
        </body>
    </html>

INSERT.PHP

    <html>
        <body>
            <?php
                $con = mysql_connect("mysql.cis.ksu.edu","cis_id","password");
                if (!$con)
                  {
                  die('Could not connect: ' . mysql_error());
                  }
                mysql_select_db("cis_id", $con);
                $sql="INSERT INTO nametable (fname, lname)
                    VALUES
                    ('$_POST[fname]','$_POST[lname]')";
                if (!mysql_query($sql,$con))
                  {
                  die('Error: ' . mysql_error());
                  }
                echo "1 record added";
                mysql_close($con)
            ?>
        </body>
    </html>

##Recommended usage?

    <head></head>
    <body class="page_bg">
    Hello, today is <?php echo date('l, F jS, Y'); ?>.
    </body>
    </html> 

##More advanced techniques?

    <html>
    <head></head>
    <body>
    <ul>
    <?php for($i=1;$i<=5;$i++){ ?>
    <li>Menu Item <?php echo $i; ?></li>
    <?php } ?>
    </ul>
    </body>
    </html> 

##Possible yet not recommended usage?

    <?php
    echo "<html>";
    echo "<head></head>";
    echo "<body class=\"page_bg\">";
    echo "Hello, today is ";
    echo date('l, F jS, Y'); //other php code here echo "</body>";
    echo "</html>";
    ?> 

