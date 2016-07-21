<?php 
require ('Menu.html'); // the menu from the menu.html page is displayed using the require statement

       
        define('TITLE', 'Contact Us'); //the title of the page is defined as Contact Us
       
            include("Db_connection.php"); //a connection to the database is made here, the datasbase connection is made through the Db_connection page
            
            $valid=true; //initialized as true
            if (isset($_POST['submit'])) { //if the user submits the form using the button named submit, the following codes will be executed
                //getting the results from the post array after the form is submitted
                $user_name = $_POST['name']; 
                $user_email = $_POST['email']; 
                $user_comments = $_POST['comments'];  

                 //javascript use for input checking  
                if (empty($_POST['name'])) { //if the name textbox is empty, an error will be displayed
                    echo"<script>alert('Please enter your name')</script>";
                     $valid=false; //if the user has not entered their username, valid is set to false
                    
                }

                if (empty($_POST['email'])) {//if the email textbox is empty, an error will be displayed
                    echo"<script>alert('Please enter your email')</script>";
                   $valid=false;  //if the user has not entered their email, valid is set to false
                }

                if (empty($_POST['comments'])) {//if the comments textbox is empty, an error will be displayed
                    echo"<script>alert('Please enter your comments')</script>";
                    $valid=false; //if the user has not entered their comments, valid is set to false
                }


                   
              
                if($valid) //if valid is true, the contact form is inserted into the database
                {
                $insert_contact = "insert into contact (user_name,user_email,user_comments) VALUE ('$user_name','$user_email','$user_comments')";
                if (mysqli_query($dbcon, $insert_contact)) {
                    
                    echo "<script>alert('Thank you for submitting your feedback $user_name')</script>"; //an alert to confirm if the form was inserted into the database table
                    
                }
                
                else 
                {
                    echo "<script>alert('Sorry $user_name, your feedback was not submitted successfully')</script>"; //an alert if the form was not successfully added to the database table
                }
                
                
            }  
            }
            


?>


<html>  
    <head lang="en">  
        <meta charset="UTF-8">  
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>Contact</title>  
    </head>  
    <style>  
        .login-panel {  
            margin-top: 100px;  
            margin-bottom:100px;

        </style>  
        <body>  
<div id="contactusdiv">
            <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
                <div class="row"><!-- row class is used for grid system in Bootstrap-->  
                    <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of columns in the grid also use for medium and large devices-->  
                        <div class="login-panel panel panel-success">  
                            <div class="panel-heading">  
                                <h3 class="panel-title">Contact Us</h3>  
                            </div>  
                            <div class="panel-body">  
                                <form role="form" method="post" action="ContactUs.php">  
                                    <fieldset>  
                                        <div class="form-group">  
                                            <input class="form-control" placeholder="Enter your name" name="name" type="text" autofocus>  
                                        </div>  

                                        <div class="form-group">  
                                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>  
                                        </div>  
                                        <div class="form-group">  
                                            <textarea class="form-control" rows="4" cols="50" placeholder="Your comments here" name="comments"  value=""></textarea>  
                                        </div>  


                                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Submit" name="submit" >  

                                    </fieldset>  
                                </form>  

                            </div>  
                        </div>  
                    </div>  
                </div>  
            </div>  

</div>

           
            
 <?php require ('Footer.html'); // the footer from the footer.html page is displayed using the require statement
