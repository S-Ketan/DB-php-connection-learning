<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    try {
        require_once 'dbh.inc.php';
        $query = "UPDATE users SET username =:username, pwd = :pwd WHERE email = :email;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->bindParam("email", $email);

        $stmt -> execute();
        header("Location: ../index.php");
        exit();

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
        ;
    }

} else {
    header("Location: ../index.php");
}