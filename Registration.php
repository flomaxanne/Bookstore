<?php
require ('Menu.html'); // the menu from the menu.html page is displayed using the require statement

define ('TITLE', 'Registration'); //the title of the page is defined as Contact Us


    include("Db_connection.php"); //a connection to the database is made here, the datasbase connection is made through the Db_connection page
    $valid=true; //initialized as true
    if (isset($_POST['register'])) { //if the user submits the form using the button named submit, the following codes will be executed
       
        //getting the results from the post array after the form is submitted           
        $user_name = $_POST['name']; 
        $user_pass = $_POST['pass']; 
        $user_email = $_POST['email']; 


        if (empty($_POST["name"])) { //if the name textbox is empty, an error will be displayed
            //javascript use for input checking  
            echo"<script>alert('Please enter your name')</script>";
            $valid=false; //if the user has not entered their username, valid is set to false
           
        }

         if (empty($_POST["pass"])) { //if the paaword textbox is empty, an error will be displayed
            echo"<script>alert('Please enter a password')</script>";
            $valid=false; //if the user has not entered their password, valid is set to false
        }

        if (empty($_POST["email"])) { //if the email textbox is empty, an error will be displayed
            echo"<script>alert('Please enter your email')</script>";
            $valid=false; //if the user has not entered their email, valid is set to false
        }
        
         //here query check whether if user already registered using their email before, so can't register again.  
        $check_email_query = "select * from users WHERE user_email='$user_email'";
        $run_query = mysqli_query($dbcon, $check_email_query);

        if (mysqli_num_rows($run_query) > 0) {
            echo "<script>alert('Email $user_email is already exists, Please login instead!')</script>";
            header('Login.php'); //if the email that already exists in the database is entered, user is redirected to the login page
            
        }
         
        //the query check whether if the username is already taken  
        $check_username_query = "select * from users WHERE user_name='$user_name'";
        $run_query = mysqli_query($dbcon, $check_username_query);

        if (mysqli_num_rows($run_query) > 0) {
            echo "<script>alert('Username $user_name already exists, Please try another one!')</script>";
            header('Refresh:0'); //if the username that already exists in the database is entered, user is expected to enter a new one in the registration page
            exit();
        }



       
        if($valid){ //if valid is true, the registration form is inserted into the database
        
        $insert_user = "insert into users (user_name,user_pass,user_email) VALUE ('$user_name','$user_pass','$user_email')";
        if (mysqli_query($dbcon, $insert_user)) {
            echo"<script>alert('Thank you for signing up $user_name')</script>"; //an alert to confirm if the form was inserted into the database table
            header("Location:Login.php"); //user is redirected to the login page
        }
                
                else 
                {
                    echo "<script>alert('Sorry, you have not registered successfully')</script>"; //an alert if the form was not successfully added to the database table
                }
                
                
            }  
            }
    ?>

  
        <meta charset="UTF-8">  
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <style>  
        .login-panel {  
           margin-top: 100px;  
            margin-bottom:100px;

        </style>  
      
            <div id="registrationdiv">
            <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
                <div class="row"><!-- row class is used for grid system in Bootstrap-->  
                    <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
                        <div class="login-panel panel panel-success">  
                            <div class="panel-heading">  
                                <h3 class="panel-title">Registration</h3>  
                            </div>  
                            <div class="panel-body">  
                                <form role="form" method="post" action="Registration.php">  
                                    <fieldset>  
                                        <div class="form-group">  
                                            <input class="form-control" placeholder="Username" name="name" type="text" autofocus>  
                                        </div>  

                                        <div class="form-group">  
                                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>  
                                        </div>  
                                        <div class="form-group">  
                                            <input class="form-control" placeholder="Password" name="pass" type="password" value="">  
                                        </div>  


                                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >  

                                    </fieldset>  
                                </form>  
                                <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->  
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </div>  

        
   <?php require ('Footer.html');  // the footer from the footer.html page is displayed using the require statement
    
    ?>  