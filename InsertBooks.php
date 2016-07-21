<?php
require ('Admin_Menu.html');  // the admin menu from the admin_menu.html page is displayed using the require statement

define('TITLE', 'Insert Books'); //the title of the page is defined as Insert Books

            include("Db_connection.php"); //a connection to the database is made here, the datasbase connection is made through the Db_connection page
            $valid=true; //initialized as true
            if (isset($_POST['submit'])) { //if the user submits the form using the button named submit, the following codes will be executed
                //getting the results from the post array after the form is submitted
                $picture = $_POST['bookpicture']; 
                $name = $_POST['bookname'];
                $description = $_POST['bookdescription'];
                $price = $_POST['bookprice'];
                $booktype = $_POST['type'];
                $publicationdate = $_POST['bookpublicationdate'];
                $isbn = $_POST['bookisbn'];
                $pages = $_POST['bookpages'];

                 if (empty($_POST['bookname'])) { //if the name textbox is empty, an error will be displayed
                    //javascript use for input checking  
                    echo"<script>alert('Please enter the name')</script>";
                    $valid=false; //if the user has not entered the book name, valid is set to false
                   
                }

                 if (empty($_POST['bookdescription'])) { //if the description textbox is empty, an error will be displayed
                    //javascript use for input checking  
                    echo"<script>alert('Please enter the description')</script>";
                     $valid=false; //if the user has not entered the book description, valid is set to false
                }

                  if (empty($_POST['bookprice'])) { //if the price textbox is empty, an error will be displayed
                    //javascript use for input checking  
                    echo"<script>alert('Please enter the price')</script>";
                     $valid=false; //if the user has not entered the book price, valid is set to false
                }
                 if (empty($_POST['type'])) { //if the booktype textbox is empty, an error will be displayed
                    //javascript use for input checking  
                    echo"<script>alert('Please enter the booktype')</script>";
                      $valid=false; //if the user has not entered the book type, valid is set to false
                }

                  if (empty($_POST['bookpublicationdate'])) { //if the publicationdate textbox is empty, an error will be displayed
                    //javascript use for input checking  
                    echo"<script>alert('Please enter the publication date')</script>";
                     $valid=false; //if the user has not entered the book publication date, valid is set to false
                }

                 if (empty($_POST['bookisbn'])) { //if the isbn textbox is empty, an error will be displayed
                    //javascript use for input checking  
                    echo"<script>alert('Please enter the isbn')</script>";
                      $valid=false; //if the user has not entered the book isbn, valid is set to false
                }
                 if (empty($_POST['bookpages'])) { //if the pages textbox is empty, an error will be displayed
                    //javascript use for input checking  
                    echo"<script>alert('Please enter the page number')</script>";
                      $valid=false; //if the user has not entered the book pages, valid is set to false
                }
                   if (empty($_POST['bookpicture'])) { //if the picture textbox is empty, an error will be displayed
                    echo"<script>alert('Please enter a picture')</script>";
                      $valid=false; //if the user has not entered the book picture, valid is set to false
                  
                }

                //insert the contact us form into the database.  
                if($valid) //if valid is true, the book details are inserted into the database
                {
                $insert_book = "insert into products (picture,name,description,price,booktype,publicationdate,isbn,pages) VALUE ('$picture','$name','$description','$price','$booktype','$publicationdate','$isbn','$pages')";
                if (mysqli_query($dbcon, $insert_book)) {

                    echo "<script>alert('The book was successfully added to the database!')</script>"; //an alert to confirm if the form was inserted into the database table
                } 
                }
                
                
                else 
                {
                    echo "<script>alert('The book was not successfully added!')</script>"; //an alert if the form was not successfully added to the database table
                }
            }

?>


        <meta charset="UTF-8">  
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>Upload</title>  
    </head>  
    <style>  
        .login-panel {  
            margin-top: 100px;  
            margin-bottom:100px;
        </style>  
        <body>  
<div id="admindiv">
            <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
                <div class="row"><!-- row class is used for grid system in Bootstrap-->  
                    <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
                        <div class="login-panel panel panel-success">  
                            <div class="panel-heading">  
                                <h3 class="panel-title">Book Upload</h3>  
                            </div>  
                            <div class="panel-body">  
                                <form role="form" method="post" action="InsertBooks.php">  
                                    <fieldset>  


                                        <div class="form-group">  
                                            <input class="form-control" placeholder="Enter the book name" name="bookname" type="text" autofocus>  
                                            
                                        </div>  

                                        <div class="form-group">  
                                            <textarea class="form-control" rows="5" placeholder="Description" name="bookdescription"></textarea>
                                           
                                        </div>  

                                        <div class="form-group">  
                                            <input class="form-control" placeholder="Enter the book price" name="bookprice" type="text" autofocus>  
                                        </div>  

                                      

                                        <div class="form-group">  
                                            <label for="type">Select Book Type</label>
                                            <select class="form-control" name="type">
                                                <option>Information Technology</option>
                                                <option>Science</option>
                                                <option>Engineering</option>
                                                <option>Law</option> 
                                            
                                            </select>

                                        </div> 

                                        <div class="form-group">  
                                            <input class="form-control" placeholder="Enter the book publication date" name="bookpublicationdate" type="date" autofocus>  
                                        </div>  


                                        <div class="form-group">  
                                            <input class="form-control" placeholder="Enter the book isbn" name="bookisbn" type="text" autofocus>  
                                        </div>  

                                        <div class="form-group">  
                                            <input class="form-control" placeholder="Enter the book pages" name="bookpages" type="text" autofocus>  
                                        </div>  


                                        <div class="form-group">  
                                             <input class="form-control" type="file" name="bookpicture" id="fileToUpload">


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
<?php require ('Footer.html');// the footer from the footer.html page is displayed using the require statement
            ?>