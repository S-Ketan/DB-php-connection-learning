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
    <h3>Change</h3>
    <form action="includes/userUpdate.inc.php" method="POST">
        <input type="text" name="username" placeholder=" New Username" >
        <input type="password" name="pwd" placeholder=" New Password" >
        <input type="text" name="email" placeholder="Email">
        <button>Update</button>
    </form>
    <h3>Delete</h3>
    <form action="includes/userDelete.inc.php" method="POST">
        <input type="text" name="username" placeholder="Username" >
        <input type="password" name="pwd" placeholder="Password" >
        
        <button>Delete</button>
    </form>
    <h3>Search</h3>
    <form action="search.php" method="post">
        <label for="search">Search for user:</label>
        <input type="text" name="usersearch" id="search" placeholder="Search for user">
        <button>Search</button>
    </form>
</body>
</html>