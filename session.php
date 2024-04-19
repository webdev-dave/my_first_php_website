<?php
//learning how to create sessions
session_start();

$_SESSION["username"] = "Krossing";

//unset SESSION var
//unset($_SESSION["username"]);

//remove ALL SESSION data/vars
//session_unset();

//stop/destroy session (this only take affect for other pages. Data will still exist in current page)
session_destroy();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo $_SESSION["username"];
    ?>
</body>

</html>