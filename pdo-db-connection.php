<?php
    /**
     * PDO Database connection Class
     * 
     */

    class Connection {

        public $conn;

        // Automatically connect to database
        public function __construct() {

            $host = "localhost";
            $dbname = "db_name";
            $username = "db_username";
            $password = "password";
        
            try {
                $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                // echo "Connected to $dbname at $host successfully." . "<br>";
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                print "Error: " . $e->getMessage();
                exit;
            }
        }

        public function classMethod() {
            // Store SQL Query in a variable
            $query = "SELECT * FROM mysql_table";
            // Store the database connection from the "dbh.php" file that is required above
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            // Get the actual data that is stored in the "$results" variable
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
    // immediately instantiate the Connection 
    return new Connection();
?>