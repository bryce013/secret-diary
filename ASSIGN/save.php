<?php

session_start();
$conn = new mysqli("localhost", "root", "", "text");


if(isset($_POST['submit']))
{    
    $name = $_POST['Name'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];	
	$sql = "SELECT * FROM logins WHERE email = '$email'";
	$result = $conn->query($sql);
	if(mysqli_num_rows($result))
	{
		echo "This email already exits, Redirecting to main page in 5 seconds......";
		header("Refresh:5; url=index.html");
	}
	else
	{
		
		$sql = "INSERT INTO logins(name, email, password) 
				VALUES ('$name', '$email', '$password')";
		mysqli_query($conn, $sql);
        $_SESSION["loggedin"] = true;
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;        
        header("location:diary.php");
	}
}
	
?>