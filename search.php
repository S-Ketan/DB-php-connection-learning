<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usersearch = $_POST['usersearch'];


    try {
        require_once 'includes/dbh.inc.php';
        $query = "SELECT * from comments WHERE username=:usersearch;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":usersearch", $usersearch);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
        ;
    }

} else {
    header("Location: ../index.php");
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section>


        <h3>Search Results</h3>

        <?php
        if (empty($result)) {
            echo "<div>";
            echo "<p>No results found</p>";
            echo "</div>";
        } else {

            foreach ($result as $row) {
                echo "<div>";
                echo "<h4>".htmlspecialchars($row['username'])."</h4>";
                echo "<p>".htmlspecialchars($row['comment_text'])."</p>";
                echo "<p>".htmlspecialchars($row['created_at'])."</p>";
                echo "</div>";
            }
        }
        ?>


        <a href="index.php">Back</a>

    </section>
</body>

</html>