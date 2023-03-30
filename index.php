<?php
//connect to database
session_start();
$host="localhost";
$user="root";
$pass="";
$db="form";
$conn=mysqli_connect($host,$user,$pass,$db);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email=$_POST['email'];
$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
  $result="INSERT INTO data (email, password) VALUES ('$email','$password')";
   mysqli_query($conn,$result);
}
else{
  echo "";
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles.css">
   <title>Password Encryption</title>
 </head>
 <body>
 <form action=""method="post">
  <h1>Sign Up form</h1>
   <input type="email" name="email"placeholder="Enter Email">
   <input type="password" name="password"placeholder="Enter password">
   <input title="click to sign up" type="submit" name="submit"value="Sign Up">
   <p>Have An account?<a href="login.php">click to login</a> </p>
 </form>
 </body>
 </html>
 