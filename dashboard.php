<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("refresh:2; url=index.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("refresh:2; url=index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>📚 Quiz Dashboard</h2>
            <div class="user">
                Welcome, <b><?php echo $_SESSION["username"]; ?></b><br>
                <a class="logout" href="?logout=true">Logout</a>
            </div>
        </div>

        <div class="grid">
            <div class="card">
                <h3>Web Development</h3>
                <p>HTML, CSS, JS basics.</p>
                <p>⏱ 15 mins | ❓ 12 questions</p>
                <a class="start" href="quiz.php?id=2">start quiz</a>
            </div>
            <div class="card">
                <h3>General Knowledge</h3>
                <p>Test your general knowledge.</p>
                <p>⏱ 10 mins | ❓ 10 questions</p>
                <a class="start" href="quiz.php?id=1">soon</a>
            </div>

            <div class="card">
                <h3>Python Basics</h3>
                <p>Python fundamentals.</p>
                <p>⏱ 12 mins | ❓ 10 questions</p>
                <a class="start" href="quiz.php?id=3">soon</a>
            </div>

        </div>

    </div>

</body>

</html>