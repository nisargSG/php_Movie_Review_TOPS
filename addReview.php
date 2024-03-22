<?php

include "dbConfig.php";

include "checkUserAuth.php";

checkUserAuth();

$movieId=null;
$showError = false;

if($_GET["movieId"]){
    $movieId=$_GET["movieId"];
}
else{
    header("Location:dashboard.php");
}

?>

<?php
     if($_SERVER['REQUEST_METHOD']=="POST"){

        //receieve rating and review

        if($_POST["movie_id"] && $_POST["rating"] && $_POST["review"]){
            //insert

            $movieId=$_POST["movie_id"];
            $rating = $_POST["rating"];
            $review = $_POST["review"];

            $sql = "INSERT INTO review(movie_id,user_id,rating,comment) VALUES('$movieId','$userId','$rating','$review')";
            if(!($dbConn->query($sql)===TRUE)){
                $showError=true;
            }
            else{
                header("Location:dashboard.php");
            }


        }


     }


?>


<html>

    <head>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/addReview.css">

    </head>

    <body>
        <?php

            $sql = "SELECT * FROM movies WHERE id='$movieId'";
            $moviesResult = $dbConn->query($sql);
            $movieRow = $moviesResult->fetch_assoc();

        ?>

        <div class="jumbotron">
            
            <h2 class="company_name"><?= "Hello ".$_SESSION["name"]  ?></h2>
            <div class="row">

                <div class="col-lg-6 ">
                    <img class="img_movie" src="assets/img/img_movies/<?php echo($movieRow["image"])  ?>" />
                </div>
                <div class="col-lg-6">
                    <h3><?php echo($movieRow["title"]) ?></h3>
                    <p><b><?php echo($movieRow["release_date"]) ?></b></p>
                    <p><?php echo($movieRow["description"]) ?></p>
                    <hr/>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="hidden" name="movie_id" value="<?php echo($movieId) ?>"/>
                        <div class="form-group">
                            <label for="ratings_dropdown">Select Ratings:</label>
                            <select name="rating" id="ratings_dropdown">
                                <option value="1">1/5</option>
                                <option value="2">2/5</option>
                                <option value="3">3/5</option>
                                <option value="4">4/5</option>
                                <option value="5">5/5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="review">Add Your Review</label>
                            <textarea name="review" class="form-control" rows="5" id="review" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Post My Review</button> 
                        <a href="dashboard.php" class="btn btn-danger">Cancel</a> 

                    </form>


                    <?php

                    if ($showError == true) { ?>

                    <div class="alert alert-danger">
                        <strong>Failed!</strong> Couldn't Save Your Review , Please Try Again
                    </div>

                    <?php
                        }

                    ?>


                    
                </div>

            </div>

        </div>


    </body>


</html>