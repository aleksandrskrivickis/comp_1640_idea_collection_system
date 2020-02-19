<?php 
    require 'database.php';
    $db = new Database();
?>
<HTML>
<head>
<title> Reports </title>

<style>
	.tab {
		overflow: hidden;
	}

	.tab button {
		background-color: inherit;
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 14px 16px;
		transition: 0.3s;
		font-size: 16px;
	}

	.tab button:hover {
		background-color: #ddd;
	}

	.tab button.active {
		background-color: #ccc;
	}

	.content {
		display: none;
		padding: 6px 12px;
	}
</style>    
</head>

<body>
    
    <h1> Statistics </h1>
    
    <div class = "tab">
        <button class = "links" onclick = "displayTab(event, 'number')" id = defaultOpen> Ideas per Department </button>
        <button class = "links" onclick = "displayTab(event, 'percent')"> Percentage per Department </button>
        <button class = "links" onclick = "displayTab(event, 'contributor')"> Contributors per Department </button>
	</div>
    
    
    <div id = "number" class = "content">
		<h2> Number of Ideas made by each Department </h2>
        
        <?php
            foreach ($db->getDepartmentIdeas() as $idea) {

                // If IdeaCount returns a value, save value or set as zero 
                $ideaCount = ($idea->IdeaCount) ? $idea->IdeaCount : 0;

                echo "<p> <b> Department: </b> " . $idea->Name . " </p>
                <p> <b> No. of Ideas: </b> " . $ideaCount . " </p> <br>";
            }
        ?>
	</div>
    
    
    <div id = "percent" class = "content">
    
        <h2> Percentage of Ideas by each Department </h2>

        <?php
            foreach ($db->getPercentageIdeas() as $idea) {

                // If IdeaPercent returns a value, save value or set as zero 
                $ideaPercent = ($idea->IdeaPercent) ? $idea->IdeaPercent : 0;

                echo "<p> <b> Department: </b> " . $idea->Name . " </p>
                <p> <b> Ideas Percent: </b> " . number_format($ideaPercent, 2) . "% </p> <br>";
            }
        ?>
    </div>
    
    
    <div id = "contributor" class = "content">
        <h2> Number of Contributors within each Department </h2>
        
        <?php
            foreach ($db->getDepartmentContributors() as $idea) {

                // If UserCount returns a value, save value or set as zero 
                $userCount = ($idea->UserCount) ? $idea->UserCount : 0;

                echo "<p> <b> Department: </b> " . $idea->Name . " </p>
                <p> <b> Ideas Percent: </b> " . $userCount . " </p> <br>";
            }
        ?>
    </div>
    
    
    
    <h1> Exception Reports </h1>
    
    <div class = "tab">
        <button class = "links" onclick = "displayTab(event, 'noComment')"> Ideas Without Comments </button>
        <button class = "links" onclick = "displayTab(event, 'anonymousIdeas')"> Anonymous Ideas </button>
        <button class = "links" onclick = "displayTab(event, 'anonymousComments')"> Anonymous Comments </button>
	</div>
    
    
    <div id = "noComment" class = "content">
        <h2> Ideas without a Comment </h2>
        
        <?php
            foreach ($db->getIdeasWithNoComments() as $idea) {
                $date = ((new DateTime($idea->DatePosted))->format('jS M Y H:m'));
                
                echo "<p> <b> Idea Posted By: </b> " . $idea->UserName . " </p>
                <p> <b> Ideas Title: </b> " . $idea->Title . " </p>
                <p> <b> Ideas Posted: </b> " . $date . " </p> <br>";
            }
        ?>
    </div>
    
    
    <div id = "anonymousIdeas" class = "content">
        <h2> Anonymous Ideas </h2>
        
        <?php
            foreach ($db->getAnonymousIdeas() as $idea) {
                // If removed is true
                $removed = ($idea->Removed) ? 'true' : 'false';
                
                $date = ((new DateTime($idea->DatePosted))->format('jS M Y H:m'));
                
                echo "<p> <b> Idea Posted By: </b> " . $idea->UserName . " </p>
                <p> <b> Ideas Title: </b> " . $idea->Title . " </p>
                <p> <b> Ideas Posted: </b> " . $date . " </p> 
                <p> <b> No. of Views: </b> " . $idea->ViewCounter . " </p> 
                <p> <b> Deleted: </b> " . $removed . " </p> <br>";
                
                $idea->IdeaText; // Other variable
            }
        ?>
    </div>
    
    
    <div id = "anonymousComments" class = "content">
        <h2> Anonymous Ideas </h2>
        
        <?php
            foreach ($db->getAnonymousComments() as $comment) {
                // If removed is true
                $removed = ($comment->Removed) ? 'true' : 'false';
                
                $date = ((new DateTime($comment->DatePosted))->format('jS M Y H:m'));
                $ideaDate = ((new DateTime($comment->IdeaDatePosted))->format('jS M Y H:m'));
                
                echo "<p> <b> Comment Posted By: </b> " . $comment->UserName . " </p>
                <p> <b> Comment Text: </b> " . $comment->CommentText . " </p> 
                <p> <b> Comment Posted: </b> " . $date . " </p> 
                <p> <b> Deleted: </b> " . $removed . " </p> 
                <p> <b> From Idea: </b> " . $comment->IdeaTitle . " </p> <br>";
                
                $comment->IdeaDatePosted; // Other variable
            }
        ?>
    </div>
    
    
    <script>
        /* Reference 
         * Link: https://www.w3schools.com/howto/howto_js_tabs.asp
         */
        
        function displayTab(evt, member) {
			var i, tabcontent, tablinks;
			
			tabcontent = document.getElementsByClassName("content");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			
			tablinks = document.getElementsByClassName("links");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			
			document.getElementById(member).style.display = "block";
			evt.currentTarget.className += " active";
        }
        

		// Get the element with id = "defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        
        
        // Clicking add or removed 'selected'
        $('.links').on('click', function() {
    		$('.tablinks').removeClass('selected');
    		$(this).addClass('selected');
		});
        
        
	</script>
</body>
</HTML>