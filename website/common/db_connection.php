    <?php
        class DbConnection{
            public $conn = "";
            private $hostname = "localhost";
            private $username = "root";
            private $password = "";
            private $dbname = "logistics_and_transport_management_05_db";

            function __construct(){
                $this->conn = new mysqli(
                    $this->hostname,
                    $this->username,
                    $this->password,
                    $this->dbname
                );
                if(!$this->conn->connect_error){
                    $GLOBALS["con"] = $this->conn;
                }else{
                    echo "Not Connected";
                }
            }
        }
    ?>
