<?php 

//make sure user entered data via the correct method (via the form and not the url panel)
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    
    try{
        require_once "./dbh.inc.php";
        
        $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";

        //send data to database
        //named parameters
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->bindParam(":email", $email);
        $stmt -> execute();

        //positional parameters:
        //$query = "INSERT INTO users (username, pwd, email) VALUES (?, ?, ?);";
        //$stmt -> execute([$username, $pwd, $email]);


        //send user back to the homepage once data has been submitted
        header("Location: ../index.php");

        //close down database connection
        $pdo = null;
        $stmt = null;
        die();
    }catch(PDOException $e){
        echo "Query failed: " .$e->getMessage();
    }
} else {
    //if user accessed this page through illegitimate means then reroute back to index.php
    header("Location: ../index.php");
}