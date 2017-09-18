<?php

$servername = "localhost";
$serverUsername = "root";
$serverPassword = "";
$dbname = "HappyBox";

//Create connection
$conn = new mysqli($servername, $serverUsername, $serverPassword, $dbname);

// Check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);

$userID = $_SESSION["ID"];

$itemID = $_POST['flag'];

$sql = "SELECT * FROM Users WHERE UserID = $userID AND Privilege = 1;

IF @@ROWCOUNT > 0
    UPDATE UserItems
	SET status	= 0 WHERE ItemID = $itemID";
	
$conn->query($sql);

$conn->close();
	
?>