
<?php
require ('Admin_Menu.html'); // the menu from the menu.html page is displayed using the require statement
define('TITLE', 'Edit Books'); //the title of the page is defined as Edit Books

include_once 'Db_connection.php'; //a connection to the database is made here, the datasbase connection is made through the Db_connection page

if (isset($_GET['id'])) { //when the admin clicks the edit button in the view_products page
    $id = $_GET['id']; //it gets the id of the book
    if (isset($_POST['submit'])) {  //if the user submits the form using the button named submit, the following codes will be executed
               
        //getting the results from the post array after the form is submitted
        $picture = $_POST['picture'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $booktype = $_POST['booktype'];
        $publicationdate = $_POST['publicationdate'];
        $isbn = $_POST['isbn'];
        $pages = $_POST['pages'];

        //the book details are updated by getting its id 
        $query3 = mysqli_query($dbcon, "update products set name='$name', description='$description', price='$price', booktype='$booktype',"
                . "publicationdate='$publicationdate', isbn='$isbn', pages='$pages' where id='$id'");
        if ($query3) { //if the update is successful
            echo "<script>window.open('view_products.php?updated=book has been updated','_self')</script>"; //the page is displays within the url that the book has been updated
        }
    }
    $query1 = mysqli_query($dbcon, "select * from products where id='$id'"); //displays the products from the database in the html form
    $query2 = mysqli_fetch_array($query1);
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

            <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
                <div class="row"><!-- row class is used for grid system in Bootstrap-->  
                    <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
                        <div class="login-panel panel panel-success">  
                            <div class="panel-heading">  
                                <h3 class="panel-title">Book Upload</h3>  
                            </div>  
                            <div class="panel-body">  



                                <form method="post" action="" align="center">


                                    <fieldset>
                                        <div class="form-group">
                                            Picture<br/> <input class="form-control" type="file" name="picture" value="<?php echo $query2['picture']; ?>" /><br />
                                        </div>

                                        <div class="form-group">
                                            Name <br/>   <input class="form-control" type="text" name="name"  value="<?php echo $query2['name']; ?>" /><br />
                                        </div>


                                        <div class="form-group">
                                            Description<br/> <textarea class ="form-control" rows="5" name="description"> <?php echo $query2['description']; ?>"</textarea><br/>
                                        </div>


                                        <div class="form-group">
                                            Price<br/>   <input class="form-control" type="text" name="price"  value="<?php echo $query2['price']; ?>" /><br />
                                        </div>

                                        <div class="form-group">
                                            Book Type<br/> <select class="form-control" name="booktype" value="<?php echo $query2['booktype']; ?>" /><br />
                                            <option>Information Technology</option>
                                            <option>Arts</option>
                                            <option>Science</option>
                                            <option>Law</option>
                                           
                                            </select>

                                        </div> 



                                        <div class="form-group">
                                            Publication Date <br/>   <input class="form-control" type="date" name="publicationdate"  value="<?php echo $query2['publicationdate']; ?>" /><br />
                                        </div>  

                                        <div class="form-group">
                                            ISBN <br/>    <input class="form-control" type="text" name="isbn"  value="<?php echo $query2['isbn']; ?>" /><br />
                                        </div>  

                                        <div class="form-group">
                                            Pages<br/>   <input class="form-control" type="text" name="pages"  value="<?php echo $query2['pages']; ?>" /><br />
                                        </div>

                                        <br />
                                        <input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Update" />



                                    </fieldset>  
                                </form>  

                            </div>  
                        </div>  
                    </div>  
                </div>  
            </div>                     










            <?php
            require ('Footer.html'); // the footer from the footer.html page is displayed using the require statement
        }
        ?>
