<?php

$userId=null;
$isAdmin = false;

function checkUserAuth(){

    global $userId;
    global $isAdmin;
    global $dbConn;


    if(!isset($_COOKIE["userId"])) {
        header("Location:index.php");
    }
    else{
        $userId=$_COOKIE["userId"];    //1,2,3
        $userResult=$dbConn->query("SELECT * FROM user WHERE id='$userId'");
        $userRow=$userResult->fetch_assoc();
        
        $isAdmin=$userRow['is_admin']=='0'?false:true;

    }

}





?>