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
             
      
     <br>
      
      <!-- Button trigger modal EDIT CATEGORIES -->
<button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"  style="border-color: #036CA0;">
  Edit Categories
</button>
      <br><br>
      
      <!-- TABLE FOR CLOSURE DATES -->
<table id="closureDates">
  <tr>
    <th>Idea</th>
    <th>Closure Date</th>
    <th>Final Closure Date</th>
      <th> Edit Dates</th>
    <th>Download Data</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>12/12/12</td>
    <td>15/15/15</td>
    <td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter"> <!-- Trigger modal --> Edit </button></td>
      <td><button class="downloaded">Download</button></td>
  </tr>
  <tr>
    <td>Berglunds snabbköp</td>
    <td>12/12/12</td>
    <td>15/15/15</td>
    <td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter"> <!-- Trigger modal --> Edit </button></td>
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

<!-- MODAL FOR EDIT BUTTON- CLOSURE DATES -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
      

      </body>
</html>

<script>
$(document).ready(function(){
    $('.downloaded').click(function(){
        $(this).html($(this).html() == 'Download' ? 'Downloaded' : 'Download');
    });
});
    </script>
