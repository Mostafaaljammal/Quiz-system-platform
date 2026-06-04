<?php
include "db.php";
session_start();

$message = '';
$message_type = '';

$remembered_username = isset($_COOKIE["username"]) ? $_COOKIE["username"] : "";
$remembered_email = isset($_COOKIE["email"]) ? $_COOKIE["email"] : "";

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $sql = "INSERT INTO users (username, password, email) 
            VALUES ('$username', '$password', '$email')";

    if (mysqli_query($conn, $sql)) {

        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;

        if (isset($_POST["remember"])) {
            setcookie("username", $username, time() + (86400 * 30), "/");
            setcookie("email", $email, time() + (86400 * 30), "/");
        } else {
            setcookie("username", "", time() - 3600, "/");
            setcookie("email", "", time() - 3600, "/");
        }

        $message = "Account created successfully! Redirecting...";
        $message_type = "success";

        header("refresh:2; url=dashboard.php");
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
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <form method="POST" action="">
        <h2>REGISTER PAGE</h2>

        <?php if ($message): ?>
            <div class="alert alert-<?php echo $message_type; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <label>USERNAME:</label>
        <input type="text" name="username"
            value="<?php echo $remembered_username; ?>"
            placeholder="Choose a username" required>

        <label>PASSWORD:</label>
        <input type="password" name="password"
            placeholder="Enter a strong password" required>

        <label>EMAIL:</label>
        <input type="email" name="email"
            value="<?php echo $remembered_email; ?>"
            placeholder="Enter your email" required>

        <div class="remember-container">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>
        </div>

        <button type="submit" name="submit">REGISTER</button>

        <p>Already have an account? <a href="login.php">LOGIN</a></p>
    </form>
</body>

</html>