<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "student_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {

    echo "Connection failed!";

}



?>