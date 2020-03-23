<?php
session_start();
include_once 'nav_bar.php';
include_once 'database.php';

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

$funObj = new Database();

$PAGINATION_STEP = 5;

if ($_GET['pagination_step_from'] + $_GET['pagination_step_to'] > 0){
	$pagination_step_from = $_GET['pagination_step_from'];
	$pagination_step_to = $_GET['pagination_step_to'];
}else{
	$pagination_step_from = 0;
	$pagination_step_to = $PAGINATION_STEP;
}

?>
<html lang="en-GB">
<!DOCTYPE html>
<html>
<head>
<title>Forum Discussion</title>

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
    <style>
    
        .display-4 {
            
            font-size: 50px;
        }
    </style>
</head>
<?php

$idea_count = $funObj -> getIdeaCount();
//Please extend getIdeasWithPagination() and update below line with one more parameter: $p_forum_id
$result = $funObj -> getIdeasWithPagination($pagination_step_from, $pagination_step_to);


	
	
	
    foreach($result as $row) //loops through the SQL query
    {
        if ($row['Anonymous'] == false) //if the value of Anonymous is false, the username value in the array gets set to the user's username
        {
             $ideas[] = array('id' => $row['IdeaID'], 'title' => $row['Title'], 'ideatext' => $row['IdeaText'], 'dateposted' => $row['DatePosted'], 'username' => $row['UserName'],'likes' => $row['Likes'], 'dislikes' => $row['Dislikes'], 'commentCount' => $row['commentCount']); 
        }
            
        else //if the value is true, then it gets hardcoded to 'anonymous'
        {
             $ideas[] = array('id' => $row['IdeaID'], 'title' => $row['Title'], 'ideatext' => $row['IdeaText'], 'dateposted' => $row['DatePosted'], 'username' => 'Anonymous', 'likes' => $row['Likes'], 'dislikes' => $row['Dislikes'], 'Anonymous', 'commentCount' => $row['commentCount']); 
        }
        try 
        {
          $displayComment = $funObj-> getCommentsForJake($row['IdeaID']);  
        }
        
        catch (PDOException $e)//opens error page if query fails
        {
            $output = 'Error fetching ideas:' .  $e->getMessage(); 
            echo $output;
            exit();
        }   
        foreach($displayComment as $comment)
        {
           if ($comment['Anonymous'] == false) 
           {
               $com[] = array('id' => $comment['CommentID'], 'iid' => $comment['IdeaID'], 'username' => $comment['UserName'], 'commenttext' => $comment['CommentText'], 'dateposted' => $comment['DatePosted']);
           }
            else
            {
               $com[] = array('id' => $comment['CommentID'], 'iid' => $comment['IdeaID'], 'username' => 'Anonymous', 'commenttext' => $comment['CommentText'], 'dateposted' => $comment['DatePosted']); 
            }
        }
    }
    
?>
<body>
<!--NAVIGATION BAR-->
<?php 
//$username = "NumberOne"; //For test purposes

if(isset($_POST['action']) and $_POST['action'] == 'likes')
{
	$funObj->setThumbsUpDownForJake($_POST['id'], $username, 1);
	header("Refresh:1");
}

if(isset($_POST['action']) and $_POST['action'] == 'dislikes')
{
	$funObj->setThumbsUpDownForJake($_POST['id'], $username, 0);
	header("Refresh:1");
}

 if(isset($_POST['action']) and $_POST['action'] == 'comments')
{
	$funObj->insertCommentForJake($_POST['id'], $username, $_POST['commenttext']);
	header("Refresh:0");
}

?>
    
<h1><!--?php echo $forumname-->Temp</h1>

<?php echo $username; ?>
<div><!-- need an area to put search, sorting etc --></div>
    <?php foreach($ideas as $idea):
    ?> <!--Another loop, this time echoing the data within html tags-->
 <form form action="?" method="post">
    <div class="Jumbotroncentral">
        
    <div class="jumbotron">
    <input type="hidden" name="id" value="<?php echo $idea['id']; ?>">
    <h3 class="display-9"><?php echo $idea['title']; ?></h3>
    <p class="display-9"> <?php echo $idea['username']; ?></p>    
    <p class="lead"><?php echo $idea['ideatext']; ?></p>
  <button style="font-size:14px" name="action" value="likes"> <?php echo $idea['likes']; ?> <i class="fa fa-thumbs-up"></i></button>
  <button style="font-size:14px" name="action" value="dislikes"><?php echo $idea['dislikes']; ?> <i class="fa fa-thumbs-down"></i></button>    
  <button style="font-size:14px"> <?php echo $idea['commentCount']; ?> <i class="fa fa-commenting-o"></i></button> 
  <button style="font-size:14px"> Example paper <i class="fa fa-download"></i></button>  
     
        
    <!-- COMMENT SECTION -->
        
<?php if ($idea['commentCount'] == 0){ ?>
    <hr class="my-4"> 
    <p>No comments made</p>
<?php }
else
{?>
    <?php foreach($com as $comment): 
        if ($idea['id'] == $comment['iid'])
        {
        ?>
   <hr class="my-4"> 
   <h5><?php echo $comment['username']; ?></h5>          
   <p><?php echo $comment['commenttext'];?></p>
        
        
<?php } endforeach; 
}
 ?>

    <!-- ADD A COMMENT -->
    <hr class="my-4">
    <div class="row">
    <div class="col-sm-9">
    <div class="form-group">
  
    <textarea class="form-control" id="exampleFormControlTextarea1" name="commenttext" rows="2" placeholder="Type here..."></textarea>
    </div>           
              
    </div>
    <div class="col-3">
    <button class="btn btn-light" name="action" value="comments">Submit Comment</button>
    </div>        
  </div>
       
</div>
</div>  
</form>
    <?php 
	
	endforeach; 
	
$counter = 0;
	
echo "Pages: ";
	for ($h = 0; $h < $idea_count; $h += $PAGINATION_STEP) {
		$counter += 1;
		$pagination_step_to = $h + $PAGINATION_STEP;
		echo "<a href='view_ideas.php?pagination_step_from=$h&pagination_step_to=$pagination_step_to'>$counter</a>";
	}	
	
	?>

    
</body>
</html>
