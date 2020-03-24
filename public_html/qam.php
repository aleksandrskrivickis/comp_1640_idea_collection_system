<html>   
<head>
<title>QA Management</title>

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
    
    
  <link rel="stylesheet" type="text/css" href="chartstyle.css"> 
                 <link rel="stylesheet" type="text/css" href="manageuserCSS.css">
    <style>
    
        .display-4 {
            
            font-size: 50px;
        }
        
 #closureDates {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#closureDates td, #closureDates th {
  border: 1px solid #ddd;
  padding: 8px;
}

#closureDates tr:nth-child(even){background-color: #f2f2f2;}

#closureDates tr:hover {background-color: #ddd;}

#closureDates th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #036CA0;
  color: white;
    
}
        
   


    </style>
</head>
    
    <!---- BODY -->
  <body>
      
      <!-- NAV BAR -->
<div id="nav-placeholder">

</div>

<script>
$(function(){
  $("#nav-placeholder").load("nav_bar.php");
});
</script>
             
      
     <br>
      
      <!-- Button trigger modal EDIT CATEGORIES -->
<button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"  style="border-color: #036CA0;">
  Edit Categories
</button>
      
      
            <!-- Button trigger modal EDIT USERS -->
<button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal1"  style="border-color: #036CA0;">
  Edit Users
</button>
      <br><br>  
      
      <!-- TABLE FOR CLOSURE DATES -->
<table id="closureDates">
  <tr>
    <th>Forum</th>
    <th>Closure Date</th>
    <th>Final Closure Date</th>
      <th> Edit Dates</th>
    <th>Download Data</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>12/12/12</td>
    <td>15/15/15</td>
    <td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter2"> <!-- Trigger modal --> Edit </button></td>
      <td><button class="downloaded">Download</button></td>
  </tr>
  <tr>
    <td>Berglunds snabbköp</td>
    <td>12/12/12</td>
    <td>15/15/15</td>
    <td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter2"> <!-- Trigger modal --> Edit </button></td>
      <td><button class="downloaded">Download</button></td>
  </tr>
 
</table>
      
<!-- MODAL FOR EDIR ADDING OR DELETING CATEGORIES -->
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
              <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Category
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item">A</a>
    <a class="dropdown-item">B</a>
  </div>

 <button class="btn btn-light">Delete</button>
                   </div>
       <br>    
            <br>
          
            <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">New Category</span>
  </div>
  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
</div>
                  <button class="btn btn-light">Add</button>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
      </div>  
      
<!-- MODAL FOR EDIT ADDING OR DELETING USERS -->
      <!-- Modal -->
<div class="modal fade"   id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <?php  //connection
          
          
try {
$host = "localhost";
$username = "jsmarchant97";
$password = "enterpriseCW";
$database = "jsmarcha_enterprisecw";
$dbc = mysqli_connect($host, $username, $password, $database) OR die("couldn't connect to database".  mysqli_connect_errno());
} catch (Exception $e){
  $host = "mysql.cms.gre.ac.uk";
  $username = "st2645h";
  $password = "Enterprise94";
  $database = "mdb_st2645h";
  $dbc = mysqli_connect($host, $username, $password, $database) OR die("couldn't connect to database".  mysqli_connect_errno());
}  

        
$result = mysqli_query($dbc, " SELECT UserID, u.UserName,u.Password, d.Name AS dName, Email, r.Name AS rName, Banned, u.Removed  FROM User u LEFT Join Department d ON u.DepartmentID=d.DepartmentID INNER join Role r on u.RoleID=r.RoleID ORDER BY u.UserID ASC");       
                      
