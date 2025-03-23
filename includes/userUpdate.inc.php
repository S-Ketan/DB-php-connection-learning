<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $oldpwd = $_POST['oldpwd'];

    try {
        require_once 'dbh.inc.php';

        $query = "SELECT pwd FROM users WHERE email = :email;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($oldpwd, $user["pwd"])) {
            $query = "UPDATE users SET username =:username, pwd = :pwd WHERE email = :email;";
            $stmt = $pdo->prepare($query);

            $options=['cost'=>12];
            $hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":pwd", $hashedpwd);
            $stmt->bindParam("email", $email);

            $stmt->execute();
            echo "User updated";
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