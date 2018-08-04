<?php

	$db = mysqli_connect("localhost","root","","login");

	$id = 0;
	$firstname = "";
	$lastname = "";
	$phone = "";
	$email = "";
	$address = "";
	$password = "";
	$cpassword = "";

	if(isset($_GET['id'])) {

		$ida = $_GET['id'];
		$result = mysqli_query($db, "SELECT * FROM employees WHERE id = $ida");
		$row = '';
		$disp = '';
		while ($row = mysqli_fetch_array($result)) {
			$disp .= '<div class="container">
						<p class="ptitle">Your Profile</p>
						<div class="profile">
						  <p>First Name: ' . '<span class="disp_firstname">' . $row['firstname'] . '</span></p>
						  <p>Last Name: ' . '<span class="disp_lastname">' . $row['lastname'] . '</span></p>
						  <p>Phone: ' . '<span class="disp_phone">' . $row['phone'] . '</span></p>
						  <p>Email: ' . '<span class="disp_email">' . $row['email'] . '</span></p>
						  <p>Address: ' . '<span class="disp_address">' . $row['address'] . '</span></p>
						  <p>Password: ' . '<span class="disp_password">' . $row['password'] . '</span></p>
					  	</div>
					  	<br>
					  	<button class="btn" type="submit" name="edit" id="edit" data-id="' . $ida . '">Edit</button>
					  	<button class="btn" type="button" name="logout" id="logout">Logout</button>
					  </div>';
		}
	}

	


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$result = mysqli_query($db, "SELECT * FROM employees WHERE id = $id");
		$row = '';
		$disp = '';
		

		if( mysqli_query($db, "UPDATE employees SET firstname='$firstname', lastname='$lastname', phone='$phone', email='$email', address='$address', password='$password' WHERE id=$id") )
		{
			$disp .= '	<p class="ptitle">Your Profile</p>
						<div class="profile">
							<p>First Name: ' . '<span class="disp_firstname">' . $firstname . '</span></p>
							<p>Last Name: ' . '<span class="disp_lastname">' . $lastname . '</span></p>
							<p>Phone: ' . '<span class="disp_phone">' . $phone . '</span></p>
							<p>Email: ' . '<span class="disp_email">' . $email . '</span></p>
							<p>Address: ' . '<span class="disp_address">' . $address . '</span></p>
							<p>Password: ' . '<span class="disp_password">' . $password . '</span></p>
						</div>
			  			<br>
						<button class="btn" type="submit" name="edit" id="edit" data-id="' . $id . '">Edit</button>
						<button class="btn" type="button" name="logout" id="logout">Log Out</button>';
			echo $disp;
		}
	}
?>