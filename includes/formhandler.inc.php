<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    try {
        require_once 'dbh.inc.php';
        $query = "INSERT INTO users (username, email, pwd) VALUES (:username, :email, :pwd);";
        $stmt = $pdo->prepare($query);

        $options = [
            'cost' => 12,
        ];

        $hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
        
        $stmt->bindParam(':pwd', $hashedpwd);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
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