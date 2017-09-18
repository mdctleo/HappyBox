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

$userID = $_SESSION["ID"];

$itemID = $_POST['addBox'];


echo $userID . "\n";
echo $itemID . "\n";


$sql = "IF (NOT (EXISTS(SELECT 1 FROM Possession WHERE (UserID = $userID) AND (ItemID = $itemID))))
	INSERT INTO Possession (UserID, ItemID) VALUES ($userID, $itemID)
	END IF";
if($conn->query($sql)){
	echo "Added!";
}else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();




?>	