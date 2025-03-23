<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
   
    
 
    try {
        require_once 'dbh.inc.php';

        $query = "SELECT pwd FROM users WHERE username = :username;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($pwd, $user["pwd"])) {

            
            $query = "DELETE FROM users WHERE username = :username";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":username", $username);
            
            
            $stmt -> execute();
            echo"User deleted";
            exit();
        } else {
            echo "Wrong password";
            exit();
        }

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
        ;
    }

} else {
    header("Location: ../index.php");
}