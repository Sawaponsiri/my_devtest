<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'user');
    
    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }
        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM users");
            return $result;
        }

        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM users WHERE id = '$userid'");
            return $result;
        }

        public function update($userid, $first_name, $last_name, $dob, $profile_image) {
            $result = mysqli_query($this->dbcon, "UPDATE users SET 
                first_name = '$first_name', 
                last_name = '$last_name', 
                dob = '$dob', 
                profile_image = '$profile_image' 
                WHERE id = '$userid'
            ");
            return $result;
        }
        



    }
    

?>