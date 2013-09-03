<?php

	include "functions.php";
	
	
	$add=0;
	$edit=0;
	$success=0;
	
	$user = $_SESSION["user"];
	
	if(isset($_POST["addAccount"]))
		$add=1;
		
	if(isset($_POST["editAccount"])){
		$edit=1;
		$pw = getPassword($user);
	}
	
	if(isset($_POST["newPwd"]) && isset($_POST["confirmPwd"])){
		$newPwd = $_POST["newPwd"];
		$confirmPwd = $_POST["confirmPwd"];
		
		if($_POST["add"]==1){
			$add=1;
			$user = $_POST["username"];
		}
		
		if($_POST["edit"]==1){
			$edit=1;
			$user = $_SESSION["user"];
			$pw = getPassword($user);
		}
		
		if($confirmPwd==$newPwd){
			echo "Success!".'<br/><br/>';
			$success=1;
			$pw = $newPwd;
		}else{
			echo "Password does not match."."<br/><br/>";
		}
		
		if($success==1){
			if($add==1)
				addUser($user,$newPwd);
			if($edit==1)
				editUserPwd($user,$newPwd);
		}
		
	}
	
	
?>
<html>
	<head>
		<title>User Account</title>
	</head>
	<body>
		<fieldset>
			<?php
				if($add==1){
					echo '<legend>User Account</legend>';
					echo '<form method="post" action="">';
							echo 'Username: <input type="text" name="username"/><br/>';
							echo 'Password: <input type="password" name="newPwd"/><br/>';
							echo 'Confirm Password: <input type="password" name="confirmPwd"/><br/>';
							echo '<input type="hidden" name="add" value="1"/>';
							echo '<input type="submit" value="Submit"/>';
					echo '</form>';
				}
				
				if($edit==1){
					echo '<legend>Edit Password</legend>';
					echo '<form method="post" action="">';
							echo 'Current Password: <input type="text" value="'.$pw.'" name="password" readonly/><br/>';
							echo 'New Password: <input type="password" name="newPwd"/><br/>';
							echo 'Confirm Password: <input type="password" name="confirmPwd"/><br/>';
							echo '<input type="hidden" name="edit" value="1"/>';
							echo '<input type="submit" value="Submit"/>';
					echo '</form>';
				}
				
			?>
		</fieldset>
		<?php
			if($add==1)
				echo '<form method="post" action="index.php">';
			if($edit==1)
				echo '<form method="post" action="profile.php">';

			echo '<input type="submit" value="Back"/>';
			echo '</form>';	
		?>
	</body>
</html>
