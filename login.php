<?php 

//connect to database
$host="localhost";
$user="root";
$pass="";
$db="form";
$conn=mysqli_connect($host,$user,$pass,$db);

// Check if the form was submitted
if (isset($_POST['login'])) {
	// Get the email and password from the form
	$email=$_POST['email'];
	$password=$_POST['password'];

	// Query the database to find the user with the given email
	$result=mysqli_query($conn, "SELECT * FROM data WHERE email='$email' ");

	// Check if there is a row in the result
	if (mysqli_num_rows($result) == 1) {
		// Get the user's data from the row
		$row = mysqli_fetch_assoc($result);

		// Verify the password using password_verify()
		if (password_verify($password, $row['password'])) {
			// Password is correct
			// Start a session and redirect the user to the homepage
			session_start();
			$_SESSION['user_id'] = $row['id'];
			header('Location: welcome.php');
			exit();
		} else {
			// Password is incorrect
			// Show an error message
			echo "Invalid password";
		}
	} else {
		// No user with that email was found
		// Show an error message
		echo "Invalid email ";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title></title>
</head>
<body>
<form action="" method="post">
	<h1>Login </h1>
   <input type="email" name="email" placeholder="Enter Email">
   <input type="password" name="password" placeholder="Enter password">
   <input type="submit" name="login" value="Login">
  <a href="index.php"><p>Go to signup</p></a> 
 </form
</body>
</html>

