<?php
    try
{
    $pdo = new PDO('mysql:host=mysql.cms.gre.ac.uk; dbname=mdb_st2645h', 'st2645h', 'Enterprise94');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
}
catch(PDOException $e)
{
    $output = 'Unable to connect to the database:' . $e->getMessage();
    //$output = 'Unable to connect to the database:';
    include 'error.html.php';
    exit();
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

    try //server attempts to run query
    {
        $result = $pdo->query('SELECT I.IdeaID, I.Title, I.IdeaText, I.Anonymous, I.DatePosted, U.UserName, 
        (SELECT COUNT(ThumbUp) 
        FROM Rate ra 
        WHERE ra.IdeaID = r.IdeaID AND ra.ThumbUp = 1) 
        AS Likes, 
        (SELECT COUNT(ThumbDown) 
        FROM Rate ra 
        WHERE ra.IdeaID = r.IdeaID AND ra.ThumbDown = 1) 
        AS Dislikes,
        (CASE WHEN (SELECT COUNT(CommentID) FROM Comment ci WHERE ci.IdeaID = c.IdeaID GROUP BY I.IdeaID) IS NULL THEN "0" ELSE (SELECT COUNT(CommentID) FROM Comment ci WHERE ci.IdeaID = c.IdeaID GROUP BY I.IdeaID) END) AS commentCount
        FROM Idea AS I
        INNER JOIN User AS U ON I.UserID = U.UserID
        INNER JOIN Rate r ON I.IdeaID = r.IdeaID
        LEFT JOIN Comment c ON I.IdeaID = c.IdeaID
        GROUP BY I.IdeaID LIMIT 10'); //this would be replaced with the relevant class in database.php
    }
    catch (PDOException $e)//opens error page if query fails
    {
        $output = 'Error fetching ideas:' .  $e->getMessage(); 
        echo $output;
        exit();
    }
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
          $displayComment = $pdo->query('SELECT C.CommentID, C.IdeaID, U.UserName, C.CommentText, C.Anonymous, C.DatePosted
          FROM Comment C
          JOIN User as U ON U.UserID = C.UserID
          JOIN Idea as I ON I.IdeaID = C.IdeaID
          WHERE C.IdeaID = ' . $row['IdeaID']);  
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
<?php include 'navbar.php';
    
    try
    {
        $userid = $pdo->query('SELECT r.UserID FROM Rate r LEFT JOIN User u ON r.UserID = u.UserID WHERE u.UserName = "' . $username . '"');
    }
    catch (PDOException $e)
    {
        $output = 'Error adding a like' . $e;
        echo $output;
        exit();
    }
    foreach ($userid as $row)
    {
        $uid[] = array('id' => $row['UserID']);
    }
    foreach ($uid as $id)
    {
        $usID = $id['id'];
    }
    
    if(isset($_POST['action']) and $_POST['action'] == 'likes')
    {
        try 
    {
        $sql = 'INSERT INTO Rate SET
            IdeaID = :Ideaid,
            UserID = :Userid,
            ThumbUp = :Thumbup,
            ThumbDown = :Thumbdown';
        $s = $pdo->prepare($sql);
        $s->bindValue(':Ideaid', $_POST['id']);
        $s->bindValue(':Userid', $usID);
        $s->bindValue(':Thumbup', 1);
        $s->bindValue(':Thumbdown', 0);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $output = 'Error adding a like' . $e;
        echo $output;
        exit();
    }
        header("Refresh:0");
    }
    
    if(isset($_POST['action']) and $_POST['action'] == 'dislikes')
    {
        try 
    {
        $sql = 'INSERT INTO Rate SET
            IdeaID = :Ideaid,
            UserID = :Userid,
            ThumbUp = :Thumbup,
            ThumbDown = :Thumbdown';
        $s = $pdo->prepare($sql);
        $s->bindValue(':Ideaid', $_POST['id']);
        $s->bindValue(':Userid', $usID);
        $s->bindValue(':Thumbup', 0);
        $s->bindValue(':Thumbdown', 1);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $output = 'Error adding a like' . $e;
        echo $output;
        exit();
    }
        header("Refresh:0");
    }
    
     if(isset($_POST['action']) and $_POST['action'] == 'comments')
    {
        try 
    {
        $sql = 'INSERT INTO Comment SET
            IdeaID = :Ideaid,
            UserID = :Userid,
            CommentText = :Commenttext,
            Anonymous = :Anonymous,
            DatePosted = CURDATE(),
            Removed = :Removed';
            
        $s = $pdo->prepare($sql);
        $s->bindValue(':Ideaid', $_POST['id']);
        $s->bindValue(':Userid', $usID);
        $s->bindValue(':Commenttext', $_POST['commenttext']);
        $s->bindValue(':Anonymous', 0);
        $s->bindValue(':Removed', 0);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $output = 'Error adding a comment' . $e;
        echo $output;
        exit();
    }
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
        
        
<?php } endforeach; } ?>

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
    <?php endforeach; ?>

    
</body>
</html>
