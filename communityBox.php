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
        <li><a href="landing.php">My Box</a></li>
        <li class="active"><a href="communityBox.php">Community Box</a></li>
        <li><a href="formPage.php">Add Item</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
    </div>
  </nav>

<div class = 'listings'>
<div class = 'main'>
    <div class="panel-group">
      <center>
      <div class="input-group" style="width:40%">
        <input type="text" class="form-control" placeholder="Search">
      
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
      </center>
</div>
</div>

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

$sql = "SELECT ItemID, ItemContent, ItemByName FROM UserItems WHERE CommBox LIKE 1";

$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
    echo "<div class='panel-group'>";
        echo "<div class='panel panel-info'><form method='post' action='flag.php'><div class='panel-body'>" . $row["ItemContent"] . "</div>";
          
          echo "<div class='panel-footer'>" . "<b> Submitted by: " . "</b>" . $row["ItemByName"] . "</div> . <button type='submit' class='btn btn-danger' formaction='flag.php' name='flag' style='height: 32px;width: 120px;' value=" . $row["ItemID"] . ">Inappropriate!</button><button type='submit' class='btn btn-success' formaction='' name='addBox' style='height: 32px;width: 120px;' value=" . $row["ItemID"] . ">Add to my box!</button></div></div><br>";
      }
      echo"</div></div>";
      $conn->close();
}

?>

<?php

if(isset($_POST['addBox'])){
  do_stuff();
}else{
  do_other_stuff();
}

function do_stuff(){
$servername = "localhost";
$serverUsername = "root";
$serverPassword = "";
$dbname = "HappyBox";

//Create connection
$conn1 = new mysqli($servername, $serverUsername, $serverPassword, $dbname);

// Check connection
if ($conn1->connect_error){
  die("Connection failed: " . $conn1->connect_error);
}

$userID = $_SESSION["ID"];

$itemID = $_POST['addBox'];

$possessionID = $conn1->insert_id;

$sql1 = "SELECT UserID, ItemID FROM Possession WHERE 
                                    UserID Like '$userID'
                                    AND ItemID Like '$itemID'";
$result1 = $conn1->query($sql1);
$row1 = $result1->fetch_assoc();

if($result1->num_rows > 0){
  echo "<div class='alert alert-danger'>".
     "<strong>Failure!</strong>".
      "</div>";

  die();
}else{
  $sql2 = "INSERT INTO Possession (PossessionID, UserID, ItemID)
   VALUES ($possessionID, '$userID', '$itemID')";
   $conn1->query($sql2);

echo "<div class='alert alert-success'>".
     "<strong>Success!</strong>".
      "</div>";


}


$conn1->close();}

function do_other_stuff(){}




?>





</html>