<?php 

session_start(); 

include "conn_student.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['username']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

}   else{


        $sql = "SELECT * FROM student_login WHERE student_id='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['student_id'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['student_id'] = $row['student_id'];

                $_SESSION['ID'] = $row['ID'];

	header("Location: home.php");

                exit();
	
    

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }
}

}else{

    header("Location: index.php");

    exit();

}