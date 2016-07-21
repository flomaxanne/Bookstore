
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style>
            body {
                position: relative;
            }
            ul.nav-pills {
                top: 60px;
                position: fixed;
            }
            div.col-sm-9 div {
                height: 500px;
                font-size: 12px;
                font-family: georgia;
            }
            #IT {color: #333; background:url(images/it.jpg);}
            #Science {color: #333; background:url(images/science.jpg);}
            #Law {color: #333; background:url(images/law.jpg);}
            #Engineering {color: #333; background:url(images/it.jpg);}

            @media screen and (max-width: auto) {
                #IT, #Science, #Law, #Engineering  {
                    margin-left: 150px;
                }
            }
        </style>

        <?php
        require ('Menu.html'); // the menu from the menu.html page is displayed using the require statement
        define('TITLE', 'Books'); //the title of the page is defined as Books
        ?>


       
<!-- The Scrollspy plugin is used to automatically update links in a navigation list based on scroll position. -->
    <body data-spy="scroll" data-target="#myScrollspy" data-offset="20"> 


        <div id="homediv"> 
            <div class="container">
                <div class="row">
                    <nav class="col-sm-3" id="myScrollspy">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#IT">Information Technology</a></li>
                            <li><a href="#Science">Science</a></li> 
                            <li><a href="#Law">Law</a></li>
                            <li><a href="#Engineering">Engineering</a></li>
                        </ul>


                    </nav>
                    <div class="col-sm-9">

                        <div id="IT"> <!-- the IT div displays IT books --> 
                            <h1>Information Technology</h1>
                            <?php
                            include('db_connection.php');
                            $itquery = mysqli_query($dbcon, "select * from products where booktype='Information Technology'");

                            define('COLS', 5); // number of columns
                            $col = 0; // number of the last column filled


                            echo '<table class="table table-inversed table-hover  table-striped" style="table-layout:fixed" font-color:"black">  ';
                            echo '<tr>'; // start first row

                            while ($query2 = mysqli_fetch_array($itquery)) {
                                $col++;
                                if ($col == COLS) { // have filled the last row
                                    $col = 1;
                                    echo '</tr><tr>'; // start a new one
                                }
                                //displays the books in table form
                                echo '<td width="150" height="150" align="center">',
                                '<a href="Description.php?id=' . $query2["id"] . '">',
                                '<center>', '<img src="images/', $query2['picture'], '" width="150px" center/></a>',
                                '<br/><br/><b>', $query2['name'] . '</b>',
                                '<br/> <b>RM : </b>', $query2['price'],
                                '<br/><b>Category : </b> ', $query2['booktype'],
                                '<br/> <b>ISBN : </b>', $query2['isbn'],
                                '<br/><br/><br/>', '</td></center>';
                            }

                            echo '</tr>'; // end last row
                            echo '</table>  ';
                            ?>

                        </div>
                        <div id="Science">
                            <h1>Science</h1> <!-- the Science div displays Science books --> 
                            <?php
                            $sciencequery = mysqli_query($dbcon, "select * from products where booktype='Science'");
                            $col = 0; // number of the last column filled


                            echo '<table class="table table-bordered table-hover  table-striped" style="table-layout: fixed ">  ';
                            echo '<tr>'; // start first row

                            while ($query2 = mysqli_fetch_array($sciencequery)) {
                                $col++;
                                if ($col == COLS) { // have filled the last row
                                    $col = 1;
                                    echo '</tr><tr>'; // start a new one
                                }
                                //displays the books in table form
                                echo '<td width="150" height="150" align="center">',
                                '<a href="Description.php?id=' . $query2["id"] . '">',
                                '<center>', '<img src="images/', $query2['picture'], '" width="150px" center/></a>',
                                '<br/><br/><b>', $query2['name'] . '</b>',
                                '<br/> <b>RM : </b>', $query2['price'],
                                '<br/><b>Category : </b> ', $query2['booktype'],
                                '<br/> <b>ISBN : </b>', $query2['isbn'],
                                '<br/><br/><br/>', '</td></center>';
                            }

                            echo '</tr>'; // end last row
                            echo '</table>  ';
                            ?>
                        </div>
                        <div id="Law">
                            <h1>Law</h1> <!-- the Law div displays Law books --> 
                            <?php
                            $lawquery = mysqli_query($dbcon, "select * from products where booktype='Law'");
                            $col = 0; // number of the last column filled


                            echo '<table class="table table-bordered table-hover  table-striped" style="table-layout: fixed ">  ';
                            echo '<tr>'; // start first row

                            while ($query2 = mysqli_fetch_array($lawquery)) {
                                $col++;
                                if ($col == COLS) { // have filled the last row
                                    $col = 1;
                                    echo '</tr><tr>'; // start a new one
                                }
                                //displays the books in table form
                                echo '<td width="150" height="150" align="center">', '<center>',
                                '<a href="Description.php?id=' . $query2["id"] . '">',
                                '<center>', '<img src="images/', $query2['picture'], '" width="150px" center/></a>',
                                '<br/><br/><b>', $query2['name'] . '</b>',
                                '<br/> <b>RM : </b>', $query2['price'], '<br/><b>Category : </b> ',
                                $query2['booktype'], '<br/> <b>ISBN : </b>', $query2['isbn'],
                                '<br/><br/><br/>', '</td></center>';
                            }

                            echo '</tr>'; // end last row
                            echo '</table>  ';
                            ?>

                        </div>
                        <div id="Engineering"> <!-- the Engineering div displays Engineering books --> 
                            <h1>Engineering</h1>
                            <?php
                            $engineeringquery = mysqli_query($dbcon, "select * from products where booktype='Engineering'");
                            $col = 0; // number of the last column filled


                            echo '<table class="table table-bordered table-hover  table-striped" style="table-layout: fixed ">  ';
                            echo '<tr>'; // start first row

                            while ($query2 = mysqli_fetch_array($engineeringquery)) {
                                $col++;
                                if ($col == COLS) { // have filled the last row
                                    $col = 1;
                                    echo '</tr><tr>'; // start a new one
                                }
                                //displays the books in table form
                                echo '<td width="150" height="150" align="center">', '<center>',
                                '<a href="Description.php?id=' . $query2["id"] . '">',
                                '<center>', '<img src="images/', $query2['picture'], '" width="150px" center/></a>',
                                '<br/><br/><b>', $query2['name'] . '</b>',
                                '<br/> <b>RM : </b>', $query2['price'],
                                '<br/><b>Category : </b> ', $query2['booktype'],
                                '<br/> <b>ISBN : </b>', $query2['isbn'],
                                '<br/><br/><br/>', '</td></center>';
                            }

                            echo '</tr>'; // end last row
                            echo '</table>  ';
                            
                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <br><br>

            <?php
            require('Footer.html'); // the Footer from the footer.html page is displayed using the require statement
            