<?php
    // Initialize the session
    session_start();
    $message = "";
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.html");
        exit;
    }

    $link = new mysqli("localhost", "root", "", "text");
    $email = $_SESSION['email'];
    $sql = "SELECT texts FROM logins WHERE email='$email'";    
	$result = $link->query($sql);
	$row = mysqli_fetch_array($result);
	$message = $row['texts'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Your diary</title>
    <link rel="stylesheet" href="styles/styles.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </script>
</head>
<body>
    <div class="header">
        <a class="logo">Secret Diary</a>
        <div class="header-right">
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="bg">
        <div >
            <h1 style="color: grey; text-align : center;">Hi <?php echo htmlspecialchars($_SESSION["name"]); ?>, Welcome to your secret diary</h1>    
        </div>
        <div class="container">
            <textarea id="text">\<?php echo $message;  ?></textarea>
        </div>

    </div>
    <script type="text/javascript">
		
		$("#text").on("change paste keyup", function() {

 			  $.ajax({
				  method: "POST",
				  url: "updat.php",
				  data: { content: $("#text").val() }
				});

		});
    </script>
    
</body>
</html>