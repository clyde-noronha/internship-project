<?php  


$firstname= "";
$lastname ="";
$phone ="";
$address = "";
$username = "";
$password ="";
$confirmpassword ="";

$db = mysqli_connect("localhost","root","","login");


if (isset($_POST['submit'])) 
{

	if(isset($_POST['firstname']))
		$firstname = $_POST['firstname'];
	if(isset($_POST['lastname']))
		$lastname = $_POST['lastname'];
	if(isset($_POST['phone']))
		$phone = $_POST['phone'];
	if(isset($_POST['address']))
		$address = $_POST['address'];
	if(isset($_POST['username']))
		$username = $_POST['username'];
	if(isset($_POST['password']))
		$password = $_POST['password'];
	if(isset($_POST['confirmpassword']))
		$confirmpassword = $_POST['confirmpassword'];

	$user_check_query = "SELECT * FROM employeee WHERE username='$username' LIMIT 1";
  		$result = mysqli_query($db, $user_check_query);
  		$user = mysqli_fetch_assoc($result);
  

		if ($user) 
		{ 
				if ($user['username'] === $username) {
				$_SESSION['message'] = "username already exists";
    			}
    	}
    	else
		{
				if($password==$confirmpassword)
					{
						mysqli_query($db, "INSERT INTO employeee (firstname, lastname,phone,username,password,address) VALUES ('$firstname', '$lastname','$phone','$username','$password','$address')"); 
						$_SESSION['message'] = "NEW USER CREATED";

					}
				else
					$_SESSION['message'] = "error confirming password";
		}
}






?>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif ?>















<!DOCTYPE html>
<html>
<head>
	<title>CREATE EMPLOYEE </title>
	<link rel="stylesheet" type="text/css" href="style/style-createemployee.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>




	<form action="createemployee.php" method="POST">
			
			<div class="input-group">
			<label>FIRST NAME</label>
			<input class="firstname" type="text" name="firstname" required="true"></input>
			</div>
			<br>
			
			<div class="input-group">
			<label>LAST NAME</label>
			<input class="lastname" type="text" name="lastname" required="true"></input>
			</div>
			<br>

			<div class="input-group">
			<label>PHONE</label>
			<input class="phone" type="tel" name="phone" required="true"></input>
			</div>
			<br>

			<div class="input-group">
			<label>ADDRESS</label>
			<input class="address" type="text" name="address" required="true"></input>
			</div>
			<br>

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

			<div class="input-group">
			<label>CONFIRM PASSWORD</label>
			<input class="confirmpassword" type="Password" name="confirmpassword" required="true"></input>
			</div>
			<br>
			<button class="btn" type="submit" name="submit" id="submit">SUBMIT</button>
			
	</form>




</body>
</html>







