<?php include_once 'database.php'?>
<html lang="en-GB">
<!DOCTYPE html>
<head>
    <title>CAD View Ideas</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="" rel="stylesheet" /> <!-- Insert the stylesheet -->
</head>
<?php
    try //server attempts to run query
    {
        $result = $pdo->query('SELECT I.IdeaID, I.Title, I.IdeaText, I.Anonymous, I.DatePosted, U.UserName FROM Idea AS I JOIN User AS U ON I.UserID = U.UserID LIMIT 10'); //this would be replaced with the relevant class in database.php
    }
    catch (PDOException $e)//opens error page if query fails
    {
        $output = 'Error fetching ideas:' .  $e->getMessage();
        include 'error.php';
        exit();
    }
    foreach($result as $row) //loops through the SQL query
    {
        if ($row['Anonymous'] == false) //if the value of Anonymous is false, the username value in the array gets set to the user's username
        {
             $ideas[] = array('id' => $row['IdeaID'], 'title' => $row['Title'], 'ideatext' => $row['IdeaText'], 'dateposted' => $row['DatePosted'], 'username' => $row['UserName']); 
        }
            
        else //if the value is true, then it gets hardcoded to 'anonymous'
        {
             $ideas[] = array('id' => $row['IdeaID'], 'title' => $row['Title'], 'ideatext' => $row['IdeaText'], 'dateposted' => $row['DatePosted'], 'username' => 'anonymous'); 
        }         
              
    }
?>
<body>
<!--A container for all of the ideas-->
    <div class="container">
    <?php foreach($ideas as $idea): ?> <!--Another loop, this time echoing the data within html tags-->
    <div class="ideacont">
        <h1 class="heading">
        <?php echo $idea['title']; ?> 
        </h1>
        
        <h4 class="userID">Posted by: <?php echo $idea['username']; ?> </h4>
        
        <p class="txtcontent"><?php echo $idea['ideatext']; ?> </p>
        
        <h4 class="postDate"><?php echo $idea['dateposted']; ?> </h4>
     </div>   
        <?php endforeach; ?>
        
    </div>
    
</body>
</html>

<?php
include_once "./footer.php";
?>

