<!DOCTYPE html>
<html>
<head>
	<title>Manager</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style-manager.css">
</head>

<body>
	
	<div class="button-page">
		<div class="form">

			<button class="create_btn" type="button" name="create_btn" style="border-top-left-radius: 5px; border-top-right-radius: 5px; box-shadow: 0 -2px 5px 0 rgba(0, 0, 0, 0.2);" onclick="window.location = 'newemployee.php'">Create New Employee</button>
			<button class="show_btn" type="button" name="show_btn" onclick="window.location = 'showemployee.php'">Show All Employees</button>
			<button id="log_btn" type="button" name="show_btn" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2);" onclick="window.location = 'managerlogin.php'">Logout</button>

		</div>
	</div>

</body>
</html>