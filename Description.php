<?php
require ('Menu.html'); // the menu from the menu.html page is displayed using the require statement
define('TITLE', 'Description'); //the title of the page is defined as Description

include_once 'Db_connection.php'; //a connection to the database is made here, the datasbase connection is made through the Db_connection page
?>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<?php


$id = $_GET['id']; //gets id of the book when user clicks on the book on a different page

$raw_results = mysqli_query($dbcon, "SELECT * FROM products where id='$id'"); //selects product from database to be displayed

echo "<div id='homediv'>";

if (mysqli_num_rows($raw_results) > 0) { //the following codes re executed if one or more rows are returned 
    while ($results = mysqli_fetch_array($raw_results)) { // $results = mysql_fetch_array($raw_results) puts data from database into array
  
       $picture = $results[1];
       $name = $results[2];
       $description = $results[3];
       $price = $results[4];
       $booktype = $results[5];
       $publicationdate = $results[6];
       $isbn = $results[7];
       $pages = $results[8];
        
       
        //the book that the user has clicked on is displayed
        echo " <div class='container'>";
        echo "<table class='table table-hover' border='0' style='width:100%'  ";
        echo "<tr>";

        echo " <td align='center'><img src='images/" . $picture . "' width='230' height='250'/>";
        echo "<td><br><b>" . $results['name'] . "</b>";

        echo " <br><hr> Price &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: RM" . $results['price'];
        echo " <br><hr> Category &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: " . $results['booktype'];
         echo " <br><hr> Publication Date &nbsp&nbsp&nbsp: " . $results['publicationdate'];
        echo " <br><hr> ISBN &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: " . $results['isbn'];
         echo " <br><hr> Pages &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: " . $results['pages'];

        echo "<br><br><br><hr>Description : " . $results['description'];

        echo"</td>";
        echo"</tr>";
        echo "</table>";



        echo "</div>";
        echo "</div>";
    }
    require ('Footer.html'); // the footer from the footer.html page is displayed using the require statement
}
?>