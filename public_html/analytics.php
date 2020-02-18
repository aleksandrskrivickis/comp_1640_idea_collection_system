<?php
#Include Decision function that checks if user is still logged in and dericts him to log in form, registration or main
?>

#Adding some rtest changes

<html>   
<head>
<title>Analytics</title>

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
     <li class="nav-item active">
        <button class="btn btn-light my-2 my-sm-0" style="margin:40px;" type="submit">QAM</button>
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
      <br><br>
      
      <h1>Forum Analytics</h1>
      
      <br><br>     
 
      <div class="centertable" align="center" >
    <table id="q-graph">
<caption>Summary of Total ideas</caption>
<thead>
<tr>
<th></th>
<th> <div class="dropdown" >
    <button class="btn btn-primary dropdown-toggle"  style="background:#036DA1;" type="button" data-toggle="dropdown">Sort by:
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
  </div></th>

</tr>
</thead>
<tbody>
<tr class="qtr" id="q1">
<th scope="row">Q1</th>
<td class="sent bar" style="height: 111px;"><p>$18,450.00</p></td>
<td class="paid bar" style="height: 99px;"><p>$16,500.00</p></td>
</tr>
<tr class="qtr" id="q2">
<th scope="row">Q2</th>
<td class="sent bar" style="height: 206px;"><p>$34,340.72</p></td>
<td class="paid bar" style="height: 194px;"><p>$32,340.72</p></td>
</tr>
<tr class="qtr" id="q3">
<th scope="row">Q3</th>
<td class="sent bar" style="height: 259px;"><p>$43,145.52</p></td>
<td class="paid bar" style="height: 193px;"><p>$32,225.52</p></td>
</tr>
<tr class="qtr" id="q4">
<th scope="row">Q4</th>
<td class="sent bar" style="height: 110px;"><p>$18,415.96</p></td>
<td class="paid bar" style="height: 195px;"><p>$32,425.00</p></td>
</tr>
</tbody>
</table>

<div id="ticks">
<div class="tick" style="height: 59px;"><p>$50,000</p></div>
<div class="tick" style="height: 59px;"><p>$40,000</p></div>
<div class="tick" style="height: 59px;"><p>$30,000</p></div>
<div class="tick" style="height: 59px;"><p>$20,000</p></div>
<div class="tick" style="height: 59px;"><p>$10,000</p></div>
</div>

    <br><br>
    
    <table id="q-graph">
<caption>Summary of ideas per department</caption>
<thead>
<tr>
<th></th>
<th> <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" style="background:#036DA1;" type="button" data-toggle="dropdown">Sort by:
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
  </div></th>

</tr>
</thead>
<tbody>
<tr class="qtr" id="q1">
<th scope="row">Q1</th>
<td class="sent bar" style="height: 111px;"><p>$18,450.00</p></td>
<td class="paid bar" style="height: 99px;"><p>$16,500.00</p></td>
</tr>
<tr class="qtr" id="q2">
<th scope="row">Q2</th>
<td class="sent bar" style="height: 206px;"><p>$34,340.72</p></td>
<td class="paid bar" style="height: 194px;"><p>$32,340.72</p></td>
</tr>
<tr class="qtr" id="q3">
<th scope="row">Q3</th>
<td class="sent bar" style="height: 259px;"><p>$43,145.52</p></td>
<td class="paid bar" style="height: 193px;"><p>$32,225.52</p></td>
</tr>
<tr class="qtr" id="q4">
<th scope="row">Q4</th>
<td class="sent bar" style="height: 110px;"><p>$18,415.96</p></td>
<td class="paid bar" style="height: 195px;"><p>$32,425.00</p></td>
</tr>
</tbody>
</table>

<div id="ticks">
<div class="tick" style="height: 59px;"><p>$50,000</p></div>
<div class="tick" style="height: 59px;"><p>$40,000</p></div>
<div class="tick" style="height: 59px;"><p>$30,000</p></div>
<div class="tick" style="height: 59px;"><p>$20,000</p></div>
<div class="tick" style="height: 59px;"><p>$10,000</p></div>
</div>    
      
      
       <br><br>
    
    <table id="q-graph">
<caption>Summary of total contributors per department</caption>
<thead>
<tr>
<th></th>
<th> <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" style="background:#036DA1;" type="button" data-toggle="dropdown">Sort by:
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
  </div></th>

</tr>
</thead>
<tbody>
<tr class="qtr" id="q1">
<th scope="row">Q1</th>
<td class="sent bar" style="height: 111px;"><p>$18,450.00</p></td>
<td class="paid bar" style="height: 99px;"><p>$16,500.00</p></td>
</tr>
<tr class="qtr" id="q2">
<th scope="row">Q2</th>
<td class="sent bar" style="height: 206px;"><p>$34,340.72</p></td>
<td class="paid bar" style="height: 194px;"><p>$32,340.72</p></td>
</tr>
<tr class="qtr" id="q3">
<th scope="row">Q3</th>
<td class="sent bar" style="height: 259px;"><p>$43,145.52</p></td>
<td class="paid bar" style="height: 193px;"><p>$32,225.52</p></td>
</tr>
<tr class="qtr" id="q4">
<th scope="row">Q4</th>
<td class="sent bar" style="height: 110px;"><p>$18,415.96</p></td>
<td class="paid bar" style="height: 195px;"><p>$32,425.00</p></td>
</tr>
</tbody>
</table>

<div id="ticks">
<div class="tick" style="height: 59px;"><p>$50,000</p></div>
<div class="tick" style="height: 59px;"><p>$40,000</p></div>
<div class="tick" style="height: 59px;"><p>$30,000</p></div>
<div class="tick" style="height: 59px;"><p>$20,000</p></div>
<div class="tick" style="height: 59px;"><p>$10,000</p></div>
</div>    
          </div>
    </body>
</html>


<?php
include_once "./footer.php";
?>

