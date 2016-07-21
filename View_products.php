<?php
require ('Admin_Menu.html'); // the admin menu from the admin_menu.html page is displayed using the require statement
define('TITLE', 'View Products');  //the title of the page is defined as View Products
include('Db_connection.php'); //a connection to the database is made here, the datasbase connection is made through the Db_connection page
?>



<html>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



    <div class="table-scrol">  
        <h1 align="center">All the Books</h1>  

        <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
            <thead>  

                <tr>  

                    <th>Book Id</th>  
                    <th>Book Picture</th> 
                    <th>Book Name</th>  
                    <th>Book Description</th>  
                    <th>Book Price</th> 
                    <th>Book Type</th>
                    <th>Book Publication Date</th>
                    <th>Book ISBN</th>
                    <th>Book Pages</th> 
                    <th>Update Book</th>
                    <th>Delete Book</th>  
                </tr>  
            </thead>  

<?php

$query1 = mysqli_query($dbcon, "select * from products"); //the product details are selected to be displayed

while ($query2 = mysqli_fetch_array($query1)) { //while loop to fetch the result and store in a array $query2.
    $id = $query2[0];
    $picture = $query2[1];
    $name = $query2[2];
    $description = $query2[3];
    $price = $query2[4];
    $booktype = $query2[5];
    $publicationdate = $query2[6];
    $isbn = $query2[7];
    $pages = $query2[8];



    echo"<tr>";
    echo "<td>" . $query2['id'] . "</td>";
    echo "<td><img src='images/" . $picture . "' style='width:100px;height:128px'/></td>";
    echo "<td>" . $query2['name'] . "</td>";
    echo "<td>" . $query2['description'] . "</td>";
    echo "<td>" . $query2['price'] . "</td>";
    echo "<td>" . $query2['booktype'] . "</td>";
    echo "<td>" . $query2['publicationdate'] . "</td>";
    echo "<td>" . $query2['isbn'] . "</td>";
    echo "<td>" . $query2['pages'] . "</td>";
    
    
    

    echo "<td><a href='Edit.php?id=" . $query2['id'] . "'>"; //the edit buttton which gets the id of the book to be updated
    echo '<button class="btn">Edit</button></a></td>';
    echo "<td><a href='DeleteBooks.php?id=" . $query2['id'] . "'>";  //the delete buttton which gets the id of the book to be deleted
    echo '<button class="btn btn-danger">Delete</button></a></td>';

    echo"</tr>";
}
?>

        </table>

<?php
require ('Footer.html');  // the footer from the footer.html page is displayed using the require statement
