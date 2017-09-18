<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HappyBox Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_form.css">
  </head>

	<body><br><br><br><br>
		<div class="container-fluid">
  		<h2>What personal advice do you want to share today?</h2>
		<form method="post" action="form.php">
			<textarea rows="10" cols="40" placeholder="Add your advice here!" name="TextArea" style="width:100%"></textarea>
			<br><br>
        <div class="checkbox">
          <input type="checkbox" name="commBox" value="yes" checked><label>Post to public community board
          </label>
        </div>
  			<input class="input-button" type="submit" name="submitForm" value="Add to My List">
  		</form>
  		</div>
	</body>
</html>

<?php
if(isset($_SESSION["ID"]) && !empty($_SESSION["ID"])){
$userID = $_SESSION["ID"];}
else{
  header('Location: index.html');
  die();
}
?>