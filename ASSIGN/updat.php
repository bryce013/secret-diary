<?php


session_start();

if(array_key_exists('content', $_POST)){

	$link = new mysqli("localhost", "root", "", "text");
    $email = $_SESSION['email'];
	$query = "UPDATE logins SET texts = '".mysqli_real_escape_string($link,$_POST['content'])."' WHERE EMAIL = '$email'" ;

		if(mysqli_query($link,$query)){

			echo "success";
		}else{

			echo "fail";
		}


}


?>