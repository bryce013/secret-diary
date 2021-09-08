<?php

$conn = new mysqli("localhost", "root", "", "text");

session_start();
$username = $_POST['Email'];
$password = $_POST['Password'];

$username = stripcslashes($username);
$password = stripcslashes($password);



$sql = "SELECT * FROM logins WHERE email = '$username' AND password='$password'";
$result = $conn->query($sql);

if($result -> num_rows > 0)
{
    if($conn->query($sql) == TRUE)
    {
        while($row = $result -> fetch_assoc())
        {
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $row['email'];
            $_SESSION["name"] = $row['name'];   
            header("location: diary.php");
        }
    }
    else
    {
        echo "Error" .$new.$conn->error;
    }
    
}
else
{
        echo 'Username or password is incorrect<br> <a href="login.html">Go back to put valid credentials</a>';
    
}

?>