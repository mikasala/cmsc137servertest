<?php
	
	include "functions.php";
	$user = $_SESSION["user"];
?>
<html>
	<head>
		<title>My Profile</title>
	</head>
	<body>
		<fieldset>
			<legend>Profile Information</legend>
			<?php
				echo 'Hello '.$user;
			?>
			<form method="post" action="addeditinfo.php">
					<input type="hidden" name="password" value="<?php echo getPassword($user);?>"/>
					<input type="submit" value="Edit Password" name="editAccount"/>
			</form>
			<form method="post" action="delete.php">
					<input type="submit" value="Delete User" name="deleteAccount"/>
			</form>
			<form method="post" action="logout.php">
					<input type="submit" value="Log Out"/>
			</form>
		</fieldset>
	</body>
</html>
