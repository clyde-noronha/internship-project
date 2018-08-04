<?php  include('employeeserver.php'); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Employee Profile</title>

	<script
  		src="https://code.jquery.com/jquery-3.3.1.min.js"
  		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  		crossorigin="anonymous">
  	</script>
  	<script src="employee.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style-employee.css">
</head>
<body>
	
	<?php echo $disp; ?>
	
	<div class="register-page">
		<div class="formfield" style="display:none">
			<form method="POST" action="employeeserver.php" id="updateform">
			
				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<div class="input">
					<label>First Name</label>
					<input class="firstname" id="firstname" type="text" name="firstname" pattern="[A-Za-z]*" oninput="setCustomValidity('')" required="true"></input>
				</div>

				<br>

				<div class="input">
					<label>Last Name</label>
					<input class="lastname" id="lastname" type="text" name="lastname" pattern="[A-Za-z]*" oninput="setCustomValidity('')" required="true"></input>
				</div>

				<br>

				<div class="input">
					<label>Phone</label>
					<input class="phone" id="phone" type="tel" name="phone" pattern="[0-9]{10}" oninput="setCustomValidity('')" placeholder="+91-xxxxx-xxxxx" required="true"></input>
				</div>

				<br>

				<div class="input">
					<label>Email</label>
					<input class="email" id="email" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninput="setCustomValidity('')" placeholder="example@email.com" required="true"></input>
				</div>

				<br>

				<div class="input">
					<label>Confirm Email</label>
					<input class="cemail" id="cemail" type="email" name="cemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninput="setCustomValidity('')" placeholder="example@gmail.com" required="true"></input>
				</div>

				<br>

				<div class="input">
					<label>Address</label>
					<input class="address" id="address" type="text" name="address" required="true"></input>
				</div>

				<br>

				<div class="input">
					<label>Password</label>
					<input class="password" id="password" type="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninput="setCustomValidity('')" required="true"></input>
				</div>

				<br>

				<div class="input">
					<label>Confirm Password</label>
					<input class="cpassword" id="cpassword" type="Password" name="cpassword" required="true"></input>
				</div>

				<br>

				<div class="input">
					<button class="btn" type="submit" name="update" id="update">Update</button>
					<button class="btn" type="button" name="cancel" id="cancel">Cancel</button>
				</div>
			</form>
		</div>
	</div>

</body>
</html>