<?php 

session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['student_id'])) {

 ?>


<!DOCTYPE html>

<html>

<head>
     
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Module Evaluation Survey</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="styles.css">

</head>

<body>

     <h1>Hello, <?php echo $_SESSION['student_id']; ?></h1>
     
    <a href="logout.php">Logout</a>
    <div class="container"></div>
    <script src="script.js"></script>
     

</body>

</html>

<?php 

}else{

     header("Location: index.php");

     exit();


}
 ?>