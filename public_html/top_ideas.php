<?php 
include_once 'nav_bar.php';
session_start(); 

$_SESSION['username'] = 'abc';

// If not logged in
if (!isset($_SESSION['username'])) {
header ('Location: loginreg.php');
}

include_once 'database.php';
$db = new Database();
?>

<HTML>
<head>
<style>
	.filterTab {
		overflow: hidden;
	}

	.filterTab button {
		background-color: inherit;
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 14px 16px;
		transition: 0.3s;
		font-size: 16px;
	}

	.filterTab button:hover {
		background-color: #ddd;
	}

	.filterTab button.active {
		background-color: #ccc;
	}

	.filterContent {
		display: none;
		padding: 6px 12px;
	}
</style>
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

</head>

<body>
    
    <div class = "filterTab">
        <button class = "filterlinks" onclick = "displayFilter(event, 'topIdeas')" id = defaultOpen> Top Rated Ideas </button>
        <button class = "filterlinks" onclick = "displayFilter(event, 'mostViewedIdeas')"> Most Viewed Ideas </button>
        <button class = "filterlinks" onclick = "displayFilter(event, 'recentIdeas')"> Recent Ideas </button>
        <button class = "filterlinks" onclick = "displayFilter(event, 'recentComments')"> Recent Comments </button>
					
    </div>
	
    
    <?php $displayNum = 5; ?>
    
	<div id = "topIdeas" class = "filterContent">
		<h2> TOP RATED IDEAS </h2>
        
        <?php displayIdeas($db->highestRatedIdeas($displayNum)); ?>
	</div>

    
	<div id = "mostViewedIdeas" class = "filterContent">
		<h2> MOST VIEWED IDEAS </h2>
        
        <?php displayIdeas($db->mostViewedIdeas($displayNum)); ?>
	</div>
    

	<div id = "recentIdeas" class = "filterContent">
		<h2> RECENT IDEAS </h2>
        
        <?php displayIdeas($db->latestIdeas($displayNum)); ?>
	</div>
    

	<div id = "recentComments" class = "filterContent">
		<h2> RECENT COMMENTS </h2>

		<?php displayComments($db->latestComments($displayNum)); ?>
	</div>
    
    
    <?php 
        function displayIdeas($ideaList) 
        {
			$num = 0;
            foreach ($ideaList as $idea) {
                echo '<br> <h3> <u> Idea ' . ++$num . ' </u> </h3>
                
                <p> <b> User: </b> ' . $idea->UserName . ' </p>
                <p> <b> Title: </b> ' . $idea->Title . ' </p>
                <p> <b> Text: </b> ' . $idea->IdeaText . ' </p>
                <p> <b> Date Posted: </b> ' . ((new DateTime($idea->DatePosted))->format('jS M Y H:m')) . ' </p>
                <p> <b> Likes: </b> ' . $idea->Likes . ' </p>
                <p> <b> Dislikes: </b> ' . $idea->Dislikes . ' </p> <br>';
            }
        }
        
        
        function displayComments($commentList)
        {
			$num = 0;
            foreach ($commentList as $comment) {
                echo '<br> <h3> <u> Comment ' . ++$num . ' </u> </h3>
                
                <p> <b> User: </b> ' . $comment->UserName . ' </p>
                <p> <b> Comment: </b> ' . $comment->CommentText . ' </p>
                <p> <b> Date Posted: </b> ' . ((new DateTime($comment->DatePosted))->format('jS M Y H:m')) . ' </p>
                <p> <b> From Idea: </b> ' . $comment->IdeaTitle . ' </p>';
                $comment->IdeaDatePosted; // Other variable
            }
        }
    ?>


	<script>
		/* Reference 
		 * All tab code from w3schools
		 * Link: https://www.w3schools.com/howto/howto_js_tabs.asp
		 */
		
		function displayFilter(evt, member) {
			var i, tabcontent, tablinks;
			
			tabcontent = document.getElementsByClassName("filterContent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			
			tablinks = document.getElementsByClassName("filterlinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			
			document.getElementById(member).style.display = "block";
			evt.currentTarget.className += " active";
		}
		

		// Get the element with id = "defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
		
		
		// Clicking add or removed 'selected'
		$('.tablinks').on('click', function() {
			$('.tablinks').removeClass('selected');
			$(this).addClass('selected');
		});
	</script>
</body>
</HTML>
