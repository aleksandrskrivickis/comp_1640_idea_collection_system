<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Login and register</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <!--To allow MS Edge and IE -->  
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

<!--NAVIGATION BAR-->
  <!-- Image and text -->
  <nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="#">
      <img src="/images/logo.jpg" width="100" height="30" class="d-inline-block align-top" alt="">
    </a>
  </nav>

  <!-- LOGIN FORM -->
  <div class="container">
    <div class="login-box">
      <div class="row">
        <div class="col-md-6 login-left">
            <h2 align="center"> Login </h2>
          <br>
          <form action="loginreg.php" method="post">
              <!-- errors -->
              <?php 
                include('logerrors.php');
            ?><br>
               <!-- errors -->
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username1" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>

            <p>Forgot your login credentials? <a href="http://www.google.com">Click here</a><p>
            <br><br><br>
            <button type="submit" name="login_b" class="btn btn-primary"> Login </button>
          </form>
        </div>

        <!-- REGISTRATIONFORM -->
        <div class="col-md-6 login-right">
            <h2 align="center"> Register </h2>
            <br>
            <form action="loginreg.php" method="post">
                
                 <!-- errors -->
              <?php 
                include('regerrors.php');
            ?><br>
               <!-- errors -->

              <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name1" class="form-control" required>
              </div>

              <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username1" class="form-control" required>
              </div>

              <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email1" class="form-control" required>
              </div>

              <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password2" class="form-control" required>
              </div>

              <p><input type="checkbox" name="checkterms" value="terms">  Click here to agree to our terms and conditions </p><br>

              <button type="submit" name="register_b" class="btn btn-primary"> Register </button>
            </form>

        </div>
      </div>
    </div>
  </div>



</body>
</html>