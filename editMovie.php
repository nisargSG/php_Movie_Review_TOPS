<?php
include "dbConfig.php";

include "checkUserAuth.php";

checkUserAuth();

if($isAdmin==false){
    header("Location:dashboard.php");
}

$movieId=null;

if(isset($_GET["movieId"])){
    $movieId=$_GET["movieId"];
}
else if(isset($_POST["movie_id"]) && isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["image"])){
    $movieId=$_POST["movie_id"];
    $title=$_POST["title"];
    $description=$_POST["description"];
    $image=$_POST["image"];


    $dbConn->query("UPDATE movies SET title='$title',description='$description',image='$image' WHERE id='$movieId'");
    header("Location:dashboard.php");

}
else{
    header("Location:dashboard.php");
}

$movieResult = $dbConn->query("SELECT * FROM movies WHERE id='$movieId'");
$movieRow = $movieResult->fetch_assoc();
?>

<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>

<body>

    <div class="jumbotron">
        <h3>You Are Editing Movie <?= $movieRow["title"] ?></h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img class="img_movie" src="assets/img/img_movies/<?= $movieRow["image"] ?>" />
            </div>
            <div class="col-lg-6">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="hidden" name="movie_id" value="<?= $movieId ?>"/>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" value=<?= $movieRow["title"] ?> type="text" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="title">Description</label>
                        <input name="description" value=<?= $movieRow["description"] ?> type="text" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="title">URL</label>
                        <input name="image" value=<?= $movieRow["image"] ?> type="text" class="form-control" id="title">
                    </div>

                    <button type="submit" class="btn btn-warning">Update Movie</button> 
                    <a href="dashboard.php" class="btn btn-danger">Cancel</a> 

            </div>
        </div>
    </div>

   
    
</body>