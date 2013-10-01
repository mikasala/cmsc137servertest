<?php
	
	include "functions.php";
	
	$users = retrieveUsers();
	
	// check if a user is being deleted using th esubmit buttons named after the username
	for($i=0 ; $i<count($users) ; $i++){
		$user = $users[$i];
		if(isset($_POST["$user"])){
			deleteUser($user);
		}
	}
	
	$users = retrieveUsers();
	
?>
<html>
	<head>
		<title>Delete Account</title>
	</head>
	<body>
		<fieldset style="width:15%;">
			<legend>Delete Account</legend>
			<form method="post" action="">
			<?php
				//table of users to delete
				echo '<table border="1px" >';
					echo '<tr>';
						echo '<th>';
							echo "Username";
						echo '</th>';
						echo '<th>';
							echo "DELETE";
						echo '</th>';
					echo '</tr>';
					for($i=0 ; $i<count($users) ; $i++){
						if($users[$i]!=$_SESSION["user"]){
							echo '<tr>';
								echo '<td>'.$users[$i].'</td>';
								echo '<td><input type="submit" name="'.$users[$i].'" value="Delete"/></td>';
							echo '</tr>';
						}
					}	
				echo '</table>';
			?>
			</form>
		</fieldset>
		<br/>
		<form method="post" action="profile.php">
			<input type="submit" value="Back"/>
		</form>
	
	</body>
</html>
