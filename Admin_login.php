<?php
require ('Menu.html'); // the menu from the menu.html page is displayed using the require statement
define('TITLE', 'Admin Login'); //the title of the page is defined as Admin Login

include("Db_connection.php");


if (isset($_POST['admin_login'])) { //if the user submits the form using the button named admin_login, the following codes will be executed
   //getting the results from the post array after the form is submitted
    $admin_name = $_POST['admin_name'];
    $admin_pass = $_POST['admin_pass'];

    //javascript use for input checking  
    if (empty($_POST["admin_name"])) { //if the admin name textbox is empty, an error will be displayed

        echo"<script>alert('Please enter your username')</script>";
    }

    if (empty($_POST["admin_pass"])) { //if the admin password textbox is empty, an error will be displayed
        echo"<script>alert('Please enter your password')</script>";
    }

    
    //checks the admin table in database to see if the name and password matches the input
    $admin_query = "select * from admin where admin_name='$admin_name' AND admin_pass='$admin_pass'";
    $run_query = mysqli_query($dbcon, $admin_query);
    
    //if the name and password matches the input, the following codes will be executed
    if (mysqli_num_rows($run_query) > 0) {

        $_SESSION['username'] = true;        //the session username is set to true
        $_SESSION['username'] = $admin_name;    //session displays the admin username
        header("Location: View_products.php");  //the admin is redirected to the view products page
        exit();
    } else {//if the name and pasword doesnt match the input
        $_SESSION['username'] = false;   //the session is set to false
        echo "<script>alert('Sorry, only admin can access this page!')</script>"; //an error message appears 
         header("Refresh:0"); //the current page is refreshed
        exit();
    }
}
?>  


<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<style>  
    .login-panel {  
        margin-top: 100px;  
        margin-bottom:100px;

    </style>  



    <div id="admindiv">
        <div class="container">   <!-- container class is used to centered  the body of the browser with some decent width-->  
            <div class="row">   <!-- row class is used for grid system in Bootstrap-->  
                <div class="col-md-4 col-md-offset-4">  <!--col-md-4 is used to create the no of columns in the grid also use for medium and large devices--> 
                    <div class="login-panel panel panel-success">  
                        <div class="panel-heading">  
                            <h3 class="panel-title">Admin Log In</h3>  
                        </div>  
                        <div class="panel-body">  
                            <form role="form" method="post" action="admin_login.php">  
                                <fieldset>  
                                    <div class="form-group"  >  
                                        <input class="form-control" placeholder="Name" name="admin_name" type="text" autofocus>  
                                    </div>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Password" name="admin_pass" type="password" value="">  
                                    </div>  


                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="admin_login" >  


                                </fieldset>  
                            </form>  
                        </div>  
                    </div>  
                </div>  
            </div>  
        </div>  




<?php
require ('Footer.html'); // the footer from the footer.html page is displayed using the require statement
