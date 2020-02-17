<?php

include('database.php');
 session_start();
    
    $funObj = new Database();
    $logerrors = array();
    $errors = array();

//connect to the database
 //$db = mysqli_connect('mysql.cms.gre.ac.uk', 'st2645h', 'Enterprise94', 'mdb_st2645h');


// if the register button is clicked


if (isset($_POST['register_b'])){
   
    
    $username = $_POST['username1'];
    $email = $_POST['email1'];
     $password1 = $_POST['password2'];
    
   
    
    // ensure that form fields are filled properly
    
    
    $user = $funObj->usernameTaken($username);
   if ($user){
        
                array_push($errors,"user already exists");
            
    }
    
   if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
         array_push($errors,"invalid email");
 }
   
    // if there are no errors, save user to database
    
    if (count($errors) == 0) {
         
        
         $register = $funObj->createUser($username, $password1, $email, 'Support', 'Computing');  
        if($register){  
                    array_push($errors,"Registration Successful");
                }else{  
                    array_push($errors,"Registration Not Successful");  
                }  
       
    }
}
    
      



// login //


if (isset($_POST['login_b'])){
    
   
    
    $username = $_POST['username1'];
     $password = $_POST['password'];
    
    
     $user = $funObj->checkLogin($username, $password);  
        if ($user) {  
            // login Success  
          array_push($logerrors,"login successful"); 
        } 
    else {
                array_push($logerrors,"Wrong password or ID");
            }
    
    
    
    
    

}


?>
