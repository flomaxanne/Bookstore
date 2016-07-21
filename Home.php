<?php
require ('Menu.html'); // the menu from the menu.html page is displayed using the require statement
define('TITLE', 'Home'); //the title of the page is defined as Home
?>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 60%;
        margin: auto;

        .box {
            margin-bottom: 10px;
            margin-right: 10px;
            float: left;
            height: auto;
            width: 207px;
        }
    }
</style>

<div id="homediv">
    <div class="container">

        <!-- The Carousel plugin is a component for cycling through elements, like a carousel (slideshow) -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>


            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/aristotle.jpg" alt="aristotle" style=width:900 height="200">
                </div>

                <div class="item">
                    <img src="images/confucius.jpg" alt="Confucius" style=width:900 height="200">
                </div>

                <div class="item">
                    <img src="images/nelsonmandela.jpg" alt="Nelson Mandela" style=width:900 height="200">
                </div>

                <div class="item">
                    <img src="images/johnlocke.jpg" alt="John Locke" style=width:900 height="200">
                </div>
            </div>


            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <br><br>

    <?php
    include('Db_connection.php');  //a connection to the database is made here, the datasbase connection is made through the Db_connection page
    $query1 = mysqli_query($dbcon, "select * from products"); //the product details are displayed in a table

    define('COLS', 4); // number of columns
    $col = 0; // number of the last column filled

    echo '<table class="table table-hover table-striped" style="table-layout: fixed ">  ';
    echo '<tr>'; // start first row

    while ($query2 = mysqli_fetch_array($query1)) {
        $col++;
        if ($col == COLS) { // have filled the last row
            $col = 1;
            echo '</tr><tr>'; // start a new one
        }
        echo '<td width="150" height="150" align="center">',
        '<td><a href="Description.php?id=' . $query2["id"] . '">',
        '<center>', '<img src="images/', $query2['picture'] . '" width="150" height="200"/></a>',
        '<br/><b>', $query2['name'] . '</b>',
        '<br/> <b>RM : </b>', $query2['price'],
        '<br/><b>Category : </b> ', $query2['booktype'],
        '<br/> <b>ISBN : </b>', $query2['isbn'],
        '<br/><br/><br/>', '</td></center>';
    }

    echo '</tr>'; // end last row
    echo '</table>  ';
    ?>

    <?php
    require ('Footer.html'); // the footer from the footer.html page is displayed using the require statement
    