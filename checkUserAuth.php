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

        //user id -1
        $userId=$_COOKIE["userId"];

        $userResult=$dbConn->query("SELECT * FROM user WHERE id='$userId'");
        $userRow=$userResult->fetch_assoc();
        
        //verify if admin
        $isAdmin=$userRow['is_admin']=='0'?false:true;

        if(session_status() !== PHP_SESSION_ACTIVE){
            //start session
            session_start();
            //get the user's name
            $_SESSION["name"] = $userRow['name'];

           
        } 


    }

}





?>