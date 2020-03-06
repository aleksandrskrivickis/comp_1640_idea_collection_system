<?php
session_start();

if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
    
    //We will need an admin cechk when loggin in to make into a session
    //if(isset($_SESSION['admin'])){$admin = $_SESSION['admin'];}

}else
{
     header("Location: https://stuweb.cms.gre.ac.uk/~st2645h/loginreg.php");
}
?>


<html>
<head>
  <title>Title of the documents</title>
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
    <link rel="stylesheet" type="text/css" href="manageuserCSS.css">
</head>


<body>
    <div id="nav-placeholder">

</div>

<script>
$(function(){
  $("#nav-placeholder").load("nav_bar.php");
});
</script>
The content of the documents......
</body>

</html>


<?php
include_once "./footer.php";
?>

