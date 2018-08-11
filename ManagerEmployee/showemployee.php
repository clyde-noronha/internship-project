<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'login');

	// initialize variables
	$username = "";
	$phone = "";
	$id = 0;

	

	$results = mysqli_query($db, "SELECT * FROM employees");

	$disp = '<div>
			<table id="display">                                    
			<thead>
				<tr>
					<th colspan="1" style="text-align:center">Full Name</th>
					<th colspan="1" style="text-align:center">Action</th>
				</tr>
			</thead>';
	while ($row = mysqli_fetch_array($results)) {
		$disp .= '<tr>
					<td class="disp_name" style="text-align:center">'. $row['firstname'] . " " . $row['lastname'] . '</td>
					<td class="del_btn" style="text-align:center" data-id="'. $row['id'] .'">Delete</td>
						
				</tr>';
	}

	$disp .= '</table>
			</div>';


	if (isset($_GET['delete'])) {                //DELETE
		$id = $_GET['id'];
		mysqli_query($db, "DELETE FROM employees WHERE id=$id");

		exit();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>All Employees</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style-showemployee.css">
	<script
  		src="https://code.jquery.com/jquery-3.3.1.min.js"
  		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  		crossorigin="anonymous">
  	</script>
	<script>
		$(document).ready(function(){

			//DELETE
			$(document).on('click', '.del_btn',function(){
				var id = $(this).data('id');
				var $clicked_btn = $(this);

				$.ajax({

					url : "showemployee.php",
					type : "GET",
					data : {
						'delete' : 1,
						'id' : id
					},
					success:function(response){
						$clicked_btn.parent().remove();
					}
				});
			});
		});

	</script>
</head>
<body>
	<?php echo $disp; ?>

	<div class="wrap">
		<button class="btn" type="button" name="back" id="back" onclick="window.location = 'manager.php'">Back</button>
	</div>
</body>
</html>