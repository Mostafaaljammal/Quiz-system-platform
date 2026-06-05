<?php
session_start();
if(isset($_SESSION['user_id'])){
    header("Location: dashboard.php");
    exit();
}

?>
<link rel="stylesheet" href="index.css">
<div style="text-align: center;">
<form action="" method="post"></form>
    <h1>🎯 Quiz System Platform</h1>
    <p>Test your knowledge with our interactive quizzes!</p>
   <div class="container"> 
    <a href="login.php" name="login" type="submit"><button>🔐 Login</button></a>
     <br><br>
    <a href="register.php"><button>📝 Register</button></a>
    
   </div>

</div>
</form>