?>
             <div class="container">
            <table class="table table-bordered" id="table">
                <thead>



                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>

                    </thead>
                    <tbody>


                    <?php 
                    $i = 0;
                    while($row = mysqli_fetch_array($result)): ?>
                    <tr>

                        <form method="post">
                            <td><?php echo $row['UserName'];?></td>
                            
                            <td><?php echo $row['Email'];?></td>
                           
                            <td><?php echo $row['dName'];?></td>
                          
                            <td><?php echo $row['rName'];?></td>

                       
                        <?php// } ?>
                        
                             <!-- Can be changed to block or remove -->
                            <td><?php 
                                
                               if($row['Removed'] == 1)
                                {
                                 echo '<p1>Deleted</p1>';
                                }
                                else if($row['Banned'] == 1)
                                {
                                echo '<p1>Banned</p1>';
                                }

                                else if($row['Banned'] == 0 && $row['Removed'] == 0){
                                    echo '<p2> Normal</p2>';
                            };
                                ?></td>
                            
                            <input type="hidden" name="id<?php echo $i; ?>" value="<?php echo $row['UserID']; ?>" >
                       
                        
                        <th><button name="Edit<?php echo $i;?>" class="open-form" onclick="openForm()">Edit</button></th>
                        
                          <?php
                    if(isset($_POST["Edit".$i])){
                        
                        echo "<div class='form-popup' id='myForm'>";
                       echo "<form method ='post'> ";
                        echo "<h1>".$row['UserName']."</h1>";
  
                        echo "<label for='banned'><b>Banned</b></label>";
                        echo "<select id='Banned' name='Banned'>";

                        if($row['Banned'] == 1)
                        {
                            echo "<option value='areBanned' selected>Banned</option>";
                            echo "<option value='notBanned'>Not Banned</option>";
                        } 
                        else if($row['Banned'] == 0)
                        {
                            echo "<option value='notBanned' selected>Not Banned</option>";
                            echo "<option value='areBanned'>Banned</option>";
                        };                    
                        
                        echo "</select>";
                        
echo "<input type='submit' class='button3' id='".$row['UserID']."' name='pwdReset' value='Reset'  >";
echo    "<input type='submit' id='".$row['UserID']."' name='EditSubmit'".$i." class='button2' />";
echo    "<button type='button' class='button' onclick='closeForm()'>Close</button>";
echo    "</form>";
echo   "</div>";    
                        
}
                            
                            
                      
                            
                            ?>
                         
                        <?php
                         if(isset($_POST["pwdReset"]))
                         {  
                           
                       echo $_POST["id".$i];
                          $check = "UPDATE User SET Password = 'The Witcher 2' WHERE UserID = '".$_POST['id'.$i]."'";  
                        
                         if ($dbc->query($check) === TRUE)
                         {
                         echo "<meta http-equiv='refresh' content='0'>";
                             
                         }
                         else 
                         {
                                  
                        echo "<script> alert('Error updating record: " . $dbc->error . "')</script>";
                         } 
                
                        }          
                        
                        ?>
                            
                            
                            <?php
                            if(isset($_POST["EditSubmit"]))
                            {
                                
                               $BannedChecker = $_POST['Banned'];
                                if ($BannedChecker == 'areBanned'){
                                    $BanNum = 1;
                                 
                                }
                                if($BannedChecker == 'notBanned'){
                                    $BanNum = 0;
                                  
                                } 
                                
                               
               $check = "UPDATE User SET Banned = '".$BanNum."' WHERE UserID = '".$_POST['id'.$i]."'";
                      if ($dbc->query($check) === TRUE)
                         {
                         echo "<meta http-equiv='refresh' content='0'>";
                         }
                         else 
                         {
                                 echo 'Test'; 
                 //       echo "<script> alert('Error updating record: " . $dbc->error . "')</script>";
                         } 
                                
                                
                                // update user, if banned, unbanned, or deleted, if already deleted then 
                               // cannot change
                                
                            }
                            
                            
                            
                            ?>
                            
                            
                    
                   
                       
                     
                   
                   

                        <?php $i++; endwhile;?>
                 
                        </form>
                           
                </tbody>
                 </table>
                 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>
      </div>
    </div>

<!-- MODAL FOR EDIT BUTTON- CLOSURE DATES -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Edit Closure Dates
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item">Closure Date</a>
    <a class="dropdown-item">Final Closure Date</a>
  </div>
       <br>    
            <br>
            <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">New Closure Date</span>
  </div>
  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
</div>
            
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-light">Save changes</button>
      </div>
    </div>
  </div>
</div>
      
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
      </body>
</html>

<script>
$(document).ready(function(){
    $('.downloaded').click(function(){
        $(this).html($(this).html() == 'Download' ? 'Downloaded' : 'Download');
    });
});
    </script>

