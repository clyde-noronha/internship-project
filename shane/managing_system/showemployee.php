<?php 
	
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'login');

	
	$firstname = "";
	$lastname = "";
	$id = 0;
	

	

	$results = mysqli_query($db,"SELECT * FROM employeee");

	
	$disp = '<div>
			<table id="display">                                    
			<thead>
				<tr>
					<th style="text-align:center">firstname</th>
					<th style="text-align:center">lastname</th>
					<th colspan="2" style="text-align:center">Action</th>
				</tr>
			</thead>';
	


	while ($row = mysqli_fetch_array($results)) {
		$disp .= '<tr>
					<td class="disp_firstname" style="text-align:center">'. $row['firstname'] .'</td>
					<td class="disp_lastname" style="text-align:center">'. $row['lastname'] .'</td>
					<td class="del_btn" style="text-align:center" data-id="'. $row['id'] .'">Delete</td>
						
				</tr>';
	}




	if (isset($_GET['delete'])) {                //DELETE
		$id = $_GET['id'];
		mysqli_query($db, "DELETE FROM employeee WHERE id=$id");

		exit();
	}

?>






<!DOCTYPE html>
<html>
<head>
	<title></title>

	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script
  		src="https://code.jquery.com/jquery-3.3.1.min.js"
  		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  		crossorigin="anonymous">
  	</script>
  	<script src="script.js"></script>
  	<link rel="stylesheet" type="text/css" href="style/style-showemployee.css">
  	


</head>
<body>

	<?php echo $disp; ?>

</body>
</html>