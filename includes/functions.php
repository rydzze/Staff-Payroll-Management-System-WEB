<?php
    include 'db.php';

    function executeQuery($sql){
        global $conn;
        $result = $conn->query($sql);
        if(!$result){
            die("Query failed: ".$conn->error);
        }
        return $result;
    }

    function validateAdminLogin($admin_ID, $admin_pwd){
        global $conn;
        $admin_ID = $conn->real_escape_string($admin_ID);
        $admin_pwd = $conn->real_escape_string($admin_pwd);
    
        $sql = "SELECT * FROM admin WHERE admin_ID='$admin_ID' AND admin_pwd='$admin_pwd'";
        $result = executeQuery($sql);
    
        if($result->num_rows == 1){
            return true;
        }
        else{
            return false;
        }
    }

    function selectAdminIDs(){
        $sql = "SELECT admin_ID FROM admin";
        $result = executeQuery($sql);

        if($result->num_rows > 0){
            $adminIDs = [];
            while($row = $result->fetch_assoc()){
                $adminIDs[] = $row["admin_ID"];
            }
            return $adminIDs;
        }
        else{
            return [];
        }
    }
?>