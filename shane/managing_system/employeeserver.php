<?php

	$db = mysqli_connect("localhost","root","","login");

	$id = 0;
	$firstname = "";
	$lastname = "";
	$phone = "";
	$username = "";
	$address = "";
	$password = "";


	//DISPLAY1
	if(isset($_GET['id'])) {

		$ida = $_GET['id'];
		$result = mysqli_query($db, "SELECT * FROM employeee WHERE id = $ida");
		$row = '';
		$disp = '';
		while ($row = mysqli_fetch_array($result)) {
			$disp .= '<div class="container">
					  <p>First Name: ' . '<span class="disp_firstname">' . $row['firstname'] . '</span></p>
					  <p>Last Name: ' . '<span class="disp_lastname">' . $row['lastname'] . '</span></p>
					  <p>Phone: ' . '<span class="disp_phone">' . $row['phone'] . '</span></p>
					  <p>username: ' . '<span class="disp_username">' . $row['username'] . '</span></p>
					  <p>Address: ' . '<span class="disp_address">' . $row['address'] . '</span></p>
					  <p>password: ' . '<span class="disp_password">' . $row['password'] . '</span></p>
					  <button class="btn" type="submit" name="edit" id="edit" data-id="' . $ida . '">Edit</button>
					  </div>';
			
		}
		echo $disp;

	}





	//UPDATE
	if (isset($_POST['update'])) 
	{         
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$username = $_POST['username'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		
		

		$result = mysqli_query($db, "SELECT * FROM employeee WHERE id = $id");
		$row = '';
		$disp = '';
		
		
		if( mysqli_query($db, "UPDATE employeee SET firstname='$firstname', lastname='$lastname', phone='$phone', username='$username', address='$address', password='$password' WHERE id=$id") )
		{
		$disp .= '	
					<p>First Name: ' . '<span class="disp_firstname">' . $firstname . '</span></p>
					<p>Last Name: ' . '<span class="disp_lastname">' . $lastname . '</span></p>
					<p>Phone: ' . '<span class="disp_phone">' . $phone . '</span></p>
					<p>username: ' . '<span class="disp_username">' . $username . '</span></p>
					<p>Address: ' . '<span class="disp_address">' . $address . '</span></p>
					 <p>password: ' . '<span class="disp_password">' . $password . '</span></p>
					<button class="btn" type="submit" name="edit" id="edit" data-id="' . $id . '">Edit</button>
				';
		echo $disp;
		}
		else 
		{
			echo "username already exist";
		}
		
				

	}

	


?>