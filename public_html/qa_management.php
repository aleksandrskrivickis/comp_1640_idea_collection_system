<?php 
include_once('database.php');
    session_start();
    
    $delete = new Database();



?>

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
                                 <?php  //connection
    $host = "mysql.cms.gre.ac.uk";
    $username = "st2645h";
    $password = "Enterprise94";
    $database = "mdb_st2645h";

    


$dbc = mysqli_connect($host, $username, $password, $database) OR die("couldn't connect to database".  mysqli_connect_errno());

        
$result = mysqli_query($dbc, " SELECT Name, Description FROM Category Where Removed = 0");       
                      
?>
      
     <br>
      
      <!-- Button trigger modal EDIT CATEGORIES -->
<button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"  style="border-color: #036CA0;">
  Add Categories
</button>
      <br><br>
      
      <!-- TABLE FOR CLOSURE DATES -->
<table id="closureDates">
  <tr>
      <th>Subject</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Delete</th>
  </tr>
    
 

                    <?php 
                    $i = 0;
                    while($row = mysqli_fetch_array($result)): ?>
                    <tr>

                        <form method="post">
                            <td><?php echo $row['Name'];?></td>
                            
                            <td><?php echo $row['Description'];?></td>
                           

                            
                           
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
                            
                            <input type="hidden" name="id<?php echo $i; ?>" value="<?php echo $row['CategoryID']; ?>" >
                       
                        
                        <th><button name="Delete<?php echo $i;?>" class="open-form" onclick="openForm()">Delete</button></th>
                      
                        
                        
                
                       <?php
                    if(isset($_POST["Delete".$i])){
                         
                        $cat = $delete->deleteCategory($row['Name']);  
                        if ($cat)
                        {
                        echo "<meta http-equiv='refresh' content='0'>";
                            
                        }
                            
                            
                            
                    }
                            ?>
                                                  <?php $i++; endwhile;?>
      
                            
                            <?php
                              $subject = $_POST['newCat'];

                                $disc = $_POST['Dis'];
                            //  echo $subject;
                            if(isset($_POST['save']))
                            {
                                if(empty($_POST['newCat'])){
                                echo 'empty';
                                }
                                else{
                              $check = "SELECT * FROM Category WHERE (Name ='".$subject."' AND Removed = 0)";
                                $result=mysqli_query($dbc,$check);

                                    if(mysqli_num_rows($result) ==0)
                                    {
                             $add = "INSERT INTO Category (NAME, Description, Removed) VALUES ('".$subject."','".$disc."', 0 )";
                                        $dbc->query($add);
                                        
                                         echo "<meta http-equiv='refresh' content='0'>";
                                    }
                                    else {
                                        echo 'Name already exsited';
                                    }
                                }
                            }
                            
                            ?>
                      
       <!-- MODAL FOR EDIR ADDING OR DELETING CATEGORIES -->
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <br>    
            <br>
          
            <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">New Category</span>   
  </div>
  <input type="text" value="" name="newCat" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
</div>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Discription</span>   
  </div>
  <input type="text" value="" name="Dis" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
</div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
      </div>  


      


          
                        </form>
                    </tr>        
    
 
</table>


 
      
                                        
 
      

<script>
$(document).ready(function(){
    $('.downloaded').click(function(){
        $(this).html($(this).html() == 'Download' ? 'Downloaded' : 'Download');
    });
});
    </script>



      </body>
</html>
