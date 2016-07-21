<?php  

require ('Menu.html'); // the menu from the menu.html page is displayed using the require statement

include("Db_connection.php");  //a connection to the database is made here, the datasbase connection is made through the Db_connection page
if (isset($_GET['id'])) {
    $id = $_GET['id'];  //the books are deleted through their distinct id's
    
$deletebook_query = "delete from products where id='$id'"; //delete query  to delete books by its id
$run = mysqli_query($dbcon,$deletebook_query);
}

if($run)   //if the deletion is successful
{  
//javascript function to open in the same window   
    echo "<script>window.open('view_products.php?deleted=book has been deleted','_self')</script>";   //the page is displays within the url that the book has been deleted
}  
  
?>  
