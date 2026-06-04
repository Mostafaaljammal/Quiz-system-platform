<?php
include "db.php";

$result = mysqli_query($conn, "SELECT id, question, option_a, option_b, option_c, option_d FROM questions");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz System</title>
    <link rel="stylesheet" href="quiz.css">
</head>
<body>

<h1>Welcome to the Quiz</h1>

<form action="result.php" method="POST">

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <div class="question">
            <h3><?php echo htmlspecialchars($row['question']); ?></h3>

            <label>
                <input type="radio" name="answer[<?php echo $row['id']; ?>]" value="A">
                <?php echo htmlspecialchars($row['option_a']); ?>
            </label><br>

            <label>
                <input type="radio" name="answer[<?php echo $row['id']; ?>]" value="B">
                <?php echo htmlspecialchars($row['option_b']); ?>
            </label><br>

            <label>
                <input type="radio" name="answer[<?php echo $row['id']; ?>]" value="C">
                <?php echo htmlspecialchars($row['option_c']); ?>
            </label><br>

            <label>
                <input type="radio" name="answer[<?php echo $row['id']; ?>]" value="D">
                <?php echo htmlspecialchars($row['option_d']); ?>
            </label>

            <hr>
        </div>

    <?php } ?>

    <button type="submit" name="submit">Submit Quiz</button>
</form>

</body>
</html>