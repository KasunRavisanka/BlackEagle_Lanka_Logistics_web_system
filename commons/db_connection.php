    <?php
        class DbConnection{
            public $conn = "";
            private $hostname = "localhost";
            private $username = "root";
            private $password = "";
            private $dbname = "logistics_and_transport_management_05_db";

            function __construct(){
                $this->con = new mysqli(
                    $this->hostname,
                    $this->username,
                    $this->password,
                    $this->dbname
                );
                if (!$this->con->connect_error) {
                    $GLOBALS["con"] = $this->con;
                } else {
                    echo "Not Connected";
                }
            }
        }
    ?>
