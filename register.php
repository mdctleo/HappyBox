<?php

$email = $username = $password = "";

if($_POST['registerForm'] == "Register"){
    $email = $_POST['formEmail'];
    $username = $_POST['formUsername'];
    $password = $_POST['formPassword'];
}

$password = password_hash('$password', PASSWORD_DEFAULT);

$servername = "localhost";
$serverUsername = "root";
$serverPassword = "";
$dbname = "HappyBox";

//Create connection
$conn = new mysqli($servername, $serverUsername, $serverPassword, $dbname);

// Check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
$userID = $conn->insert_id;

$sql = "INSERT INTO Users (UserID, Email, UserName, Password, Privilege)
VALUES ($userID, '$email', '$username', '$password', 0)";

if ($conn->query($sql) === TRUE){
	$conn->close();
  	header('Location: login.html');
}   else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	$conn->close();
}

$conn->close();








?>