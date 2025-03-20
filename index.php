<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <h3>Signup</h3>
    <form action="includes/formhandler.inc.php" method="POST">
        <input type="text" name="username" placeholder="Username" >
        <input type="password" name="pwd" placeholder="Password" >
        <input type="text" name="email" placeholder="Email">
        <button>Signup</button>
    </form>
</body>
</html>