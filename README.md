# User Management System

This project is a simple PHP-based user management system that allows users to sign up, update their information, delete their accounts, and search for users in the database. It uses a MySQL database for data storage and PDO for database interactions.

## Features

- **Signup**: Create an account by providing a username, email, and password.
- **Update**: Update username and password using email as an identifier.
- **Delete**: Delete an account by providing username and password.
- **Search**: Search for other users by their username.

## Project Structure

```
index.php
README.md
search.php
css/
    main.css
    reset.css
includes/
    dbh.inc.php
    formhandler.inc.php
    userDelete.inc.php
    userUpdate.inc.php
```

### File Descriptions

- **`index.php`**: Main page with forms for signup, update, delete, and search functionalities.
- **`search.php`**: Handles user search functionality and displays search results.
- **`css/main.css`**: Main styling for the application.
- **`css/reset.css`**: Resets default browser styles for consistency.
- **`includes/dbh.inc.php`**: Establishes a connection to the MySQL database using PDO.
- **`includes/formhandler.inc.php`**: Handles user signup and inserts new user data into the database.
- **`includes/userDelete.inc.php`**: Handles account deletion based on username and password.
- **`includes/userUpdate.inc.php`**: Handles updating user information based on email.

## Database Setup

The project assumes a MySQL database named `myfirstdatabase` with the following tables:

### `users` Table

| Column      | Type                        | Description                       |
|-------------|-----------------------------|-----------------------------------|
| `id`        | INT (Primary Key, Auto Increment) | Unique identifier for each user. |
| `username`  | VARCHAR(255)                | The username of the user.         |
| `email`     | VARCHAR(255)                | The email of the user.            |
| `pwd`       | VARCHAR(255)                | The hashed password of the user.  |

### `comments` Table (for search functionality)

| Column        | Type                        | Description                       |
|---------------|-----------------------------|-----------------------------------|
| `id`          | INT (Primary Key, Auto Increment) | Unique identifier for each comment. |
| `username`    | VARCHAR(255)                | The username of the commenter.    |
| `comment_text`| TEXT                        | The comment text.                 |
| `created_at`  | DATETIME                    | The timestamp of the comment.     |

## How to Run

1. Clone the repository or download the project files.
2. Set up a MySQL database and create the required tables (`users` and `comments`).
3. Update the database credentials in `includes/dbh.inc.php`:
     ```php
     $dsn = 'mysql:host=localhost;dbname=myfirstdatabase';
     $dbusername = 'root';
     $dbpassword = '';
     ```
4. Place the project files in your web server's root directory (e.g., `htdocs` for XAMPP).
5. Start your web server and navigate to `http://localhost/DbConnection/index.php`.

## Security Notes

- Passwords are hashed using `password_hash` with the `PASSWORD_BCRYPT` algorithm for secure storage.
- User inputs are sanitized using prepared statements to prevent SQL injection.