<?php  

require ('Menu.html'); // the menu from the menu.html page is displayed using the require statement


unset ($_SESSION); //will delete the username session
session_destroy();  //will delete all data asscoiated with the user
header("Location: Home.php");//the users are then redirected to the home page
?>  

