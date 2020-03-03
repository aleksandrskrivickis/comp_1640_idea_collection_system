<?php
#Include Decision function that checks if user is still logged in and dericts him to log in form, registration or main
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin</title>

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
        <button class="btn btn-light my-2 my-sm-0" type="submit">Forums</button>
      </li>
    </ul>
      
    <form class="form-inline my-2 my-lg-0">
      <button style="margin:40px;" class="btn btn-light my-2 my-sm-0" type="Submit">Admin area</button>

      </form> 
      
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-light my-2 my-sm-0" type="submit">Sign out</button>
    </form>
      
   
  </div>
</nav>
       
    
    <!--PAGE TITLE/HEADER--> 
    <h1> Admin Area</h1>
    
    <form><!-- form action="" method="post"-->

        <!-- FIRST FORUM -->
    <div class="pad"> 
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row"> 
        <div class="col-9">
        <h2 class="display-4">Manage System Users</h2>
       </div> 
    <br> 
      
    
    <div class="col-3">
        <a href="manageuser.php"><button type="button" class="seeforum">Manage Users</button></a> 
    </div>
            
        </div>
            </div>
                </div>   
        
        <br>
       <!-- SECOND FORUM -->    
      
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row"> 
        <div class="col-9">
            <h2 class="display-4">Manage Forums</h2>
       </div> 
    <br> 
      
    
    <div class="col-3">
        <a href="forum.html"><button type="button" class="seeforum">Manage Forum</button></a> 
    </div>
            
        </div>
            </div>
                </div>                
                    
        
        
        </div>
        
          </form>
    </body>
</html>

<?php
include_once "./footer.php";
?>

