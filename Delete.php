<?php  

  
include("Db_connection.php");   //a connection to the database is made here, the datasbase connection is made through the Db_connection page
$delete_id=$_GET['del'];   //the users are deleted through their distinct id's
$delete_query="delete  from users WHERE id='$delete_id'";//delete query  to delete users by their id
$run=mysqli_query($dbcon,$delete_query);  
if($run)   //if the deletion is successful
{  
//javascript function to open in the same window   
    echo "<script>window.open('view_users.php?deleted=user has been deleted','_self')</script>";   //the page is displays within the url that the user has been deleted
}  
  
?>  