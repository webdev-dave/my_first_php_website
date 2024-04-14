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

    $result = match($a){
        1 => "Variable a is equal to one!",
        2,3,4,5 => "Variable a is equal to two, or three, or four, or five!",
        //default output
        default => "None were a match",
    };
    echo $result;


    // switch($a) {
    //     case 0:
    //         echo "a equals 0";
    //         break;
    //     case 1:
    //         echo "a equals 1";
    //         break;
    //     case 2:
    //         echo "a equals 2";
    //         break;
    //     default: 
    //     echo "None of the conditions were true";
    // }

 

    // if($a < $b && !$bool){
    //     echo "First condition is true!";
    // } else if ($a < $b && $bool){
    //     echo "Second condition is true!";
    // }
    ?>

</body>

</html>