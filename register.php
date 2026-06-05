<?php
include "db.php";
session_start();

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $sql = "INSERT INTO users (username, password, email) 
            VALUES ('$username', '$password', '$email')";

    if (mysqli_query($conn, $sql)) {

        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["user_id"] = mysqli_insert_id($conn);
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Error: " . mysqli_error($conn);
        $message_type = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Quiz Platform</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>
    <form method="POST" action="">
        <h2>REGISTER PAGE</h2>
        <label>USERNAME:</label>
        <input type="text" name="username"
            value=""
            placeholder="Choose a username" required>

        <label>PASSWORD:</label>
        <input type="password" name="password"
            placeholder="Enter a strong password" required>

        <label>EMAIL:</label>
        <input type="email" name="email"
            value=""
            placeholder="Enter your email" required>

        <button type="submit" name="submit">REGISTER</button>

        <p>Already have an account? <a href="login.php">LOGIN</a></p>
    </form>
</body>

</html>