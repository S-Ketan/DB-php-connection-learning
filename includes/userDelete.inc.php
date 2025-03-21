<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    try {
        require_once 'dbh.inc.php';
        $query = "INSERT INTO users (username, email, pwd) VALUES (?, ?, ?);";
        $stmt = $pdo->prepare($query);

        $stmt -> execute([$username, $email, $pwd]);
        header("Location: ../index.php");
        exit();

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
        ;
    }

} else {
    header("Location: ../index.php");
}