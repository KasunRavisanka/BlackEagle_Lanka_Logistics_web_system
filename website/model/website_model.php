<?php
    include_once '../common/db_connection.php';
    $dbConnection= new DbConnection();   
    class Website{
    // Add Warehouse To Datebase //
        public function getAllEmailRoles(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM email e, role r, user u, password p, login l WHERE "
                    . "u.email_id = e.email_id AND "
                    . "p.password_id = l.password_id AND "
                    . "u.loginId = l.login_id AND "
                    . "u.role_id = r.role_id";
            $result = $con->query($sql) or die($con->error);
            return $result; 
        }
    }
