<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1st PHP Site</title>
</head>

<body>
    <?php
    $bool = true;
    $a = 1;
    $b = 4;

    switch($a) {
        case 0:
            echo "a equals 0";
            break;
        case 1:
            echo "a equals 1";
            break;
        case 2:
            echo "a equals 2";
            break;
        default: 
        echo "None of the conditions were true";
    }

    ?>
    <br>
    <?php

    if($a < $b && !$bool){
        echo "First condition is true!";
    } else if ($a < $b && $bool){
        echo "Second condition is true!";
    }
    ?>

</body>

</html>