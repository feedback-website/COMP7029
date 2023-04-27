<?php 
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['username'])) {
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Evaluation Survey</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <div class="container"></div>
</head>
<body>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['ID']) && isset($_SESSION['username'])) {
  $studentId = $_SESSION['username'];
  $question1 = $_POST['q1'];
  $question2 = $_POST['q2'];
  $question3 = $_POST['q3'];
  $question4 = $_POST['q4'];
  $question5 = $_POST['q5'];
  $question6 = $_POST['q6'];
  $question7 = $_POST['q7'];
  $suggestions = $_POST['suggestions'];

  include "conn_student.php";

  $sql = "INSERT INTO survey_responses (username, question1, question2, question3, question4, question5, question6, question7, suggestions) 
        VALUES ('$studentId', '$question1', '$question2', '$question3', '$question4', '$question5', '$question6', '$question7', '$suggestions')";

  if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Thank you for your response!");</script>';
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  mysqli_close($conn);
} else {
  header("Location: index.php");
  exit();
}
?>


<div class = "logout">    
<a href="logout.php">Logout</a>
</div>

<div class="thank-you">
<h1>Hello, <?php echo $_SESSION['username']; ?> Thank you for response!</h1>
</div>

</body>
</html>

<?php 
}else{
    header("Location: index.php");
    exit();
}
?>
