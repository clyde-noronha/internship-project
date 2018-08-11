<?php
	$db = mysqli_connect("localhost","root","","login");

	$firstname = "";
	$lastname = "";
	$phone = "";
	$email = "";
	$address = "";
	$password = "";
	$cpassword = "";

	

	

//	$result = mysqli_query($db, "SELECT * FROM managers WHERE username = '$username' AND password = '$password'") OR die("Failed to query database" . mysql_error());

//	$row = mysqli_fetch_array($result);


	if (isset($_POST['submit'])) {
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];

		$user_check_query = "SELECT * FROM employees WHERE email='$email' LIMIT 1";
  		$result = mysqli_query($db, $user_check_query);
  		$user = mysqli_fetch_assoc($result);
  
  		if ($user) { // if user exists
    		if ($user['email'] === $email) {
    			echo "Email already exists";
    		}
    	}
    	else
    	{
			if($cpassword === $password) {
				mysqli_query($db, "INSERT INTO employees (firstname, lastname, phone, email, address, password) VALUES ('$firstname', '$lastname', '$phone', '$email', '$address', '$password')");
				header("location: manager.php");
				exit();
			}
			else
				echo "Passwords do not match";
  		}

	}

?>
	


<!DOCTYPE html>
<html>
<head>
	<title>New Employee</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style-newemployee.css">

</head>
<body>

	<form action="newemployee.php" method="POST">
		<div class="input">
			<label>First Name:</label>
			<input class="firstname" type="text" name="firstname" required="true"></input>
		</div>

		<br>

		<div class="input">
			<label>Last Name:</label>
			<input class="lastname" type="text" name="lastname" required="true"></input>
		</div>

		<br>

		<div class="input">
			<label>Phone:</label>
			<input class="phone" type="tel" name="phone" required="true"></input>
		</div>

		<br>

		<div class="input">
			<label>Email:</label>
			<input class="email" type="email" name="email" required="true"></input>
		</div>

		<br>

		<div class="input">
			<label>Address:</label>
			<input class="address" type="text" name="address" required="true"></input>
		</div>

		<br>

		<div class="input">
			<label>Password:</label>
			<input class="password" type="Password" name="password" required="true"></input>
		</div>

		<br>

		<div class="input">
			<label>Confirm Password:</label>
			<input class="cpassword" type="Password" name="cpassword" required="true"></input>
		</div>

		<br>

		<div class="input">
			<button class="btn" type="submit" name="submit" id="submit">Submit</button>
			<button class="btn" type="button" name="back" id="back" onclick="window.location = 'manager.php'">Back</button>
		</div>
	</form>

</body>
</html>