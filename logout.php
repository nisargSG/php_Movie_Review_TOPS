<?php
    //expire cookie
    setcookie("userId","", time() - 3600);
    //seession remove as well
    session_destroy();
    //redirect
    header("Location:index.php");
?>