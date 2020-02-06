<?php
    session_start();
    
    
    $logerrors = array();
    $errors = array();

//connect to the database
 $db = mysqli_connect('mysql.cms.gre.ac.uk', 'st2645h', 'Enterprise94', 'mdb_st2645h');


// if the register button is clicked


if (isset($_POST['register_b'])){
   
    
    $username = mysqli_real_escape_string($db,$_POST['username1']);
    $email = mysqli_real_escape_string($db,$_POST['email1']);
     $password1 = mysqli_real_escape_string($db,$_POST['password2']);
    
   
    
    // ensure that form fields are filled properly
    
    
    
    if (!empty($username)){
        
        $sql = "SELECT * FROM `User` WHERE `UserName` = '$username'";
        $result = mysqli_query($db, $sql);
            
            if (mysqli_num_rows($result) == 1){
                array_push($errors,"user already exists");
            }
    }
    
   if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
         array_push($errors,"invalid email");
 }
   
    // if there are no errors, save user to database
    
    if (count($errors) == 0) {
        
       
        $sql = "INSERT INTO `User` (`UserName`, `Password`, `Email`) VALUES ('$username', '$password1', '$email')";
        
        mysqli_query($db, $sql);
        $_SESSION['success'] = "you have successfully registered";
       
    }
    
}


// login //


if (isset($_POST['login_b'])){
    
   
    
    $username = mysqli_real_escape_string($db,$_POST['username1']);
     $password = mysqli_real_escape_string($db,$_POST['password']);
    
   
    
    
    $sql = "SELECT * FROM `User` WHERE `UserName` = '$username' AND `Password` = '$password'";
    $result = mysqli_query($db, $sql);
    
     if (mysqli_num_rows($result) == 1){
         
        
        $_SESSION['success'] = "you have successfully Logged IN";
       
     }
     
    else {
                array_push($logerrors,"Wrong password or ID");
            }
    
    
    
    
    

}


?>