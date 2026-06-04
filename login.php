<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Quiz Platform</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    include "db.php";
    session_start();
    $message = '';
    $message_type = '';

    if (isset($_POST["submit"])) {

        $username = $_POST["name"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        $sql = "SELECT * FROM users 
                WHERE username='$username' 
                AND password='$password' 
                AND email='$email'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $message = "Login successful! Redirecting...";
            $message_type = "success";
            header("refresh:2;url=dashboard.php");
        } else {
            $message = "Invalid username, password, or email";
            $message_type = "error";
        }
    }
    ?>

    <form method="POST" action="dashboard.php">
        <h2>LOGIN PAGE</h2>

        <?php if ($message): ?>
            <div class="alert alert-<?php echo $message_type; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <label>USERNAME:</label>
        <input type="text" name="name" placeholder="Enter your username" required>

        <label>PASSWORD:</label>
        <input type="password" name="password" placeholder="Enter your password" required>

        <label>EMAIL:</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <button type="submit" name="submit">LOGIN</button>
        <p>Don't have an account? <a href="register.php">REGISTER</a></p>
    </form>
</body>
</html>