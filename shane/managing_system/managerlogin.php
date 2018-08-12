<?php
	$db = mysqli_connect("localhost","root","","login");

	$username = "";
	$password = "";


	if(isset($_POST['username']))
	$username = $_POST['username'];
	if(isset($_POST['password']))
	$password = $_POST['password'];

	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysqli_real_escape_string($db,$username);
	$password = mysqli_real_escape_string($db,$password);

	

	$result = mysqli_query($db, "SELECT * FROM managers WHERE username = '$username' AND password = '$password'") OR die("Failed to query database" . mysql_error());

	$row = mysqli_fetch_array($result);

	
if(isset($_POST['username']))
{
	if($row['username'] == $username && $row['password'] == $password) {
		
		header("location: manager.php");
		exit();
	}
	else {
		$_SESSION['message'] = "invalid username or password"; 
	}
}
?>
	


<!DOCTYPE html>
<html>
<head>
	<title>MANAGER LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style/style-managerlogin.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>


	<!--display login failed-->
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif ?>





	<form action="managerlogin.php" method="POST">
		
		<div class="input-group">
		<label>USERNAME</label>
		<input class="username" type="text" name="username" required="true"></input>
		</div>
		<br>
		
		<div class="input-group">
		<label>PASSWORD</label>
		<input class="password" type="Password" name="password" required="true"></input>
		</div>
		<br>
		<button class="btn" type="submit" name="submit" id="submit">Login</button>
	</form>


</body>
</html>