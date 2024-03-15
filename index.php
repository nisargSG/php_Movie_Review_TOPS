<?php
include 'dbConfig.php';
include 'checkUserAuth.php';


if(isset($_COOKIE["userId"])){
    header("Location:dashboard.php");
}

?>

<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index.css">

    <title>My Web</title>
</head>

<body>

    <?php

    $showError = false;


    if($_SERVER['REQUEST_METHOD']=="POST"){

        if($_POST["email"] && $_POST["password"]){

            $email=$_POST["email"];
            $password=$_POST["password"];


            $sql = "SELECT * FROM user where email='$email' AND password='$password'";
            $result = $dbConn->query($sql);
            if($result->num_rows>0){

                $row = $result->fetch_assoc();

                setcookie("userId",$row['id'],time() + (86400 * 30));

                header("Location:dashboard.php");
            }
            else{
                $showError=true;
            }
        }
        else{
            echo("Failed");
            die();
        }

    }

    ?>


    <div class="jumbotron">
        <h1>My Website</h1>
        <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing
            responsive, mobile-first projects on the web.</p>
    </div>

    <div class="container card container_login">

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="LABEL_USER_EMAIL">Email:</label>
                <input name="email" type="text" class="form-control" id="LABEL_USER_EMAIL">
            </div>
            <div class="form-group">
                <label for="LABEL_USER_PASSWORD">Password:</label>
                <input name="password" type="password" class="form-control" id="LABEL_USER_PASSWORD">
            </div>

            <div class="form-group text_align_center">
                <input type="submit" class="btn btn-info">
                <a href="signup.php" class="btn btn-secondary">Signup</a>

            </div>

            <?php

            if ($showError == true) { ?>

                <div class="alert alert-danger">
                    <strong>Failed!</strong> In Correct Credentials
                </div>

            <?php
            }

            ?>





        </form>

    </div>



</body>


</html>