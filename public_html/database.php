<?php
    /** Connects to the database and runs SQL commands */
    class Database 
    {
        
        private $dbc; // Database connection
        
        
        public function __construct() 
        {
            $this->dbc = $this->Connection();
        }
        
        
        /** Connection to the database */
        private function connection() 
        {
            $host = "mysql.cms.gre.ac.uk";
            $username = "st2645h";
            $password = "Enterprise94";
            $database = "mdb_st2645h";
            
            
            // Testing connection 
            return mysqli_connect($host, $username, $password, $database) OR die("Couldn't connect to database".  mysqli_connect_errno());
        }


        /* =================================== LOGIN / REGISTRATION =================================== */

        /**
         * Creates a new user
         * 
         * @param string $username Name of the user 
         * @param string $password Password of the user
         * @param string $email Email address of the user
         * 
         * @return void
         */
        public function createUser(string $username, string $password, string $email, string $role, string $department): void 
        {
            
        }
        
        
        /**
         * Checks whether username has already been used
         * 
         * @param string $username Name of the user 
         * 
         * @return bool true if username is taken, else false
         */
        public function usernameTaken(string $username) 
        {
            return false;
        }

        
        /**
         * Confirms if the username and password are correct
         * 
         * @param string $username Name of the user
         * @param string $password Password of the user
         * 
         * @return bool true if login sucessful, else false
         */
        public function checkLogin(string $username, string $password) 
        {
            return false;
        }




        /* =================================== JOB =================================== */

        /**
         * Retrieves information for every department
         * 
         * @return array[object]|null Array of all *Departments* retrieved - each *Department* object contains: [ **Name**, **Description** ]
         */
        public function getAllDepartments(): ?array 
        {
            return null;
        }
        
        
        /**
         * Retrieves a user's department
         * 
         * @param string $username Name of the user
         * 
         * @return object|null *Department* object holds: [ **Name**, **Description**, **Closure**, **FinalClosure** ]
         */
        public function getDepartment(string $username): ?object 
        {
            return null;
        }


        /**
         * Retrieves information for every role 
         * 
         * @return array[object]|null Array of all *Roles* retrieved - each *Role* object contains: [ **Name**, **Type** ]
         */
        public function getAllRoles(): ?array
        {
            return null;
        }
        
        
        /**
         * Retrieves a user's role
         * 
         * @param string $username Name of the user
         * 
         * @return object|null *Role* object holds: [ **Name** ]
         * 
         * **All users are assoiciated to a department, except for QA Managers who not associated to any department**
         */
        public function getRole(string $username): ?object 
        {
            return null;
        }




        /* =================================== FORUM SELECTION =================================== */
        
        /**
         * Retrieves all forums
         * 
         * @return array[object]|null Array of all *Forums* retrieved - each *Forum* object contains: [ **Name**, **Description**, **Closure**, **FinalClosure** ]
         */
        public function getAllForums(): ?array 
        {
            return null;
        }


        /**
         * Create a new forum
         * 
         * @param string $name Name of the forum
         * @param string $description Description of the forum
         * @param string $closureDate Date the forum stops allow new ideas, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return void
         * 
         * Comments will stop being allow one month after the closure date
         */
        public function createForum(string $name, string $description, string $closureDate): void
        {
            
        }
        



        /* =================================== FORUM BOARD =================================== */
        
        /**
         * Retrieves a forum
         * 
         * @param string $forum Name of the forum
         * 
         * @return object|null *Forum* object holds: [ **Name**, **Description**, **Closure**, **FinalClosure** ]
         */
        public function getForum(string $forum): ?object
        {
            return null;
        }
        
        
        /**
         * Retrieves all ideas posted to a forum
         * 
         * @param $forum Name of the forum the ideas where posted to
         * @param int $page Page number selected
         * @param int $retrieve Amount of ideas that are retrieved
         * 
         * @return array[object]|null Array of all *Ideas* retrieved - each *Idea* object contains: [ **UserName**, **Title**, **IdeaText**, **DatePosted**, **Likes**, **Dislikes** ]
         * 
         * If the idea is posted anonymously, then the returning UserName is set to '**Anonymous**'
         * 
         * If the idea owner's account is deleted, then the returning UserName is set to '**Deleted**'
         */
        public function getAllIdeas(string $forum, int $page, int $retrieve): ?array 
        {
            return null;
        }
        
        
        /**
         * Create a new idea
         * 
         * @param string $idea Message to be uploaded to the forum
         * @param string $forum Name of the forum
         * @param string $title Title of the idea
         * @param string $username Name of the user
         * @param bool $anonymous Allows users to post anonymously. If true the user's information will NOT be shown, else false
         * 
         * @return void
         */
        public function createIdea(string $idea, string $title, string $forum, string $username, bool $anonymous): void 
        {
            
        }

        
        /**
         * Retrieves a Quality Assurance Coordinator's email address
         * 
         * @param string $name Name of the department
         * 
         * @return string|null If found, returns the department coordinator's email address, else null
         */
        public function getCoordinatorEmail(string $department): ?string 
        {
            return null;
        }


        /**
         * Increases the view counter by one 
         * 
         * @param string $ideaTitle Title of the idea 
         * @param string $datePosted Date the idea was posted, *display in datetime format e.g. ''YYYY-MM-DD HH:MM:SS'*
         * 
         * @return void
         */
        public function increaseViewCount(string $ideaTitle, string $datePosted): void 
        {
            
        }




        /* =================================== IDEA PAGE =================================== */

        /**
         * Retrieve an idea 
         * 
         * @param string $title Title for the idea
         * @param string $datePosted Date the idea was posted, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return object|null *Idea* object holds: [ **UserName**, **Title**, **IdeaText**, **DatePosted**, **Likes**, **Dislikes** ]
         */
        public function getIdea(string $title, string $datePosted): ?object
        {
            return null;
        }
        
        
        /**
         * Retrieves all comments for an idea
         * 
         * @param string $ideaTitle Title of the idea 
         * @param string $datePosted Date the idea was posted, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return array[object]|null Array of all *Comments* retrieved - each *Comment* object contains: [ **UserName**, **CommentText**, **DatePosted** ]
         */
        public function getComments(string $ideaTitle, string $datePosted): ?array 
        {
            return null;
        }
        
        
        /**
         * Create a new comment on an idea
         * 
         * @param string $comment Comment being posted
         * @param string $ideaTitle Title of the idea 
         * @param string $datePosted Date the idea was posted, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * @param string $username Name of the user
         * @param bool $anonymous Allows users to post anonymously, if true the user's information will NOT be shown, else false
         * 
         * @return void
         */
        public function createComment(string $comment, string $ideaTitle, string $datePosted, string $username, bool $anonymous): void 
        {
            
        }
        
        
        /**
         * Retrieves documents post with an idea
         * 
         * @param string $ideaTitle Title of the idea 
         * @param string $datePosted Date the idea was posted, *display in datetime format e.g. 'hh:mm:ss DD-MM-YYYY' or 'YYYY-MM-DD hh:mm:ss'*
         * 
         * @return array[object]|null Array of all *Documents* retrieved - each *Document* object contains: [  ]
         */
        public function getDocument(string $ideaTitle, string $datePosted): ?array 
        {
            return null;
        }
        
        
        /**
         * Upload a file
         * 
         * @param $file 
         * 
         * @return void
         */ 
        public function uploadDocument($file): void 
        {
            
        }
        

        /**
         * Retrieves the email address of a user
         * 
         * @param string $username Name of the user 
         * 
         * @return string|null If found, returns an email address, else null
         */
        public function getUserEmail(string $username): ?string 
        {
            return null;
        }




        /* =================================== RATINGS =================================== */

        /**
         * Checks whether a users has liked an idea
         * 
         * @param string $username Name of the user
         * @param string $ideaTitle Title of the idea 
         * @param string $datePosted Date the idea was posted, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return bool true if user has liked this idea, else false
         */
        public function liked(string $username, string $ideaTitle, string $datePosted) 
        {
            return false;
        }
        
        
        /**
         * Checks whether a users has disliked an idea
         * 
         * @param string $username Name of the user
         * @param string $ideaTitle Title of the idea 
         * @param string $datePosted Date the idea was posted, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return bool true if user has disliked this idea, else false
         */
        public function disliked(string $username, string $ideaTitle, string $datePosted) 
        {
            return false;
        }


        /**
         * Retrieves the amount of likes for an idea
         * 
         * @param string $ideaTitle Title of the idea 
         * @param string $datePosted Date the idea was posted, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return int Count of the number of likes for an idea
         */
        public function getNumLikes(string $ideaTitle, string $datePosted): int 
        {
            return 0;
        }


        /**
         * Retrieves the amount of dislikes for an idea
         * 
         * @param string $ideaTitle Title of the idea 
         * @param string $datePosted Date the idea was posted, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return int Count of the number of dislikes for an idea
         */
        public function getNumDislikes(string $ideaTitle, string $datePosted): int 
        {
            return 0;
        }
        
        
        /**
         * Allows a user to like an idea
         * 
         * @param int $ideaID
         * @param int $userID
         * @param bool $active When true an idea has been liked, else false
         * 
         * @return void
         */
        public function setLike(int $ideaID, int $userID, bool $active): void 
        {
            
        }
        
        
        /**
         * Allows a user to dislike an idea
         * 
         * @param int $ideaID
         * @param int $userID
         * @param bool $active When true an idea has been disliked, else false
         * 
         * @return void
         */
        public function setDislike(int $ideaID, int $userID, bool $active): void 
        {
            
        }
        



        /* =================================== CATEGORIES =================================== */

        /**
         * Retrieve all catagory tags
         * 
         * @return array[object]|null Array of all *Categories* retrieved - each *Category* object contains: [ **Name**, **Description** ]
         */
        public function getAllCategories(): ?array
        {
            return null;
        }


        /**
         * Retrieve a category tag
         * 
         * @param string $category Name of the category
         * 
         * @return object|null *Category* object holds: [ **Name**, **Description** ]
         */
        public function getCategory(string $category): ?object 
        {
            return null;
        }
        
        
        /**
         * Create a new category
         * 
         * @param $category Name of category
         * 
         * @return void
         */
        public function createCategory(string $category): void 
        {

        }

        
        /**
         * Delete a category
         * 
         * @param string category Name of the category
         * 
         * @return void
         */
        public function deleteCategory(string $category): void 
        {
            
        }


        /**
         * Links a category to an idea
         * 
         * @param string $category Name of the category
         * 
         * @return void
         */
        public function setIdeaCategory(string $category): void 
        {
            
        }




        /* =================================== FILTERS =================================== */
        

        /**
         * Retrieve the most popular ideas
         * 
         * @param int $amount Number of ideas to retrieve
         * 
         * @return array[object]|null Array of all *Ideas* retrieved - each *Idea* object contains: [  ]
         */
        public function highestRatedIdeas(int $amount): ?array 
        {
            return null;
        }


        /**
         * Retrieves the most viewed ideas
         * 
         * @param int $amount Number of ideas to retrieve
         * 
         * @return array[object]|null Array of all *Ideas* retrieved - each *Idea* object contains: [  ]
         */
        public function mostViewedIdeas(int $amount): ?array 
        {
            return null;
        }


        /**
         * Retrieves the latest ideas posted
         * 
         * @param int $amount Number of ideas to retrieve
         * 
         * @return array[object]|null Array of all *Ideas* retrieved - each *Idea* object contains: [  ]
         */
        public function latestIdeas(int $amount): ?array 
        {
            return null;
        }


        /**
         * Retrieves the latest comments posted
         * 
         * @param int $amount Number of ideas to retrieve
         * 
         * @return array[object]|null Array of all *Comments* retrieved - each *Comment* object contains: [  ]
         */
        public function latestComments(int $amount): ?array 
        {
            return null;
        }




        /* =================================== STATISTICS =================================== */

        /**
         * Counts the number of ideas posted by each department
         * 
         * @return array[object]|null Array of all *Ideas* retrieved - each *Idea* object contains: [ **Name**, **IdeaCount** ]
         */
        public function departmentIdeas(): ?array 
        {
            return null;
        }


        /**
         * Counts the number of contributors of ideas posted by each department
         * 
         * @return array[object]|null Array of all *Contributors* retrieved - each *Contributor* object contains: [  ]
         */
        public function departmentIdeaContributors(): ?array 
        {
            return null;
        }


        /**
         * Download all the information from database into a CSV file
         */
        public function downloadDatabase() 
        {
            
        }




        /* =================================== ADMIN PAGE =================================== */
        
        /**
         * Confirms if the user is an admin
         * 
         * @param string $username Name of the user
         * 
         * @return bool true if user is an admin, else false
         */
        public function isAdmin(string $username) 
        {
            return false;
        }


        /**
         * Admin can edit a user's information
         * 
         * @param string $username Name of the user 
         * @param string $newUsername New name of the user 
         * @param string $newEmail New email address of the user
         * @param bool $admin true if user is an admin, else false
         * 
         * @return void
         */
        public function editUser(string $username, string $newUsername, string $newEmail, bool $admin): void 
        {
            
        }


        /**
         * User can edit their information
         * 
         * @param string $username Name of the user 
         * @param string $newUsername New name of the user 
         * @param string $newEmail New email address of the user
         * 
         * @return void
         */
        public function editAccount(string $username, string $newUsername, string $newEmail): void 
        {
            
        }


        /**
         * Sets a new password for a user
         * 
         * @param string $username Name of the user
         * @param string $password New password to be used
         * 
         * @return void
         */
        public function setPassword(string $username, string $password): void 
        {
            
        }


        /**
         * Edit the closure date for a forum
         * 
         * @param $forum Name of the forum
         * @param $closure Date when no more ideas can be posted to the forum, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return void
         */
        public function editClosureDate($forum, $closure): void 
        {

        }


        /**
         * Edit the final closure date for a forum
         * 
         * @param $forum Name of the forum
         * @param $closure Date when no more comments can be posted to the forum, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return void
         */
        public function editFinalClosureDate($forum, $closure): void 
        {

        }




        /* =================================== SEARCH =================================== */

        /**
         * Retrieves information for all users from what is searched
         * 
         * @param string $search Text being searched
         * 
         * @return array[object]|null Array of all *???* retrieved - each *???* object contains: [ **???**, **???** ]
         */
        public function search(string $search): ?array 
        {
            return null;
        }

        


        /* =================================== DATABASE COMMANDS =================================== */

        /** Run SQL and return rows in a multi dimentional array */
        private function getMultiArraySQL(string $sql): ?array 
        {
            $query = mysqli_query($this->dbc, $sql);

            $array = array();

            while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                $array[] = $row;
            }
            
            return $array;
        }


        /** Run SQL and return row in an array */
        private function getArraySQL($sql): ?array 
        {
            $query = mysqli_query($this->dbc, $sql);

            return mysqli_fetch_array($query, MYSQLI_BOTH);
        }


        /** Run SQL and return a field */
        private function getFieldSQL(string $sql, string $field): ?string
        {
            $query = mysqli_query($this->dbc, $sql);
            $row = mysqli_fetch_array($query, MYSQLI_BOTH);

            return $row[$field];
        }


        /** Run SQL and check if returned a result */
        private function doesExistSQL(string $sql) 
        {
            $query = mysqli_query($this->dbc, $sql);
            $row = mysqli_fetch_array($query, MYSQLI_BOTH);

            return !empty($row);
        }
    }
?>
