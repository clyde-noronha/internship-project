<?php
	session_start();
	$db = mysqli_connect("localhost","root","","login");

	$username = "";
	$password = "";

	if(isset($_POST['username'])) {
		$username = $_POST['username'];
	}
	if(isset($_POST['password'])) {
		$password = $_POST['password'];
	}
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysqli_real_escape_string($db,$username);
	$password = mysqli_real_escape_string($db,$password);

	

	$result = mysqli_query($db, "SELECT * FROM maninfo WHERE username = '$username' AND password = '$password'");

	$row = mysqli_fetch_array($result);


	if (isset($_POST['login'])) {
		if($row['username'] == $username && $row['password'] == $password) {
			header("location: manager.php");
			exit();
		}
		else {
			$_SESSION['message'] = "Incorrect Username or Password"; 
			header('location: managerlogin.php');
			exit();
		}
	}

?>
	


<!DOCTYPE html>
<html>
<head>
	<title>Manager Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style-managerlogin.css">

</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

	<form action="managerlogin.php" method="POST">
		<div class="input">
			<label>Username:</label>
			<input class="username" type="text" name="username" required="true"></input>
		</div>
		<br>
		<div class="input">
			<label>Password:</label>
			<input class="password" type="Password" name="password" required="true"></input>
		</div>
		<br>
		<div class="input">
			<button class="btn" type="submit" name="login" id="login">Login</button>
			<button class="btn" type="button" name="back" id="back" onclick="window.location = 'index.php'">Back</button>
		</div>


	</form>

</body>
</html>