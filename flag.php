<?php
session_start();

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


$itemID = $_POST['flag'];

echo $itemID;

$sql = "UPDATE UserItems
	SET status = 1 WHERE ItemID = $itemID";
$conn->query($sql);

$conn->close();




?>