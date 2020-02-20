<?php 
    // Test users
    $users = array( null,        "QAM",             // QAM 
                    "Computing", "QAC - Computing", // QAC for Computing
                    "Science",   "QAC - Science",   // QAC for Science
                    "Sports",    "QAC - Sports",    // QAC for Sport
                  );


    require 'database.php';
    $db = new Database();

    
    // If variable exist save else null - null returns all results e.g. for QAM
    $department = ($_REQUEST['user']) ? $_REQUEST['user'] : null;
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
    <!-- Test selectors -->
    <form method="GET">
        <p> User: 
            <select name="user" onchange="this.form.submit()">
                <?php
                    for ($i = 0; $i < count($users); $i++) {
                        if ($users[$i] == $_GET['user']) {
                            echo "<option value='$users[$i]' selected>";
                                $i++;
                                echo $users[$i] ;
                            echo "</option>";
                        }
                        else {
                            echo "<option value='$users[$i]'>";
                                $i++;
                                echo $users[$i] ;
                            echo "</option>";
                        }
                    }
                ?>
            </select>
        </p>
    </form>
    
    
    
    <h1> Statistics </h1>

    <!-- Tab list -->
    <div class = "tab">
        <button class = "links" onclick = "displayTab(event, 'number')" id = defaultOpen> Ideas per Department </button>
        <button class = "links" onclick = "displayTab(event, 'percent')"> Percentage per Department </button>
        <button class = "links" onclick = "displayTab(event, 'contributor')"> Contributors per Department </button>
    </div>


    <!-- Number of ideas per departent -->
    <div id = "number" class = "content">
        <?php 
            // Loop through all ideas
            foreach ($db->getDepartmentIdeas($department) as $idea) {

                // If IdeaCount returns a value, save value or set as zero 
                $ideaCount = ($idea->IdeaCount) ? $idea->IdeaCount : 0;

                // Display results
                echo "<p> <b> Department: </b> " . $idea->Name . " </p>
                <p> <b> No. of Ideas: </b> " . $ideaCount . " </p> <br>";
            }
        ?>
    </div>


    <!-- Percentage of ideas per departent -->
    <div id = "percent" class = "content">
        <?php 
            // Loop through all ideas
            foreach ($db->getPercentageIdeas($department, $forums) as $idea) {

                // If IdeaPercent returns a value, save value or set as zero 
                $ideaPercent = ($idea->IdeaPercent) ? $idea->IdeaPercent : 0;

                // Display results
                echo "<p> <b> Department: </b> " . $idea->Name . " </p>
                <p> <b> Ideas Percent: </b> " . number_format($ideaPercent, 2) . "% </p> <br>";
            }
        ?>
    </div>


    <!-- Number of contributors per department -->
    <div id = "contributor" class = "content">
        <?php 
            // Loop through all ideas
            foreach ($db->getDepartmentContributors($department) as $idea) {

                // If UserCount returns a value, save value or set as zero 
                $userCount = ($idea->UserCount) ? $idea->UserCount : 0;

                // Display results
                echo "<p> <b> Department: </b> " . $idea->Name . " </p>
                <p> <b> Contributors: </b> " . $userCount . " </p> <br>";
            }
        ?>
    </div>



    <h1> Exception Reports </h1>

    <!-- Tab list -->
    <div class = "tab">
        <button class = "links" onclick = "displayTab(event, 'noComment')"> Ideas Without Comments </button>
        <button class = "links" onclick = "displayTab(event, 'anonymousIdeas')"> Anonymous Ideas </button>
        <button class = "links" onclick = "displayTab(event, 'anonymousComments')"> Anonymous Comments </button>
    </div>


    <!-- Ideas without a comment -->
    <div id = "noComment" class = "content">
        <?php 
            // If ideas are found
            if ($ideaArr = $db->getIdeasWithNoComments($department)) {

                // Loop through all ideas
                foreach ($ideaArr as $idea) {

                    // Date format
                    $date = ((new DateTime($idea->DatePosted))->format('jS M Y H:m'));

                    // Display results
                    echo "<p> <b> Idea Posted By: </b> " . $idea->UserName . " </p>
                    <p> <b> Ideas Title: </b> " . $idea->Title . " </p>
                    <p> <b> Ideas Posted: </b> " . $date . " </p> <br>";
                }
            }
            else {
                echo "<p> No ideas found </p>";
            }
        ?>
    </div>


    <!-- Anonymously posted ideas -->
    <div id = "anonymousIdeas" class = "content">
        <?php 
            // If ideas are found
            if ($ideaArr = $db->getAnonymousIdeas($department)) { 

                // Loop through all ideas
                foreach ($ideaArr as $idea) { 

                    // If removed is true
                    $removed = ($idea->Removed) ? 'true' : 'false';

                    // Date format
                    $date = ((new DateTime($idea->DatePosted))->format('jS M Y H:m'));

                    // Display results
                    echo "<p> <b> Idea Posted By: </b> " . $idea->UserName . " </p>
                    <p> <b> Ideas Title: </b> " . $idea->Title . " </p>
                    <p> <b> Ideas Posted: </b> " . $date . " </p> 
                    <p> <b> No. of Views: </b> " . $idea->ViewCounter . " </p> 
                    <p> <b> Deleted: </b> " . $removed . " </p> <br>";

                    $idea->IdeaText; // Other variable
                }
            }
            else {
                echo "<p> No ideas found </p>";
            }
        ?>
    </div>


    <!-- Anonymously posted comments -->
    <div id = "anonymousComments" class = "content">
        <?php 
            // If comments are found
            if ($commentArr = $db->getAnonymousComments($department)) {

                // Loop through all comments
                foreach ($commentArr as $comment) {

                    // If removed is true
                    $removed = ($comment->Removed) ? 'true' : 'false';

                    // Date format
                    $date = ((new DateTime($comment->DatePosted))->format('jS M Y H:m'));
                    $ideaDate = ((new DateTime($comment->IdeaDatePosted))->format('jS M Y H:m'));

                    // Display results
                    echo "<p> <b> Comment Posted By: </b> " . $comment->UserName . " </p>
                    <p> <b> Comment Text: </b> " . $comment->CommentText . " </p> 
                    <p> <b> Comment Posted: </b> " . $date . " </p> 
                    <p> <b> Deleted: </b> " . $removed . " </p> 
                    <p> <b> From Idea: </b> " . $comment->IdeaTitle . " </p> <br>";

                    $comment->IdeaDatePosted; // Other variable
                }
            }
            else {
                echo "<p> No comments found </p>";
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
