<?php

session_start();

$db = mysqli_connect('localhost','root','','tictechtoe');

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$myusername = mysqli_real_escape_string($db,$_POST['pusername']);
    $mypassword = mysqli_real_escape_string($db,$_POST['ppass']); 
      
    $sql = "SELECT * FROM parent_login WHERE par_id = '$myusername' and par_pass = '$mypassword'";
    $result = mysqli_query($db,$sql);
    
    $count = mysqli_num_rows($result);
      
		
    if($count == 1) {
    	$_SESSION['login_user'] = $myusername;
        header("location: login_success/parent_dashboard.php");
    }
    else {
        $error = "Your Parent Login Id or Password is invalid";
        $_SESSION['perror'] = $error;
        header("location: index.php");
    }
}


?>