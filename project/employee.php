<?php  include('employeeserver.php'); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Basic CRUD</title>

	<script
  		src="https://code.jquery.com/jquery-3.3.1.min.js"
  		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  		crossorigin="anonymous">
  	</script>
  	<script src="employee.js"></script>
	<link rel="stylesheet" type="text/css" href="style-employee.css">
</head>
<body>
	
	<?php echo $disp; ?>
	
	
	<div class="formfield" style="display:none">
		<form method="POST" action="employeeserver.php" id="updateform">
		
		<input type="hidden" name="id" value="<?php echo $id; ?>">

		<div class="input">
			<label>First Name:</label>
			<input class="firstname" type="text" name="firstname" pattern="[A-Za-z]*" title="Alphabets only" required="true"></input>
		</div>

		<br>

		<div class="input">
			<label>Last Name:</label>
			<input class="lastname" type="text" name="lastname" pattern="[A-Za-z]*" title="Alphabets only" required="true"></input>
		</div>

		<br>

		<div class="input">
			<label>Phone:</label>
			<input class="phone" type="tel" name="phone" pattern="[0-9]{10}" placeholder="+91-xxxxx-xxxxx" required="true"></input>
		</div>

		<br>

		<div class="input">
			<label>Email:</label>
			<input class="email" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="example@gmail.com" required="true"></input>
		</div>

		<br>

		<div class="input">
			<label>Confirm Email:</label>
			<input class="cemail" type="email" name="cemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="example@gmail.com" required="true"></input>
		</div>

		<br>

		<div class="input">
			<label>Address:</label>
			<input class="address" type="text" name="address" required="true"></input>
		</div>

		<br>

		<div class="input">
			<label>Password:</label>
			<input class="password" type="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and one lowercase letter, and at least 8 or more characters" required="true"></input>
		</div>

		<br>

		<div class="input">
			<label>Confirm Password:</label>
			<input class="cpassword" type="Password" name="cpassword" required="true"></input>
		</div>

		<br>

		<div class="input">
			<button class="btn" type="submit" name="update" id="update">Update</button>
			<button class="btn" type="button" name="cancel" id="cancel">Cancel</button>
		</div>
	
	</form>
</div>


</body>
</html>


<!--	  -->