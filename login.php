<?php
session_start();

if($_POST['loginForm'] == "Log In"){
    $_SESSION['credential'] = $_POST['formUsername'];
    $_SESSION['password'] = $_POST['formPassword'];
}


$servername = "localhost";
$serverUsername = "root";
$serverPassword = "";
$dbname = "HappyBox";
$username = $_SESSION["credential"];
$password = $_SESSION["password"];

// Create connection
$conn = new mysqli($servername, $serverUsername, $serverPassword, $dbname);
// Check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT UserID ,UserName, Password FROM Users  WHERE UserName 
											  Like  '$username'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (password_verify('$password', $row['Password'])){
	   echo "Logged on!";
	  header('Location: http://localhost/HappyBox/landing.php');
	  $_SESSION['ID'] = $row["UserID"];
	   die();
	
}else 
	echo "Incorrect Username and Password combination";
	



    





$conn->close();

?>

