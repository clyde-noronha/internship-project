<?php
	session_start();
	$db = mysqli_connect("localhost","root","","login");

	$email = "";
	$password = "";

	if(isset($_POST['email'])) {
		$email = $_POST['email'];
	}
	if(isset($_POST['password'])) {
		$password = $_POST['password'];
	}
	$email = stripcslashes($email);
	$password = stripcslashes($password);
	$email = mysqli_real_escape_string($db,$email);
	$password = mysqli_real_escape_string($db,$password);

	

	$result = mysqli_query($db, "SELECT * FROM employees WHERE email = '$email' AND password = '$password'") OR die("Failed to query database" . mysql_error());

	$row = mysqli_fetch_array($result);
	$id = $row['id'];

	if (isset($_POST['login'])) {
		if($row['email'] == $email && $row['password'] == $password) {
			header("location: employee.php?id=" . $id);
			exit();
		}
		else {
			$_SESSION['message'] = "Incorrect Username or Password"; 
			header('location: employeelogin.php');
			exit();
		}
	}

?>
	


<!DOCTYPE html>
<html>
<head>
	<title>Employee Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style-employeelogin.css">

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

	<form action="employeelogin.php" method="POST">
		<div class="input">
			<label>Username:</label>
			<input class="email" type="text" name="email" required="true"></input>
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