<?php

$host="localhost";
$username="root";
$password="";
$dbname="06jan";

$dbConn = new mysqli($host, $username, $password,$dbname);

// Check connection
if ($dbConn->connect_error) {
    die("Connection failed: " .$dbConn->connect_error);
}



  

?>