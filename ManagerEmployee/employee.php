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
	<link rel="stylesheet" type="text/css" href="style/style-employee.css">
</head>
<body>
	
	<?php echo $disp; ?>
	

	<div class="formfield" style="display:none">
		<form onsubmit="function()" action="javascript:void(0)">
	
		
		<input type="hidden" name="id" value="<?php echo $id; ?>">

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
			<label>Confirm Email:</label>
			<input class="cemail" type="email" name="cemail" required="true"></input>
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
			<input class="cpassword" type="Password" name="password" required="true"></input>
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