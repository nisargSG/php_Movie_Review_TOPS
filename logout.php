<?php
    //expire cookie
    setcookie("userId","", time() - 3600);
    //redirect
    header("Location:index.php");
?>