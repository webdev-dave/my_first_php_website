<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1st PHP Site</title>
</head>

<body>
    <?php
        echo $_SERVER["DOCUMENT_ROOT"];
        echo "<br>";
        echo $_SERVER["REQUEST_METHOD"];
        echo "<br>";
        echo $_FILES["name"];
    ?>

</body>

</html>