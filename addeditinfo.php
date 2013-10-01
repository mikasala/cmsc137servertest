<?php

	include "functions.php";
	
	
	$add=0;
	$edit=0;
	$success=0;
	
	$user = $_SESSION["user"];
	
	//adding account
	if(isset($_POST["addAccount"]))
		$add=1;
	
	//editting account
	if(isset($_POST["editAccount"])){
		$edit=1;
		$pw = getPassword($user);
	}
	
	//new account or editting account
	if(isset($_POST["newPwd"]) && isset($_POST["confirmPwd"])){
		$newPwd = $_POST["newPwd"];
		$confirmPwd = $_POST["confirmPwd"];
		
		//if adding get the POST username
		if($_POST["add"]==1){
			$add=1;
			$user = $_POST["username"];
		}
		
		//if editting, get SESSION username and its Password
		if($_POST["edit"]==1){
			$edit=1;
			$user = $_SESSION["user"];
			$pw = getPassword($user);
		}
		
		//check if the input password id equal to its confirmation password
		if($confirmPwd==$newPwd){
			echo "Success!".'<br/><br/>';
			$success=1;
			$pw = $newPwd;
		}else{
			echo "Password does not match."."<br/><br/>";
		}
		
		//if equal
		if($success==1){
			//add to the database
			if($add==1)
				addUser($user,$newPwd);
			//update database
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
		<fieldset style="width:40%;">
			<?php
				if($add==1){ // new account
					echo '<legend>User Account</legend>';
					echo '<form method="post" action="">';
							echo 'Username: <input type="text" name="username"/><br/>';
							echo 'Password: <input type="password" name="newPwd"/><br/>';
							echo 'Confirm Password: <input type="password" name="confirmPwd"/><br/>';
							echo '<input type="hidden" name="add" value="1"/>';
							echo '<input type="submit" value="Submit"/>';
					echo '</form>';
				}
				
				if($edit==1){ // update account
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
			//back buttons
			if($add==1)
				echo '<form method="post" action="index.php">';
			if($edit==1)
				echo '<form method="post" action="profile.php">';

			echo '<input type="submit" value="Back"/>';
			echo '</form>';	
		?>
	</body>
</html>
