<?php
include "db.php";
session_start();

if(isset($_SESSION['user_id'])){
    header("Location: dashboard.php");
    exit();
}
$message = '';
$message_type = '';

$remembered_username = isset($_COOKIE["username"]) ? $_COOKIE["username"] : "";

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
        $row = mysqli_fetch_assoc($result);
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["email"] = $row["email"];
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";

        if (isset($_POST["remember"])) {
            setcookie("username", $username, time() + (86400 * 30), "/");
        } else {
            setcookie("username", "", time() - 3600, "/");
        }

        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Invalid username, password, or email";
        $message_type = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Quiz Platform</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>

    <form method="POST">
        <h2>LOGIN PAGE</h2>

        <?php if ($message): ?>
            <div class="alert<?php echo $message_type; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <label>USERNAME:</label>
        <input type="text" name="name" value="<?php echo $remembered_username; ?>" required>

        <label>PASSWORD:</label>
        <input type="password" name="password" required>

        <label>EMAIL:</label>
        <input type="email" name="email" required>
        <label>
            <div class="remember-container">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <button type="submit" name="submit">LOGIN</button>

            <p>Don't have an account? <a href="register.php">REGISTER</a></p>
    </form>

</body>

</html>