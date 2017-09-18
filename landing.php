<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Happy Box</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"><link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Happy Box</a>
    </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="landing.php">My Box</a></li>
        <li><a href="communityBox.php">Community Box</a></li>
        <li><a href="formPage.php">Add Item</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
    </div>
  </nav>


<?php

 $servername = "localhost";
  $serverUsername = "root";
  $serverPassword = "";
  $dbname = "HappyBox";

$conn = new mysqli($servername, $serverUsername, $serverPassword, $dbname);

if ($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}


if(isset($_SESSION["ID"]) && !empty($_SESSION["ID"])){
$userID = $_SESSION["ID"];}
else{
  header('Location: index.html');
  die();
}


$sql = "SELECT UserID, ItemID FROM Possession WHERE UserID Like '$userID'";
$result = $conn->query($sql);

echo "<br>";

while($row = $result->fetch_assoc()){

echo "<div class = 'listings'>";
  echo "<div class = 'main'>";
  $itemID = $row['ItemID'];

  $sql1 = "SELECT ItemID, ItemContent, ItemBy, ItemByName FROM UserItems WHERE ItemID Like '$itemID'";
  $resultUserItems = $conn->query($sql1);

   $rowUserItems = $resultUserItems->fetch_assoc();
  

   echo "<div class='panel-group'>";
        echo "<div class='panel panel-info'><div class='panel-body'>" . $rowUserItems["ItemContent"] . "</div>";

          echo "<div class='panel-footer'>" . "<b> Submitted by: " . "</b>" . $rowUserItems["ItemByName"] . "</div></div></div><br>";

      echo "</div></div>";
}


?>


</html>