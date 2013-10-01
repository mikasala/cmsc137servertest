<?php
	include "functions.php";
	
	if(isset($_POST["login"])){
		if($_POST["user"]!=NULL && $_POST["password"]!=NULL){
			$pw = $_POST["password"];
			$user = $_POST["user"];
			if(checkUser($user)==1){ // if username exists inthe database
				$password = getPassword($user);
				if($pw==$password){ // if the password input match the password in the database
					$_SESSION["user"] = $user; // sets the SESSION user
					header('Location: profile.php');
				}else echo "Invalid Username or Password.".'<br/><br/>';
			}else echo "Invalid Username or Password.".'<br/><br/>';
		}
	}
	
	$con=connect();
	echo ($con)?"YEAH!":"HELL!";
	echo '<br/><br/>';
?>
<html>
	<head>
		<title>Server Test</title>
	</head>
	<body>
		<fieldset style="width:40%;">
			<legend>Log In</legend>
			<form method="post" action="">
				Userame: <input type="text" name="user" id="user"/><br/>
				Password: <input type="password" name="password" id="password"/><br/>
				<input type="submit" name="login" value="OK"/>
			</form>
		</fieldset><br/>
		<form method="post" action="addeditinfo.php">
			<input type="submit" value="Add Account" name="addAccount"/>
		</form>
	</body>
</html>
