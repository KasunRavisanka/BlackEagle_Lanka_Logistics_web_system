<?php
    include_once '../commons/db_connection.php';
    $dbConnection= new DbConnection();   
    class Website{
    // Add Warehouse To Datebase //
        public function getAllEmailRoles(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM email e, role r, user u WHERE "
                    . "u.email_id = e.email_id AND "
                    . "u.role_id = r.role_id";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }
    }
