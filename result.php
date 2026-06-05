<?php
// Student answers + Database answers
//         ↓
//      Compare
//         ↓
//    Correct count
//         ↓
//       Score %
include "db.php";

if (!isset($_POST['submit'])) {
    header("Location: quiz.php");
    exit();
}

$answers = $_POST['answer'] ?? [];

$sql="SELECT id, question_text, correct_answer FROM questions";
$result = mysqli_query($conn, $sql);

$total = 0;
$correct = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $total++;

    $qid = $row['id'];
    $userAnswer = $answers[$qid] ?? null;

    if ($userAnswer === $row['correct_answer']) {
        $correct++;
    }
}

$score = ($total > 0) ? round(($correct / $total) * 100) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <link rel="stylesheet" href="assets/result.css">
</head>
<body>

<form style="max-width: 450px; margin:auto;">

    <h2>Quiz Result</h2>

    <?php if ($score >= 60): ?>
        <div class="alert alert-success">
            ✅ You passed! Great job!
        </div>
    <?php else: ?>
        <div class="alert alert-error">
            ❌ You failed. Keep practicing!
        </div>
    <?php endif; ?>

    <label>Correct Answers</label>
    <input type="text" value="<?php echo $correct; ?> / <?php echo $total; ?>" readonly>

    <label>Your Score</label>
    <input type="text" value="<?php echo $score; ?>%" readonly>
    <a href="quiz.php">
        <button type="button">↺ Retake Quiz</button>
    </a>
 <div class="links"> 
    <p><a href="index.php">← Back to Home</a></p>
       <a class="logout" href="logout.php"> <--Logout</a>
       </div>
</form>

</body>
</html>