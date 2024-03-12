<?php
include 'dbConfig.php';
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

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if ($_POST["name"] && $_POST["email"] && $_POST["password"]) {

            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];


            $sql = "INSERT INTO user(name,email,password) VALUES('$name','$email','$password')";

            if(!($dbConn->query($sql)===TRUE)){
                $showError=true;
            }

        } else {
            die("Missing Parameters");
        }
    }

    ?>


    <div class="jumbotron">
        <h1>Create Your Account</h1>
        <p>We need some of your information to create your account</p>
    </div>

    <div class="container card container_login">

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="LABEL_USER_NAME">Name:</label>
                <input name="name" type="text" class="form-control" id="LABEL_USER_NAME">
            </div>

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
            </div>

            <?php

            if ($showError == true) { ?>

                <div class="alert alert-danger">
                    <strong>Failed!</strong> Already Exist , Try to login
                </div>

            <?php
            }

            ?>





        </form>

    </div>



</body>


</html>