<?php
session_start();


if($_POST['submitForm'] == "Add to My List"){
   $ItemContent = $_POST["TextArea"]; }


if(isset($_POST['commBox']) && $_POST['commBox'] == 'yes'){
	   $community = 1;
   }else{
	   $community = 0;
   
}


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

$itemBy = $_SESSION['ID'];
$itemByName = $_SESSION['credential'];

$sql = "INSERT INTO UserItems (ItemContent, ItemBy, ItemByName, status, CommBox)
VALUES ('$ItemContent', '$itemBy', '$itemByName', 0, '$community')";

$conn->query($sql);

$itemID = $conn->insert_id;

$sql = "INSERT INTO Possession (UserID, ItemID)
		VALUES ('$itemBy','$itemID')";


if ($conn->query($sql) === TRUE){
	header('Location: landing.php');
}   else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}




$conn->close();	








?>