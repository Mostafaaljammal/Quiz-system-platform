<?php
session_start();


if(isset($_SESSION['user_id'])){
    header("Location: dashboard.php");
}
?>

<link rel="stylesheet" href="index.css">

<div style="text-align: center;">

    <h1>🎯 Quiz System Platform</h1>
    <p>Test your knowledge with our interactive quizzes!</p>

    <a href="login.php"><button>🔐 Login</button></a>
    &nbsp;
    <a href="register.php"><button>📝 Register</button></a>

</div>


