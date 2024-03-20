<?php
include "dbConfig.php";

include "checkUserAuth.php";

checkUserAuth();

$showError = false;


if($isAdmin==false){
    header("Location:dashboard.php");
}


if(isset($_POST["title"]) && isset($_POST["description"])){

    $title= $_POST["title"];
    $description= $_POST["description"];


    $pathToSave = "assets/img/img_movies/".basename($_FILES["movie_image"]["name"]);

    if(move_uploaded_file($_FILES["movie_image"]["tmp_name"],$pathToSave)==TRUE){
        $originalFileName = basename($_FILES["movie_image"]["name"]);
        $dbConn->query("INSERT INTO movies(title,description,image) VALUES('$title','$description','$originalFileName')");
        header("Location:dashboard.php");
    
    }
    else{
        $showError=TRUE;
    }

}

?>

<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>

<body>
    <div class="jumbotron">
        <h3>You Are Adding New Movie</h3>
    </div>
    <div class="container">
        <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control" id="title">
            </div>

            <div class="form-group">
                <label for="title">Description</label>
                <input name="description"  type="text" class="form-control" id="title">
            </div>

            <div class="form-group">
                <label for="img">Movie Image</label>
                <input name="movie_image"  type="file" class="form-control" id="img">
            </div>

            <button type="submit" class="btn btn-warning">Add Movie</button> 
            <a href="dashboard.php" class="btn btn-danger">Cancel</a> 

        </form>

        <?php

            if($showError==TRUE){?>
                <p>error while saving movie</p>
        <?php    
            }
        ?>

    </div>
</body>
