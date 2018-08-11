<?php
	$db = mysqli_connect("localhost","root","","login");

	if(!isset($_POST['email']) || empty($_POST['email']))
	{
		
		echo '0';
		exit();
	}
	
	$email = trim($_POST['email']);
	$id = trim($_POST['id']);

	$user_check_query = "SELECT * FROM employees WHERE ( email='$email' AND id != '$id' ) LIMIT 1 ";
    $result = mysqli_query($db, $user_check_query);
    $find = mysqli_num_rows($result);
    echo $find;
		
	
	

?>