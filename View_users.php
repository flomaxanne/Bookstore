<?php 
require ('Admin_Menu.html'); // the admin menu from the admin_menu.html page is displayed using the require statement
define ('TITLE', 'View Users'); //the title of the page is defined as View users
 include("Db_connection.php");  //a connection to the database is made here, the datasbase connection is made through the Db_connection page
?>



  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   
 
<style>  
    .login-panel {  
        margin-top: 100px;  
        
    }  
    .table {  
        margin-top: 50px;  
  
    }  
  
</style>  
  
<body>  
  
<div class="table-scrol">  
    <h1 align="center">All the Users</h1>  
  
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
  
  
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
        <thead>  
  
        <tr>  
  
            <th>User Id</th>  
            <th>User Name</th>  
            <th>User Password</th>  
            <th>User E-mail</th>  
            <th>Delete User</th>  
        </tr>  
        </thead>  
  
        <?php  
       
        $view_users_query="select * from users";//select query for viewing users.  
        $run=mysqli_query($dbcon,$view_users_query);//here run the sql query.  
  
        while($row=mysqli_fetch_array($run))//while loop to fetch the result and store in a array $row.  
        {  
            $user_id=$row[0];  
            $user_name=$row[1];  
            $user_email=$row[2];  
            $user_pass=$row[3];  
        ?>  
  
        <tr>  
             <!--The results of the table are shown -->  
            <td><?php echo $user_id;  ?></td>  
            <td><?php echo $user_name;  ?></td>  
            <td><?php echo $user_email;  ?></td>  
            <td><?php echo $user_pass;  ?></td>  
            <td><a href="delete.php?del=<?php echo $user_id ?>"><button class="btn btn-danger">Delete</button></a></td>      <!--The delete button deletes users by their id -->  
        </tr>  
  
        <?php } ?>  
  
    </table>  
        </div>  
</div>  
  
 <?php require ('Footer.html'); // the footer from the footer.html page is displayed using the require statement