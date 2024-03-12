<?php

include "dbConfig.php";

include "checkUserAuth.php";

checkUserAuth();

$movieId=null;

if($_GET["movieId"]){
    $movieId=$_GET["movieId"];
}
else{
    header("Location:dashboard.php");
}

?>


<html>

    <head>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/dashboard.css">

    </head>

    <body>
        <?php

            $sql = "SELECT * FROM movies WHERE id='$movieId'";
            $moviesResult = $dbConn->query($sql);
            $movieRow = $moviesResult->fetch_assoc();

            echo ($movieRow["title"]); 
            echo ($movieRow["description"]); 
            echo ($movieRow["release_date"]); 
            echo ($movieRow["image"]); 


        ?>



    </body>


</html>