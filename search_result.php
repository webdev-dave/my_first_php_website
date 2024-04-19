<?php

//make sure user entered data via the correct method (via the form and not the url panel)
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $usersearch = $_POST["usersearch"];

    
    try{
        require_once "./includes/dbh.inc.php";
        
        $query = "SELECT * FROM comments WHERE username = :usersearch;";

        //send data to database
        //named parameters
        //prepare statement
        $stmt = $pdo->prepare($query);
        //bind name parameters
        $stmt->bindParam(":usersearch", $usersearch);
        $stmt -> execute();

        //fetch all results returned from the database in an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        //close down database connection
        $pdo = null;
        $stmt = null;
    }catch(PDOException $e){
        echo "Query failed: " .$e->getMessage();
    }
} else {
    //if user accessed this page through illegitimate means then reroute back to index.php
    header("Location: ../index.php");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Document</title>
</head>
<body>
    <h3>Search Results: </h3>
    <?php
        if(empty($results)){
           echo "<div>";
           echo "<p>No results!</p>";
           echo "<div/>"; 
        } else {
            foreach($results as $row){
                echo "<div class='search-result'>";
                echo "<h4>" . htmlspecialchars($row["username"]) . "</h4>";
                echo "<p>" . htmlspecialchars($row["comment_text"]) . "</p>";
                echo "<p>" . htmlspecialchars($row["created_at"]) . "</p>";
                echo "</div>";
            }

        }
    ?>
</body>
</html>