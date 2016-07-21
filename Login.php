<?php

require ('Menu.html'); // the menu from the menu.html page is displayed using the require statement
define ('TITLE', 'Login');  //the title of the page is defined as login


include("Db_connection.php"); //a connection to the database is made here, the datasbase connection is made through the Db_connection page

if (isset($_POST['login'])) { //if the user submits the form using the button named login, the following codes will be executed
   //getting the results from the post array after the form is submitted
    $user_name = $_POST['name'];
    $user_pass = $_POST['pass'];
    
    //javascript use for input checking  
    if (empty($_POST["name"])) {
            //javascript use for input checking  
            echo"<script>alert('Please enter your username')</script>"; //if the name textbox is empty, an error will be displayed
        }

     if (empty($_POST["pass"])) {
            echo"<script>alert('Please enter your password')</script>"; //if the password textbox is empty, an error will be displayed
           
        }
    
     //checks the user table in database to see if the name and password matches the input
    $check_user = "select * from users WHERE user_name='$user_name'AND user_pass='$user_pass'";

    $run = mysqli_query($dbcon, $check_user);

    //if the name and password matches the input, the following codes will be executed
    if (mysqli_num_rows($run)) {
        
 
        $_SESSION['username'] = true;       //the session username is set to true
        $_SESSION['username'] = $user_name;  //session uses the username
         header('Location: Home.php'); //the admin is redirected to the home page
        
        if ($count==1) 
        {
           $_SESSION['username'] = true; //if the session username is true
            $_SESSION['logged'] = $user_name; //the session logged uses the username 
            exit();
        }
        
        
    } else {
        $_SESSION['logged'] = false;   //if the session logged is false, that means if the user has entered a wrong username or password
        echo "<script>alert('username or password is incorrect!')</script>"; //an alert will be displayed
        header("Refresh:0"); //the current page is refreshed
        exit(); 
        
    }
}
?>  


<link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>Login</title>  

    <style>  
        .login-panel {  
            margin-top: 100px;  
            margin-bottom:100px;

        </style>  

  

        <div id="logindiv">
            <div class="container">  
                <div class="row">  
                    <div class="col-md-4 col-md-offset-4">  
                        <div class="login-panel panel panel-success">  
                            <div class="panel-heading">  
                                <h3 class="panel-title">Sign In</h3>  
                            </div>  
                            <div class="panel-body">  
                                <form role="form" method="post" action="login.php">  
                                    <fieldset>  
                                        <div class="form-group"  >  
                                            <input class="form-control" placeholder=Username name="name" type="textbar" autofocus>  
                                        </div>  
                                        <div class="form-group">  
                                            <input class="form-control" placeholder="Password" name="pass" type="password" value="">  
                                        </div>  


                                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="login" >  

                                        
                                    </fieldset>  
                                </form>  
                                <center><b>Not yet registered ?</b> <br></b><a href="Registration.php">Register here</a></center><!--for centered text-->  
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </div>  

<?php
require ('Footer.html');// the footer from the footer.html page is displayed using the require statement
