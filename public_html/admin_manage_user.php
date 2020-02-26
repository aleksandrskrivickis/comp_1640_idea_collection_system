<?php
#Include Decision function that checks if user is still logged in and dericts him to log in form, registration or main
//READ COMMIT CHANGE COMMENT
?>


<!DOCTYPE html>
<html>
<head>
<title>Manage Users</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <!--To allow MS Edge and IE -->  
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <!-- ADD ICON LIBRARY -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="styles2.css">   
    <style>
    
        .display-4 {
            
            font-size: 50px;
        }
    </style>
</head>

<body>

<!--NAVIGATION BAR-->
  <!-- Image and text -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #036DA1;">
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a href="forum.html"><button class="btn btn-light my-2 my-sm-0" type="submit">Forums</button></a>
      </li>
    </ul>
      
    <form class="form-inline my-2 my-lg-0">
        <a href="admin.html"><button style="margin:40px;" class="btn btn-light my-2 my-sm-0" type="Submit">Admin area</button></a>

      </form> 
      
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-light my-2 my-sm-0" type="submit">Sign out</button>
    </form>
      
   
  </div>
</nav>
       
    
    <!--PAGE TITLE/HEADER--> 
    <h1> Manage users</h1>
     <br>
    <form><!-- form action="" method="post"-->
        
        <div class="container">           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>UserID</th>  
        <th>Username</th>
        <th>Name</th>
        <th>Email</th>
          <th>Password</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>000998889</td>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>password</td>  
        <td>Edit</td>
        <td>Delete</td>
      </tr>
      <tr>
        <td>939393993</td>  
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td>password</td>
        <td>Edit</td>
        <td>Delete</td>
      </tr>
      <tr>
        <td>009993333</td>  
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
        <td>Password</td>
        <td>Edit</td>
        <td>Delete</td>
      </tr>
    </tbody>
  </table>
</div>
        
    </form>
    
    </body>
    
</html>


<?php
include_once "./footer.php";
?>

