<?php
include "dbConfig.php";

include "checkUserAuth.php";

checkUserAuth();

if($isAdmin==false){
    header("Location:dashboard.php");
}


if(isset($_GET["movieId"])){
    $movieId=$_GET["movieId"];
    $dbConn->query("UPDATE movies SET is_deleted=true where id='$movieId'");
}
header("Location:dashboard.php");



?>