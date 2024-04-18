<?php 

//make sure user entered data via the correct method (via the form and not the url panel)
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    
    try{
        require_once "./dbh.inc.php";
        $query = "DELETE FROM users WHERE username = :username AND pwd = :pwd;";

        //delete data from database using named parameters
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        $stmt -> execute();

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