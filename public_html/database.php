<?php
    /** Connects to the database and runs SQL commands */
    class Database 
    {
        private $dbc; // Database connection
        
        
        public function __construct() 
        {
            $this->connection();
        }
        
        
        /** Connection to the database */
        private function connection() 
        {
            // Connection details
            $host = "mysql.cms.gre.ac.uk";
            $username = "st2645h";
            $password = "Enterprise94";
            $database = "mdb_st2645h";

            $connect = "mysql:host=" . $host . ";dbname=" . $database . ";charset=utf8";
            
            
            // Testing connection 
            try {
                $this->dbc = new PDO($connect, $username, $password);
                $this->dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } 
            catch (PDOException $e) {
                echo "<script> alert('ERROR \nConnection failed: ' . $e->getMessage()) </script>";
            }
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
        public function createUser(string $username, string $password, string $email, string $role, string $department): void // TESTED
        {   
            // Clear excess whitespace
            $username = trim($username);
            $password = trim($password);
            $email = trim($email);
            $role = trim($role);
            $department = trim($department);
            
            
            // Parameter validation
            $e1 = $this->strValidation($username, "username", $this->letterNum, __FUNCTION__);
            $e2 = $this->strValidation($password, "password", $this->letterNum, __FUNCTION__);
            $e3 = $this->typeValidation($email, "email", __FUNCTION__, FILTER_VALIDATE_EMAIL);
            $e4 = $this->strValidation($role, "role", $this->letters, __FUNCTION__);
            $e5 = $this->strValidation($department, "department", $this->letters, __FUNCTION__);
            

            // If parameters haven't thrown an error
            if (!isset($e1) && !isset($e2) && !isset($e3) && !isset($e4) && !isset($e5)) {

                $department_Sub = "SELECT IF (r.NoDepartment = 1, NULL, (SELECT d.DepartmentID FROM Department d WHERE d.Name = ?))";

                $sql = "INSERT INTO User (DepartmentID, RoleID, UserName, Password, Email) 
                        SELECT ($department_Sub), r.RoleID, ?, ?, ? FROM Role r
                        WHERE r.Name = ?";

                $this->runSQL($sql, [$department, $username, $password, $email, $role]);
            }
            else 
                $this->errorMessage([$e1, $e2, $e3, $e4, $e5]);
        }
        
        
        /**
         * Checks whether username has already been used
         * 
         * @param string $username Name of the user 
         * 
         * @return bool true if username is taken [default], else false
         */
        public function usernameTaken(string $username) // TESTED
        {
            // Clear excess whitespace
            $username = trim($username);


            // Parameter validation
            $e = $this->strValidation($username, "username", $this->letterNum, __FUNCTION__);
                

            // If parameter hasn't thrown an error
            if (!isset($e)) {
                $sql = "SELECT UserName FROM User WHERE UserName = ?";
                
                return $this->doesExistSQL($sql, [$username]);
            }
            else 
                $this->errorMessage([$e]);
            
            return true;
        }

        
        /**
         * Confirms if the username and password are correct
         * 
         * @param string $username Name of the user
         * @param string $password Password of the user
         * 
         * @return bool true if login sucessful, else false
         */
        public function checkLogin(string $username, string $password) // TESTED
        {
            // Clear excess whitespace
            $username = trim($username);
            $password = trim($password);


            // Parameter validation
            $e1 = $this->strValidation($username, "username", $this->letterNum, __FUNCTION__);
            $e2 = $this->strValidation($password, "password", $this->letterNum, __FUNCTION__);


            // If parameters haven't thrown an error
            if (!isset($e1) && !isset($e2)) {
                $sql = "SELECT UserName FROM User WHERE UserName = ? AND Password = ? AND Banned = '0' AND Removed = '0'";

                return $this->doesExistSQL($sql, [$username, $password]);
            }
            else 
                $this->errorMessage([$e1, $e2]);

            return false;
        }




        /* =================================== JOB =================================== */

        /**
         * Retrieves information for every department
         * 
         * @return array[object]|null Array of all *Departments* retrieved - each *Department* object contains: [ **Name**, **Description** ]
         */
        public function getAllDepartments(): ?array // TESTED
        {
            $sql = "SELECT Name, Description FROM Department WHERE Removed = '0' ORDER BY Name";
            
            return $this->getArrayObjectsSQL($sql);
        }
        
        
        /**
         * Retrieves a user's department
         * 
         * @param string $username Name of the user
         * 
         * @return object|null *Department* object holds: [ **Name**, **Description** ]
         * 
         * QA Manager's is not assigned to a department so returns an object with 'None' for both result, whereas failed searches return 'null'
         */
        public function getDepartment(string $username): ?object // TESTED
        {
            // Clear excess whitespace
            $username = trim($username);


            // Parameter validation
            $e = $this->strValidation($username, "username", $this->letterNum, __FUNCTION__);
            
            
            // If parameter hasn't thrown an error
            if (!isset($e)) {
                $name_Sub = "IF (r.NoDepartment = 1, 'None', d.Name)";
                $desc_Sub = "IF (r.NoDepartment = 1, 'None', d.Description)";
                
                $sql = "SELECT $name_Sub AS Name, $desc_Sub AS Description FROM Department d
                        RIGHT JOIN User u ON d.DepartmentID = u.DepartmentID
                        INNER JOIN Role r ON u.RoleID = r.RoleID
                        WHERE u.UserName = ? AND u.Banned = '0' AND u.Removed = '0' AND  (d.Removed = 0 OR d.Removed IS NULL)";
                
                return $this->getObjectSQL($sql, [$username]);
            }
            else 
                $this->errorMessage([$e]);
            
            return null;
        }


        /**
         * Retrieves information for every role 
         * 
         * @return array[object]|null Array of all *Roles* retrieved - each *Role* object contains: [ **Name**, **Type**, **Description** ]
         */
        public function getAllRoles(): ?array // TESTED
        {
            $sql = "SELECT Name, Type, Description FROM Role WHERE Removed = '0'";
            
            return $this->getArrayObjectsSQL($sql);
        }
        
        
        /**
         * Retrieves a user's role
         * 
         * @param string $username Name of the user
         * 
         * @return object|null *Role* object holds: [ **Name**, **Type**, **Description** ]
         * 
         * **All users are assoiciated to a department, except for QA Managers who not associated to any department**
         */
        public function getRole(string $username): ?object // TESTED
        {
            // Clear excess whitespace
            $username = trim($username);


            // Parameter validation
            $e = $this->strValidation($username, "username", $this->letterNum, __FUNCTION__);
            

            // If parameter hasn't thrown an error
            if (!isset($e)) {
                $sql = "SELECT r.Name, r.Type, r.Description FROM Role r 
                        INNER JOIN User u ON r.RoleID = u.RoleID 
                        WHERE u.UserName = ? AND u.Removed = '0' AND r.Removed = '0'";

                return $this->getObjectSQL($sql, [$username]);
            }
            else 
                $this->errorMessage([$e]);

            return null;
        }




        /* =================================== FORUM SELECTION =================================== */
        
        /**
         * Retrieves all forums
         * 
         * @return array[object]|null Array of all *Forums* retrieved - each *Forum* object contains: [ **Name**, **Description**, **Closure**, **FinalClosure** ]
         */
        public function getAllForums(): ?array // TESTED
        {
            $sql = "SELECT Name, Description, Closure, FinalClosure FROM Forum WHERE Removed = '0' ORDER BY Name ASC";

            return $this->getArrayObjectsSQL($sql);
        }


        /**
         * Create a new forum
         * 
         * @param string $name Name of the forum
         * @param string $description Description of the forum
         * @param string $closureDate Date the forum stops allowing new ideas, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return void
         * 
         * Comments will stop being allow 30 days after the closure date
         */
        public function createForum(string $name, string $desc, string $closureDate): void // TESTED
        {
            // Clear excess whitespace
            $name = trim($name);
            $desc = trim($desc);
            $closureDate = trim($closureDate);

            
            // Parameter validation
            $e1 = $this->strValidation($name, "name", $this->letters, __FUNCTION__);
            $e2 = $this->strValidation($desc, "desc", $this->letterNum, __FUNCTION__);
            $e3 = $this->strValidation($closureDate, "closureDate", $this->dateTime, __FUNCTION__);
            
            
            // If parameters haven't thrown an error
            if (!isset($e1) && !isset($e2) && !isset($e3)) {
                
                $closure = (new DateTime($closureDate))->format('Y-m-d H:i:s');
                $finalClosure = (date_modify(new DateTime($closureDate), "+30 days"))->format('Y-m-d H:i:s');
                
                $sql = "INSERT INTO Forum (Name, Description, Closure, FinalClosure) VALUES (?, ?, ?, ?)";
                
                $this->runSQL($sql, [$name, $desc, $closure, $finalClosure]);
            }
            else 
                $this->errorMessage([$e1, $e2, $e3]);
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
         * @param int $username Name of the user
         * @param string $ideaTitle Title of the idea 
         * @param string $datePosted Date the idea was posted, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return void
         */
        public function setLike(string $username, string $ideaTitle, string $datePosted): void 
        {
            
        }
        
        
        /**
         * Allows a user to dislike an idea
         * 
         * @param int $username Name of the user
         * @param string $ideaTitle Title of the idea 
         * @param string $datePosted Date the idea was posted, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return void
         */
        public function setDislike(string $username, string $ideaTitle, string $datePosted): void 
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
         * @param string $forum Name of the forum
         * @param string $closure Date when no more ideas can be posted to the forum, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return void
         */
        public function editClosureDate(string $forum, string $closure): void 
        {

        }


        /**
         * Edit the final closure date for a forum
         * 
         * @param string $forum Name of the forum
         * @param string $closure Date when no more comments can be posted to the forum, *display in datetime format e.g. 'YYYY-MM-DD HH:MM:SS'*
         * 
         * @return void
         */
        public function editFinalClosureDate(string $forum, string $closure): void 
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
        private function getArrayObjectsSQL(string $sql, array $fields = []): ?array 
        {
            try {
                $query = $this->dbc->prepare($sql);
                $query->execute($fields);
                $rows = $query->fetchAll(PDO::FETCH_OBJ);
                
                // If no rows found 
                return ($rows == false) ? null : $rows;

            } catch (Exception $e) {
                $this->errorMessage([$e]);

                return null;
            }
        }


        /** Runs SQL and return row in an array */
        private function getObjectSQL($sql, array $fields = []): ?object 
        {
            try {
                $query = $this->dbc->prepare($sql);
                $query->execute($fields);
                $row = $query->fetch(PDO::FETCH_OBJ);
                
                // If no row row found
                return ($row == false) ? null : $row;

            } catch (Exception $e) {
                $this->errorMessage([$e]);

                return null;
            }
        }


        /** Runs SQL and return a field */
        private function getFieldSQL(string $sql, string $getField, array $fields = []): ?string
        {
            try {
                $query = $this->dbc->prepare($sql);
                $query->execute($fields);
                $row = $query->fetch(PDO::FETCH_OBJ);

                return $row->{$getField};

            } catch (Exception $e) {
                $this->errorMessage([$e]);

                return null;
            }
        }


        /** Runs SQL and check if returned a result */
        private function doesExistSQL(string $sql, array $fields = []) 
        {
            try {
                $query = $this->dbc->prepare($sql);
                $row = $query->execute($fields);

                return ($query->rowCount()) ? true : false;

            } catch (Exception $e) {
                $this->errorMessage([$e]);
                
                return null;
            }
        }


        /** Runs SQL */
        private function runSQL(string $sql, array $fields = [], bool $countRows = false)
        {
            try {
                $query = $this->dbc->prepare($sql);
                $query->execute($fields);

                if ($countRows)
                    return $query->rowCount();

            } catch (Exception $e) {
                $this->errorMessage([$e]);
            }
        }




        /* =================================== VALIDATION =================================== */

        /** Validates if a string contains only the accepted characters */
        private function strValidation(string $var, string $varName, string $charType, $function) 
        {
            try { 
                // Check variable is a string
                if (!is_string($var)) {
                    throw new Exception("Function {$function} parameter \${$varName} is attempting to validate \'{$var}\', it should be in a string format");
                }
                

                // Set character types allow for string
                if ($charType == $this->letters) {
                    $allowedChar = "a-z ";
                    $shouldContain = "contain only letters";
                } 
                else if ($charType == $this->letterNum) {
                    $allowedChar = "0-9a-z ";
                    $shouldContain = "contain only letters and numbers";
                } 
                else if ($charType == $this->text) {
                    $allowedChar = "0-9a-z .,!";
                    $shouldContain = "contain only letters and numbers";
                } 
                else if ($charType == $this->dateTime) {
                    try { 
                        new DateTime($var); // Check if can be in DateTime format
                        
                        $allowedChar = "0-9 :-";
                        $shouldContain = "be a DateTime";
                    } 
                    catch (Exception $ee) { 
                        throw new Exception("Function {$function}() parameter \${$varName} is attempting to pass '{$var}', it should {$shouldContain}");
                    }
                } 
                else 
                    throw new Exception("Validation failed!  No character type selected"); 


                // Error if parameter contain incorrect information
                if (preg_match("/[^$allowedChar]/i", $var))
                    throw new Exception("Function {$function}() parameter \${$varName} is attempting to pass '{$var}', it should {$shouldContain}");
                
                return null;
            } 
            catch (Exception $e) {
                return $e;
            }
        }


        /** Validates if variable is the correct data type */
        private function typeValidation($var, string $varName, $function, string $correctType = null) 
        {
            try { 
                // Set type comparison
                if (is_int($var)) {
                    $validType = "an integer";
                    $correctType = FILTER_VALIDATE_INT;
                }
                else if (is_bool($var)) {
                    $validType = "an boolean";
                    $correctType == FILTER_VALIDATE_BOOLEAN;
                }
                else if ($correctType == FILTER_VALIDATE_EMAIL) 
                    $validType = "a valid email address";
                else 
                    throw new Exception("Validation failed!  No variable type selected");
            

                // Error if parameter contain incorrect data type
                if (!filter_var($var, $correctType))
                    throw new Exception("Function {$function}() parameter \${$varName} is attempting to pass '{$var}', it should contain {$validType}");

                
                return null;
            }
            catch (Exception $e) {
                return $e;
            }
        }

        
        private $letters = "letters";
        private $letterNum = "letterNum";
        private $text = "text";
        private $dateTime = "DateTime";



        private function errorMessage(array $errorMessage): void 
        {
            $message = 'ERRORS'; 
            
            foreach ($errorMessage as $e) {
                if (!is_null($e)) 
                    $message = $message . '\nCaught exception: ' . $e->getMessage();
            }
            
            echo '<script> alert("'.$message.'") </script>';
        }
    }
?>
