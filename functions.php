<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'ckscheck');
    
    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }

        public function insert($fullname, $address) {
            $result = mysqli_query($this->dbcon, "INSERT INTO tblusers(fullname, address) VALUES('$fullname','$address')");
            return $result;
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers");
            return $result;
        }

        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers WHERE id = '$userid'");
            return $result;
        }

        public function update($fullname, $address, $postingtime, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE tblusers SET 
                fullname = '$fullname',
                address = '$address',
                postingtime = '$postingtime'
                WHERE id = '$userid'
            ");
            return $result;
        }

        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tblusers WHERE id = '$userid'");
            return $deleterecord;
        }

        public function signin($uname) {
            $signinquery = mysqli_query($this->dbcon, "SELECT id FROM login WHERE username = '$uname'");
            return $signinquery;
        }
    }

?>