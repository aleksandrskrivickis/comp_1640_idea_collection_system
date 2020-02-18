<?php
#Include Decision function that checks if user is still logged in and dericts him to log in form, registration or main
?>


<!DOCTYPE html>
<html>
<head>
<title>Forum</title>
    
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
    <h1> General wellbeing forum</h1>
    <br>
    
    <!-- IDEA FORUM --> 
    
    <!-- *****************************************************************************************SUBMIT IDEA/SEARCH/SORT BY ********************************************************************************************** -->
    <form> <!-- form action="" method="post"-->
        
        <div class="container">
            <div class="row justify-content-center">


                <div class="col-4">

                    <div class="container">
                         <!-- button for pop up modal form- code for form is at the end-->    
                        <div class="row">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl" style="background-color: #036DA1; width: 100%">Submit an idea</button> 
                        </div>

						<br>

						<div class="row">
							<form>
								<input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
							</form>
						</div>
						
						<br>
						
						<div class="row">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Most popular</a>
                                        <a class="dropdown-item" href="#">Most recent</a>
                                        <a class="dropdown-item" href="#">Most commented</a>
                                    </div>
                                </div>						
						</div>

                        <br>

                    </div>     
                </div>

                <!-- *************************************************************************************LIST OF IDEAS********************************************************************************************************** -->         
                <!-- use another form if needed form action="" method="post" -->       

                <div class="col-8">

                    <div class="jumbotron">
                        <h3 class="display-9">Title- Le Petit Villageois</h3>
                        <p class="display-9"> Jacques</p>    
                        <p class="lead">Un soir, un petit villageois alla puiser de l’eau dans un vieux puits au cœur de la ville basse. En remontant le seau de bois, il vit quelque chose briller au fond. C’étaient des pièces d'or.</p>

                        <!-- BUTTONS FOR THUMBS UP/D0WN, COMMENT SECTION AND SEE MORE im waiting for further design prototype to see whether example doc should be visible at this stage or later on. --> 

                        <button style="font-size:14px"> 15 <i class="fa fa-thumbs-up"></i></button>
                        <button style="font-size:14px"> 5 <i class="fa fa-thumbs-down"></i></button>    
                        <button style="font-size:14px"> <i class="fa fa-commenting-o"></i></button> 
                        <button style="font-size:14px"> Example paper <i class="fa fa-download"></i></button>  
                        <p class="seemore">See more</p>

                        <!-- COMMENT SECTION -->        
                        <hr class="my-4"> 
                        <h5>StaffName</h5>          
                        <p>Elle court, elle court La maladie d'amour. Elle court, elle court La maladie d'amour. Elle court, elle court La maladie d'amour.</p>


                        <!-- ADD A COMMENT -->

                        <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group">

                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Type here..."></textarea>
                                </div>           

                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-light">Submit Comment</button>
                            </div>        
                        </div>

                    </div>
                </div>  
            </div>
        </div>
    </form>

    <!-- *************************************************************************************** MODAL ************************************************************************************************************************** -->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Idea Submission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form> <!--form action="" method="post"-->
                        <h1> Submit an Idea</h1>
                        <div class="row">
                            <div class="col-6">

                                <div class="row">     
                                    <div class="form-group">
                                        <label for="InputTitle">Idea Title:</label>
                                        <input type="text" class="form-control" id="ideaTitle3">
                                    </div>
                                </div>  
                                
                                <div class="row">   
                                    <p>Description:</p>    
                                    <textarea class="form-control" id="Textarea2" rows="2" placeholder="Type here..."></textarea>     
                                </div>     


                                <div class="row"> <br> </div>
                                <div class="row">  
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input">
                                            </div>
                                        </div>
                                        <p>Submit anonymously</p>
                                    </div>    

                                </div>              
                            </div> <!-- end of first column -->


                            <div class="col-6"> 

                                <div class="row">
                                    <div class="dropdown">
                                        <p> Select a catgeory:</p>
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Category
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">A</a>
                                            <a class="dropdown-item" href="#">B</a>
                                            <a class="dropdown-item" href="#">C</a>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row"> <br> </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">File Upload:</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>

                                </div>

                            </div>
                        </div>  


                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" style="background-color: #036DA1;">Submit</button>
                </div>
            </div>
        </div>
    </div> 
    
    
    
</body>
    
    
</html>



<?php
include_once "./footer.php";
?>

