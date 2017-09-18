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

if($_POST['loginForm'] == "Log In"){
    $username = $_POST['formUsername'];
    $password = $_POST['formPassword'];
	
	SignIn();
}


// Create connection
$conn = new mysqli($servername, $serverUsername, $serverPassword, $dbname);
// Check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

<<<<<<< HEAD:login2.php
$userID = $conn->insert_id;
=======
>>>>>>> f5d98ae9b7f2d0cae725d96414eed8921ebdc8a1:login.php


$sql = "SELECT UserID ,UserName, Password FROM Users  WHERE UserName 
											  Like  '$username'
											  AND  Password
											  Like '$password'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($result->num_rows > 0){
       
	   echo "Logged on!";
	  header('Location: http://localhost/HappyBox/landing.php');
	  $_SESSION['ID'] = $row["UserID"];
	   die();
	
<<<<<<< HEAD:login2.php
?>
=======
}else 
	echo "Incorrect Username and Password combination";



    





$conn->close();

?>

>>>>>>> f5d98ae9b7f2d0cae725d96414eed8921ebdc8a1:login.php
