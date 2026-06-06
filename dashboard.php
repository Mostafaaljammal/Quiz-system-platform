<?php
session_start();


if(!isset($_SESSION['user_id'])){

    if(isset($_COOKIE['user_id'])){
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['username'] = $_COOKIE['username'];
    }
}


if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/dashboard.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>📚 Quiz Dashboard</h2>
            <div class="user">
                Welcome, <b><?php echo $_SESSION["username"]; ?></b><br>
                <a class="logout" href="logout.php">Logout</a>
            </div>
        </div>

        <div class="grid">
            <div class="card">
                <h3>Web Development</h3>
                <p>HTML, CSS, php basics.</p>
                <p>⏱ 15 mins | ❓ 10 questions</p>
                <a class="start" href="quiz.php">start quiz</a>
            </div>
            <div class="card">
                <h3>General Knowledge</h3>
                <p>Test your general knowledge.</p>
                <p>⏱ 10 mins | ❓ 10 questions</p>
                <a class="start" href="soon.php">soon</a>
            </div>

            <div class="card">
                <h3>Python Basics</h3>
                <p>Python fundamentals.</p>
                <p>⏱ 12 mins | ❓ 10 questions</p>
                <a class="start" href="soon.php">soon</a>
            </div>
            <div class="card">
                <h3>AI</h3>
                <p>AI-related questions.</p>
                <p>⏱ 12 mins | ❓ 10 questions</p>
                <a class="start" href="soon.php">soon</a>
            </div>
            <div class="card">
                <h3>🧠 Smart SQL Trainer</h3>
                <p>Practice SQL queries with adaptive AI difficulty.</p>
                <p>⏱ 8–12 mins | ❓ 10 Queries</p>
                <a class="start" href="soon.php">soon</a>
            </div>
            <div class="card">
                <h3>C programming </h3>
                <p>Test your C programming skills.</p>
                <p>⏱ 10 mins | ❓ 10 questions</p>
                <a class="start" href="soon.php">soon</a>
            </div>
            <div class="card">
                <h3>Java Basics</h3>
                <p>Java fundamentals.  test</p> <br
                <p>⏱ 12 mins |
                     ❓ 10 questions</p>
                <a class="start" href="soon.php">soon</a>
            </div>
            <div class="card">
                <h3>Data Science</h3>
                <p>Data science concepts and tools.</p>
                <p>⏱ 15 mins | ❓ 10 questions</p>
                <a class="start" href="soon.php">soon</a>
            </div>
        </div>

    </div>

</body>

</html>