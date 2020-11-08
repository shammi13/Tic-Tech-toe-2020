<?php

session_start();

$db = mysqli_connect('localhost','root','','tictechtoe');

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$myusername = mysqli_real_escape_string($db,$_POST['susername']);
    $mypassword = mysqli_real_escape_string($db,$_POST['spass']); 
      
    $sql = "SELECT * FROM student_login WHERE s_id = '$myusername' and s_password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    
    $count = mysqli_num_rows($result);
      
		
    if($count == 1) {
    	$_SESSION['login_user'] = $myusername;
        header("location: login_success/student_dashboard.php");
    }
    else {
        $error = "Your Student Login Id or Password is invalid";
        $_SESSION['serror'] = $error;
        header("location: index.php");
    }
}


?>