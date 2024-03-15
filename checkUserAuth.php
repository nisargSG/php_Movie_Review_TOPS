<?php

$userId=null;

function checkUserAuth(){

    global $userId;

    if(!isset($_COOKIE["userId"])) {
        header("Location:index.php");
    }
    else{
        $userId=$_COOKIE["userId"];    //1
    }

}





?>