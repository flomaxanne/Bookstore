<?php

require ('Menu.html');
define('TITLE', 'Search');
include('Db_connection.php');

?>

 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
    
    <div id="homediv">
            <div class="container">
        
        <?php
        $query = $_GET['query']; // gets value sent over search form
        

        $min_length = 3; //minimum length for the search is 3 characters
      

        if (strlen($query) >= $min_length) { // if query length is more or equal minimum length then
            $query = mysqli_real_escape_string($dbcon, $query);
          

            $raw_results = mysqli_query($dbcon, "SELECT * FROM products
            WHERE (`name` LIKE '%" . $query . "%') OR (`booktype` LIKE '%" . $query . "%')");

            // selects products from the database where only the query(item being search by user) will be displayed
            

            if (mysqli_num_rows($raw_results) > 0) { // if one or more rows are returned do following
                while ($results = mysqli_fetch_array($raw_results)) {  // $results = mysql_fetch_array($raw_results) puts data from database into array
                  

                    $picture = $results[1];
                    $name = $results[2];
                    $price = $results[3];
                    $booktype = $results[4];
 


                    echo "<table class='table table-hover' border='0' style='width:100%'  ";
                    echo "<br><br><br><tr>";
                    echo '<a href="Description.php?id=' . $results["id"] . '">';
                    echo '<center>', '<img src="images/', $results['picture'], '" width="150px" center/></a>';
          
                    echo "<td align='center'>";
                    echo " <br><b>" . $results['name'] ;
               
                    echo " <br> RM" . $results['price'];
                    echo " <br> " . $results['booktype'];
                    echo " <br>  " . $results['isbn']. "</b>";
                 

                    echo"</td>";
                    echo"</tr>";
                    echo "</table>";
                }
            } else { // if there is no matching rows do following
                echo "No results";
            }
        } else { // if query length is less than minimum length
            echo "Minimum length is " . $min_length;
            echo "</div>";
             echo "</div>";
        }
        
        
        echo "<br><br><br><br><br>";
        
        
        
        require ('Footer.html');
        ?>
    