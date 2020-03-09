<?php
    require 'database.php';

    $test = new Testing();
    
    //$test->test_createUser();
    //$test->test_usernameTaken();
    //$test->test_checkLogin();
    //$test->test_lastLoggedIn();
    //$test->test_setLastLoggedIn();

    //$test->test_getAllDepartments();
    //$test->test_getDepartment();
    //$test->test_getAllRoles();
    //$test->test_getRole();
    
    //$test->test_getAllForums();
    //$test->test_createForum();
	//$test->test_deleteForum();
	
	//$test->test_getForum();
	//$test->test_getAllIdeas();
	//$test->test_createIdea();
	//$test->test_deleteIdea();
    //$test->test_getCoordinatorEmail();
	//$test->test_increaseViewCount();
	
	//$test->test_getIdea();
	//$test->test_getComments();
	//$test->test_createComment();
	//$test->test_deleteComment();
	//$test->test_getIdeaDocuments();
	//$test->test_uploadDocument();
	//$test->test_downloadDocument();
	//$test->test_getUserEmail();
	
	//$test->test_liked();
	//$test->test_disliked();
	//$test->test_getNumLikes();
	//$test->test_getNumDislikes();
	//$test->test_setLike();
	//$test->test_setDislike();
	//$test->test_unsetLike();
	//$test->test_unsetDislike();
	
	//$test->test_getAllCategories();
	//$test->test_getCategory();
	//$test->test_createCategory();
	//$test->test_deleteCategory();
	//$test->test_SetIdeaCategory();
	
	//$test->test_highestRatedIdeas();
	//$test->test_mostViewedIdeas();
	//$test->test_lastestIdeas();
	//$test->test_lastestComments();
	
	//$test->test_getDepartmentIdeas();
	/*$test->test_getDepartmentContributors();*/
	
	//$test->test_isAdmin();
	//$test->test_editUser();
	//$test->test_editAccount();
	//$test->test_setPassword();
	//$test->test_banUser();
	//$test->test_deleteUser();
	//$test->test_recoverUser();
	//$test->test_editClosureDate();
	//$test->test_editFinalClosureDate();
	
	//$test->test_downloadForum();
	
    
    class Testing 
    {
        private $db;
        
        public function __construct() 
        {
            $this->db = new Database();   
        }
        
        
        /* LOGIN / REGISTRATION */
        
        public function test_createUser() 
        {
            echo '<h3> Create User </h3>';
			
			echo '<br>Test Method\'s commented out';
            /*
            $this->db->createUser("B Man", "I can fly", "bumbles@mail.com", "Quality Assurance Manager", "Sports");   // PASSED - Expect: Insert
            $this->db->createUser("Mr Bump", "Oww", "mrBump@mail.com", "Quality Assurance Coordinator", "Computing"); // PASSED - Expect: Insert
            $this->db->createUser("Mr Bump1", "Oww1", "mrBump@mail.com", "Acadmic", "Sport");                         // PASSED - Expect: Insert
            $this->db->createUser("Mr Burns", "Excelent", "IamSoRich@mail.com", "Support", "Science");                // PASSED - Expect: Insert
            $this->db->createUser("Mr Bump", "Oww", "mrBump@mail.com", "Support1", "Computing1");                     // PASSED - Expect: Fail - Role & Department error
            $this->db->createUser("Mr Bump", "Oww", "mrBump@mail", "Support", "Computing");                           // PASSED - Expect: Fail - Email error
            */
        }
        
        
        public function test_usernameTaken() 
        {
            echo '<h3> Username Taken </h3>';
			
			$user = 'NumberOne';
			
            var_dump($this->db->usernameTaken('Satou Kazuma'));   // PASSED - Expect: True - Taken
            var_dump($this->db->usernameTaken(' Satou Kazuma ')); // PASSED - Expect: True - Taken
            var_dump($this->db->usernameTaken('Satou Kazuma1'));  // PASSED - Expect: False - Available
            var_dump($this->db->usernameTaken(''));  			  // PASSED - Expect: False - Available
            var_dump($this->db->usernameTaken($user));  		  // PASSED - Expect: True - Taken
            var_dump($this->db->usernameTaken('Kazuma'));  		  // PASSED - Expect: False - Available
            var_dump($this->db->usernameTaken('Kazuma££'));  	  // PASSED - Expect: Fail - Username error
        }
		
        
        public function test_checkLogin() 
        {
            echo '<h3> Check Login </h3>';
			
			var_dump($this->db->checkLogin("Satou Kazuma", "Steal"));     // PASSED - Expect: True
            var_dump($this->db->checkLogin("Satou Kazuma!", "Steal!"));   // PASSED - Expect: False - Username & Password error
            var_dump($this->db->checkLogin(" Satou Kazuma ", " Steal ")); // PASSED - Expect: True
            var_dump($this->db->checkLogin(1, "Steal"));                  // PASSED - Expect: False - Doesn't run
        }
        
        
        public function test_lastLoggedIn()
        {
            echo '<h3> Get Last Login </h3>';
            
            var_dump($this->db->getLastLogin("Satou Kazuma"));
            var_dump($this->db->getLastLogin("NumberOne"));
        }
        
        
        public function test_setLastLoggedIn() 
        {
            echo '<h3> Set Last Login </h3>';
            
            var_dump($this->db->setLastLogin("Satou Kazuma"));
        }
            
        
        
        /* JOB */
        
        public function test_getAllDepartments() 
        {
            echo '<h3> Get All Department </h3>';
			
			var_dump($this->db->getAllDepartments()); // PASSED - Expect: Array of 3, each contain name and description
        }
        
        
        public function test_getDepartment() 
        {
            echo '<h3> Get Department </h3>';
			
			var_dump($this->db->getDepartment("NumberOne"));     // PASSED - Expect: Return none
            var_dump($this->db->getDepartment("ChickenLittle")); // PASSED - Expect: Return Computing
            var_dump($this->db->getDepartment("Satou Kazuma"));  // PASSED - Expect: Return Science
            var_dump($this->db->getDepartment("Jesus"));         // PASSED - Expect: Return Sport
            
            var_dump($this->db->getDepartment(""));              // PASSED - Expect: Return null
            var_dump($this->db->getDepartment("@"));             // PASSED - Expect: Return null & error message
        }
        
        
        public function test_getAllRoles()
        {
            echo '<h3> Get All Roles </h3>';
			
			var_dump($this->db->getAllRoles()); // PASSED - Expect: Return all four roles
        }
        
        
        public function test_getRole() 
        {
            echo '<h3> Get Roles </h3>';
			
			var_dump($this->db->getRole("NumberOne"));     // PASSED - Expect: Return QAM
            var_dump($this->db->getRole('ChickenLittle')); // PASSED - Expect: Return QAC 
            var_dump($this->db->getRole('Satou Kazuma'));  // PASSED - Expect: Return Academic Staff
            var_dump($this->db->getRole('Jesus'));         // PASSED - Expect: Return Support Staff
            
            var_dump($this->db->getRole(''));              // PASSED - Expect: Return null
            var_dump($this->db->getRole('%'));             // PASSED - Expect: Return null & error message
        }
        
        
        
        /* FORUM SELECTION */
        
        public function test_getAllForums() 
        {
            echo '<h3> Get All Forums </h3>';
			
			var_dump($this->db->getAllForums()); // PASSED - Expect: Return all forums
        }
        
        
        public function test_createForum()
        {
            echo '<h3> Create Forum </h3>';
			
			echo "<br>test_createForum is commented out";
            /*
            $this->db->createForum('Computing', 'Computers and Stuff', '2020-03-03 10:30');      // PASSED - Expect: Insert
            $this->db->createForum('Computing1', 'NULL$', 'a2020-03-03 10:30 a');                // PASSED - Expect: Fail - Name, desc and closureDate error message 
            */
        }
		
		
		public function test_deleteForum() 
		{
			echo '<h3> Delete Forum </h3>';
			
			$this->db->deleteForum("Food"); // PASSED
		}
        
        
        
        /* FORUM BOARD */
		
        public function test_getForum()
		{
			echo '<h3> Get Forum </h3>';
			
			var_dump($this->db->getForum("Improvements")); // PASSED - Expect: Return Improvements
			var_dump($this->db->getForum("Computing"));	   // PASSED - Expect: Return Computing
			var_dump($this->db->getForum("Nothing"));	   // PASSED - Expect: Return null
			var_dump($this->db->getForum("Nothing^&*"));   // PASSED - Expect: Return null & error message
		}
		
		
		public function test_getAllIdeas() 
		{
			echo '<h3> Get All Ideas </h3>';
			
			var_dump($this->db->getAllIdeas("Improvements", 1, 2)); // PASSED - Expect: Return two ideas
			var_dump($this->db->getAllIdeas("Improvements", 1, 5)); // PASSED - Expect: Return two ideas
			var_dump($this->db->getAllIdeas("Improvements", 2, 5)); // PASSED - Expect: Return null
			var_dump($this->db->getAllIdeas("Improvements", 1, 0)); // PASSED - Expect: Return null
			var_dump($this->db->getAllIdeas("abcd", 1, 5));			// PASSED - Expect: Return null
			
			var_dump($this->db->getAllIdeas("abcd***", 1, 5)); 		// PASSED - Expect: Forum error message
		}
		
		
		public function test_createIdea()
		{
			echo '<h3> Create Idea </h3>';
			
			echo '<br>test_createIdea has been commented out';
			/*
			$this->db->createIdea("We need more places to slack off to", "Advanced resting locations", "Improvements", "Hasebe", true);  // PASSED - Expert: Insert
			$this->db->createIdea("We need more places to slack off to", "Advanced resting locations", "Improvements", "Hasebe", false); // PASSED - Expert: Insert
			$this->db->createIdea("We need more places to slack off to", "Advanced resting locations", "Improvements", "Haseb3", true);  // PASSED - Expect: Insert
			$this->db->createIdea("1234abc£$%", "asdf0987)(*&", "Improvements11", "Hasebe12$", false); 									 // PASSED - Expect: Error messages
			*/
		}
		
		
		public function test_deleteIdea() 
		{
			echo '<h3> Delete Idea </h3>';
			
			$this->db->deleteIdea('It is the end of the world', '2020-02-13 02:54:49'); // PASSED
		}
		
		
		public function test_getCoordinatorEmail()
		{
			echo '<h3> Get Coordinator Email </h3>';
			
			var_dump($this->db->getCoordinatorEmail("Computing")); // PASSED - Expect: Return computing QAC
			var_dump($this->db->getCoordinatorEmail("Science"));   // PASSED - Expect: Return science QAC
			var_dump($this->db->getCoordinatorEmail("Sports"));    // PASSED - Expect: Return sports QAC
			var_dump($this->db->getCoordinatorEmail("123"));       // PASSED - Expect: Return null and error message
		}
		
		
		public function test_increaseViewCount()
		{
			echo '<h3> Increate View Count </h3>';
			
			$this->db->increaseViewCount("Unwanted Item", "2020-02-02 21:20:00"); 	// PASSED - Expect: Increase count
			$this->db->increaseViewCount("Unwanted Item11", "2020-02-02 21:20:00"); // PASSED - Expect: Nothing
			$this->db->increaseViewCount("Unwanted", "2020-02-02 21:20:00");		// PASSED - Expect: Nothing
		}
		
		
		
		/* IDEA PAGE */
		
		public function test_getIdea()
		{
			echo '<h3> Get Idea </h3>';
			
			var_dump($this->db->getIdea("Unwanted Item", "2020-02-02 21:20:00")); // PASSED - Expect: Return unwanted item
			var_dump($this->db->getIdea("", "2020-02-02 21:20:00"));			  // PASSED - Expect: Return null
		}
		
		
		public function test_getComments() 
		{
			echo '<h3> Get Comments </h3>';
			
			var_dump($this->db->getComments("Unwanted Item", "2020-02-02 21:20:00")); 		// PASSED - Expect: Return one comment
			var_dump($this->db->getComments("Unwanted Item", "2020-02-02 21:20:00", null)); // PASSED - Expect: Return one comment
			var_dump($this->db->getComments("Unwanted Item", "2020-02-02 21:20:00", 5)); 	// PASSED - Expect: Return one comment
			var_dump($this->db->getComments("Unwanted Item", "2020-02-02 21:20:00", 1)); 	// PASSED - Expect: Return one comment
			var_dump($this->db->getComments("Unwanted Item", "2020-02-02 21:20:00", 0)); 	// PASSED - Expect: Return null
			var_dump($this->db->getComments("", "2020-02-02 21:20:00", 5)); 				// PASSED - Expect: Return null
		}
		
		
		public function test_createComment() 
		{
			echo '<h3> Create Comment </h3>';
			
			echo "<br>test_createComment has been commented out";
			/*
			$this->db->createComment("Excellent idea", "Pool Table", "2020-02-01 12:00:00", "Pikachu", false); // PASSED - Expect: Create comment
			$this->db->createComment("I would like that", "Pool Table", "2020-02-01 12:00:00", "Frank", true); // PASSED - Expect: Create comment
			$this->db->createComment("I would like that", "Pool Table", "2020-02-01 12:00:00", "", false); 	   // PASSED - Expect: Error message
			*/
		}
		
		
		public function test_deleteComment() 
		{
			echo '<h3> Delete Comment </h3>';
			
			$this->db->deleteComment("I would like that", "2020-02-13 16:23:34"); // PASSED
		}
		
		
		public function test_getIdeaDocuments() 
		{
			echo '<h3> Get Documents </h3>';
			
			var_dump($this->db->getIdeaDocuments("Pool Table", "2020-02-01 12:00:00")); // PASSED
			var_dump($this->db->getIdeaDocuments("Pool", "2020-02-01 12:00:00"));		// PASSED
		}
		
		
		public function test_uploadDocument()
		{
			echo '<h3> Upload Document </h3>
			
			<form method="post" enctype="multipart/form-data">
				Select document to upload:
				<input type="file" name="doc" />
				<input type="submit" name="submit" value="Upload" />
			</form>';
			
			if (isset($_POST['submit'])) 
				var_dump($this->db->uploadDocument($_FILES['doc'], "Pool Table", "2020-02-01 12:00:00")); // PASSED - Allow all accepted file types
                                                                                                          // PASSED - Error all unaccepted file types
                                                                                                          // PASSED - Accept name length under 100 char
                                                                                                          // PASSED - Error when name length over 100 char
                                                                                                          // PASSED - Allow files under 1 MB
                                                                                                          // PASSED - Error file over 1 MB
                                                                                                          // PASSED - Error no file 
		}
		
		
		public function test_downloadDocument() 
		{
			echo '<h3> Download Document </h3>';
			
			//$this->db->downloadDocument("Aqua.jpg", "Pool Table", "2020-02-01 12:00:00");             // PASSED - Downloaded image
			//$this->db->downloadDocument("MeguminExplosion.jpg", "Pool Table", "2020-02-01 12:00:00"); // PASSED - Downloaded image
			//$this->db->downloadDocument("Example doc.docx", "Pool Table", "2020-02-01 12:00:00");     // PASSED - Downloaded word doc
			//$this->db->downloadDocument("Example doc.pdf", "Pool Table", "2020-02-01 12:00:00");      // PASSED - Downloaded pdf
			//$this->db->downloadDocument("abc.txt", "Pool Table", "2020-02-01 12:00:00");              // PASSED - Downloaded empty file
			//$this->db->downloadDocument("", "Pool Table", "2020-02-01 12:00:00");                     // PASSED - Downlaoded empty file
		}
		
		
		public function test_getUserEmail() 
		{
			echo '<h3> Get User Email </h3>';
			
			var_dump($this->db->getUserEmail("Satou Kazuma")); // PASSED - Expect: Return email
			var_dump($this->db->getUserEmail(""));			   // PASSED - Expect: Return null
		}
		
		
		
		/* RATINGS */
		
		public function test_liked()
		{
			echo '<h3> Liked </h3>';
			
			var_dump($this->db->liked("Satou Kazuma", "Unwanted Item", "2020-02-02 21:20:00")); // PASSED - Expect: Return true
			var_dump($this->db->liked("Pikachu", "Unwanted Item", "2020-02-02 21:20:00"));		// PASSED - Expect: Return false
		}
		
		
		public function test_disliked()
		{
			echo '<h3> Disliked </h3>';
			
			var_dump($this->db->disliked("Satou Kazuma", "Pool Table", "2020-02-01 12:00:00")); // PASSED - Expect: Return true
			var_dump($this->db->disliked("Pikachu", "Pool Table", "2020-02-01 12:00:00"));		// PASSED - Expect: Ret	urn false
		}
		
		
		public function test_getNumLikes() 
		{
			echo '<h3> Get Num Likes </h3>';
			
			var_dump($this->db->getNumLikes("Pool Table", "2020-02-01 12:00:00"));	  // PASSED - Expect: Return 3
			var_dump($this->db->getNumLikes("Unwanted Item", "2020-02-02 21:20:00")); // PASSED - Expect: Return 1
		}
		
		
		public function test_getNumDislikes() 
		{
			echo '<h3> Get Num Dislikes </h3>';
			
			var_dump($this->db->getNumDislikes("Pool Table", "2020-02-01 12:00:00"));	 // PASSED - Expect: Return 1
			var_dump($this->db->getNumDislikes("Unwanted Item", "2020-02-02 21:20:00")); // PASSED - Expect: Return 0
		}
		
		
		public function test_setLike()
		{
			echo '<h3> Set Like </h3>';
			
			echo '<br>test_setLike is commented out';
			/*
			$this->db->setLike("Hasebe", "Advanced resting locations", "2020-02-13 02:51:53"); // PASSED - Expect: Create new like
			$this->db->setLike("Satou Kazuma", "Pool Table", "2020-02-01 12:00:00");		   // PASSED - Expect: Update to like
			*/
		}
		
		
		public function test_setDislike() 
		{
			echo '<h3> Set Dislike </h3>';
			
			echo '<br>test_setDislike is commented out';
			/*
			$this->db->setDislike("Satou Kazuma", "No more sharp corners", "2020-02-13 02:54:32"); // PASSED - Expect: Create new dislike
			$this->db->setDislike("Satou Kazuma", "Pool Table", "2020-02-01 12:00:00");			   // PASSED - Expect: Update to dislike
			*/
		}
		
		
		public function test_unsetLike()
		{
			echo '<h3> Unset Like </h3>';
			
			echo '<br>test_unsetLike is commented out';
			/*
			$this->db->unsetLike("Mr Bump", "No more sharp corners", "2020-02-13 02:54:32"); 	 // PASSED - Expect: Create new neutral
			$this->db->unsetLike("Hasebe", "Advanced resting locations", "2020-02-13 02:51:53"); // PASSED - Expect: Update to neutral 
			*/
		}
		
		
		public function test_unsetDislike() 
		{
			echo '<h3> Unset Dislike </h3>';
			
			echo '<br>test_unsetDislike is commented out';
			/*
			$this->db->unsetDislike("Arnie", "Unwanted Item", "2020-02-02 21:20:00");	// PASSED - Expect: Create new neutral
			$this->db->unsetDislike("Satou Kazuma", "Pool Table", "2020-02-01 12:00:00");	// PASSED - Expect: Update to neutral
			*/
		}
		
		
		
		/* CATEGORIES */
		
		public function test_getAllCategories() 
		{
			echo '<h3> Get All Categories </h3>';
			
			var_dump($this->db->getAllCategories());
		}
		
		
		public function test_getCategory() 
		{
			echo '<h3> Get Category </h3>';
			
			var_dump($this->db->getCategory('Educational'));
			var_dump($this->db->getCategory('Health and Safety'));
		}
		
		
		public function test_createCategory() 
		{
			echo '<h3> Create Category </h3>';
			
			echo '<br>test_createCategory has been commened out';
			/*
			$this->db->createCategory("Medical", "For medical problems or health issues"); // PASSED - Expect: Create medical tag
			$this->db->createCategory("Danger");										   // PASSED - Expect: Create danger tag
			*/
		}
		
		
		public function test_deleteCategory() 
		{
			echo '<h3> Delete Category </h3>';
			
			var_dump($this->db->deleteCategory("Educational")); // PASSED - Expect: true - Remove educational tag
			var_dump($this->db->deleteCategory("Medical")); 	// PASSED - Expect: false - Fail to remove inuse medical tag
			
		}
		
		
		public function test_setIdeaCategory() 
		{
			echo '<h3> Set Idea Category </h3>';
			
			$this->db->setIdeaCategory("Danger", "It's the end of the world", '2020-02-13 02:54:49');
		}
		
		
		
		/* FILTERS */
		
		public function test_highestRatedIdeas() 
		{
			echo '<h3> Highest Rated Ideas </h3>';
			
			var_dump($this->db->highestRatedIdeas());	  // PASSED - Expect: Return all ideas
			var_dump($this->db->highestRatedIdeas(null)); // PASSED - Expect: Return all ideas
			var_dump($this->db->highestRatedIdeas(0));	  // PASSED - Expect: Return null
			var_dump($this->db->highestRatedIdeas(2));	  // PASSED - Expect: Return up to 2 ideas
			var_dump($this->db->highestRatedIdeas(5));	  // PASSED - Expect: Return up to 5 ideas
		}
		
		
		public function test_mostViewedIdeas()
		{
			echo '<h3> Most Viewed Ideas </h3>';
			
			var_dump($this->db->mostViewedIdeas());		// PASSED - Expect: Return all ideas
			var_dump($this->db->mostViewedIdeas(null));	// PASSED - Expect: Return all ideas
			var_dump($this->db->mostViewedIdeas(0));	// PASSED - Expect: Return null
			var_dump($this->db->mostViewedIdeas(2));	// PASSED - Expect: Return up to the top 2 ideas
			var_dump($this->db->mostViewedIdeas(5));	// PASSED - Expect: Return up to the top 5 ideas
		}
		
		
		public function test_lastestIdeas()
		{
			echo '<h3> Lastest Ideas </h3>';
			
			var_dump($this->db->latestIdeas());	    // PASSED - Expect: Return all ideas
			var_dump($this->db->latestIdeas(null)); // PASSED - Expect: Return all ideas
			var_dump($this->db->latestIdeas(0));	// PASSED - Expect: Return null
			var_dump($this->db->latestIdeas(2));	// PASSED - Expect: Return up to 2 ideas
			var_dump($this->db->latestIdeas(5));	// PASSED - Expect: Return up to 5 ideas
		}
		
		
		public function test_lastestComments()
		{
			echo '<h3> Lastest Comments </h3>';
			
			var_dump($this->db->latestComments());	   // PASSED - Expect: Return all comments
			var_dump($this->db->latestComments(null)); // PASSED - Expect: Return all comments
			var_dump($this->db->latestComments(0));	   // PASSED - Expect: Return null
			var_dump($this->db->latestComments(2));	   // PASSED - Expect: Return up to 2 comments
			var_dump($this->db->latestComments(5));	   // PASSED - Expect: Return up to 5 comments
		}
		
		
		
		/* STATISTICS */
		
		public function test_getDepartmentIdeas()
		{
			echo '<h3> Get Department Ideas </h3>';
			
			var_dump($this->db->getDepartmentIdeas());
		}
		
		
		public function test_getDepartmentContributors() // NOT YET TESTABLE
		{
			echo '<h3> Get Department Contributors </h3>';
			
			var_dump($this->db->getDepartmentContributors());
		}
		
		
		
		/* ADMIN PAGE */
		
		public function test_isAdmin()
		{
			echo '<h3> Is Admin </h3>';
			
			var_dump($this->db->isAdmin('NumberOne'));	  // PASSED - Expect: Return true
			var_dump($this->db->isAdmin('Satou Kazuma')); // PASSED - Expect: Return false
		}
		
		
		public function test_editUser() 
		{
			echo '<h3> Edit User </h3>';
			
			//$this->db->editUser("Satou Kazuma 1", "Satou Kazuma", "KazumaDesu@mail.com", true);  // PASSED
			//$this->db->editUser("Satou Kazuma", "Satou Kazuma1", "KazumaDesu1@mail.com", false); // PASSED
			//$this->db->editUser("Satou Kazuma1", "Satou Kazuma", "KazumaDesu@mail.com");		   // PASSED
		}
		
		
		public function test_editAccount()
		{
			echo '<h3> Edit Account </h3>';
			
			$this->db->editAccount("Satou Kazuma", "Satou Kazuma 1", "KazumaDesu1@mail.com"); // PASSED
		}
		
		
		public function test_setPassword()
		{
			echo '<h3> Set Password </h3>';
			
			$this->db->setPassword("Satou Kazuma", "Stealu"); // PASSED
		}
		
		
		public function test_banUser() 
		{
			echo '<h3> Ban User </h3>';
			
			$this->db->banUser("Satou Kazuma"); // PASSED
		}
		
		
		public function test_deleteUser() 
		{
			echo '<h3> Delete User </h3>';
			
			$this->db->deleteUser("Satou Kazuma"); // PASSED
		}
		
		
		public function test_recoverUser() 
		{
			echo '<h3> Restore User </h3>';
			
			$this->db->recoverUser("Satou Kazuma"); // PASSED
		}
		
		
		public function test_editClosureDate() 
		{
			echo '<h3> Edit Closure Date </h3>';
			
			$this->db->editClosureDate("Improvements", "2020-02-29 12:00:00"); // PASSED
		}
		
		
		public function test_editFinalClosureDate() 
		{
			echo '<h3> Edit Final Closure Date </h3>';
			
			$this->db->editFinalClosureDate("Improvements", "2020-03-29 12:00:00"); // PASSED
		}
		
		
		
		/* DOWNLOAD */
		
		public function test_downloadForum() // NOT YET TESTABLE
		{
			echo '<h3> Download Forum </h3>';
            
            $this->db->downloadForum();
		}
	}
?>
