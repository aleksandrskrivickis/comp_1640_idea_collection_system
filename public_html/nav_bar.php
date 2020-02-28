<?php
include('database.php');
$admin = new Database();
session_start();
$username = $_SESSION['username'];

?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #036DA1;">
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
            <form class="form-inline my-2 my-lg-0" action="forum.php">
        <button class="btn btn-light my-2 my-sm-0"  type="submit">Forums</button>
          </form>
      </li>
    </ul>
      
     
      
      
      <?php
      //Checks if user is an admin
      
      $user = $admin->isAdmin($username);
      
      if($user){
        echo '<form class="form-inline my-2 my-lg-0" action="admin_panel.php">';
        echo '<button style="margin:40px;" class="btn btn-light my-2 my-sm-0" type="Submit">Admin area</button>';
        echo '</form>';
        }
      else {
          
      }
      
      
            ?>
      
      
      
      
    <form class="form-inline my-2 my-lg-0" action="logout.php">
      <button class="btn btn-light my-2 my-sm-0" type="submit">Sign out</button>
    </form>
      
   
  </div>
</nav>
       
