<?php
include("functions.php");

// Check if the user is already logged in, if yes, redirect them to the admin folder
if(isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] === true){
    header("location: admin/");
    exit;
}

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = escape($_POST["username"]);
    $password = escape($_POST["password"]);

    $admin_username = "admin";
    $admin_password = "admin123";

    if($username === $admin_username && $password === $admin_password){
        $_SESSION["admin_logged_in"] = true;
        $_SESSION["admin_username"] = $username;
        
        $session_expire = time() + (1 * 60);
        setcookie(session_name(), session_id(), $session_expire, "/");
        
        // Redirect to the admin folder
        header("location: /funolympic/admin");
        exit;
    } else {
        $error_message = "Invalid username or password.";
    }
}

// Check if the session cookie has expired, if yes, destroy the session
if(isset($_COOKIE[session_name()]) && !isset($_SESSION["admin_logged_in"])) {
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://img.freepik.com/premium-photo/olympic-games-sports-background-with-copy-space-text_1008415-2373.jpg'); /* Add your background image URL here */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Soft shadow */
            width: 300px;
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff; /* Blue button color */
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>