<?php
include "dbConfig.php";

include "checkUserAuth.php";

checkUserAuth();

?>

<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">

</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <h2 class="company_name">Compnay Name</h2>

        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>

    </nav>

    <div class="container">

        <?php
            
            $sql = "SELECT * FROM movies";
            $moviesResult = $dbConn->query($sql);

        if ($moviesResult->num_rows > 0) { ?>
            <div class="container p-3">
                <div class="row">
                    
                    <?php while ($movieRow = $moviesResult->fetch_assoc()) { ?>

                        <div class="col-md-5 p-3">
                            <div class="card" style="width:400px">
                                <img class="card-img-top img_movie" src="<?php echo "assets/img/img_movies/" .
                                    $movieRow["image"]; ?>" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $movieRow[
                                        "title"
                                    ]; ?></h4>
                                    <p class="card-text"><?php echo $movieRow[
                                        "description"
                                    ]; ?></p>

                                    
                                    <?php 
                                    $movieId = $movieRow["id"];
                                    $sql = "SELECT * FROM `review` where user_id='$userId' and movie_id='$movieId'";
                                    $result = $dbConn->query($sql);
                                    if ($result->num_rows == 0) {?>
                                        <a href="<?php echo("addReview.php?movieId=".$movieId)  ?>" class="btn btn-primary">Post Your Reviews</a>

                                    <?php
                                    }
                                    else{
                                        ?>
                                        <a href="#" class="btn btn-warning">Edit Your Reviews</a>
                                    <?php
                                    }
                                    ?>

                                    
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                        ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="alert alert-warning">
                <strong>Failed !</strong> No Movies Found
            </div>

        <?php 
        }
   
        ?>

    </div>


</body>

</html>