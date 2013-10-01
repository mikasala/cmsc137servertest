<?php
	
	session_start();


	function connect(){
		return mysqli_connect("localhost","root","user","cmsc137");
	}

	function addUser($username,$password){
		$con=connect();
		$stmt = "INSERT INTO user VALUES('$username','$password');";
		$a=mysqli_query($con,$stmt);
	}
	
	function editUserPwd($username,$password){
		$con=connect();
		$stmt = "UPDATE user SET password='$password' where username='$username';";
		$a=mysqli_query($con,$stmt);
	}
	
	function checkUser($username){
		$con=connect();
		$stmt = "SELECT username from user where username='$username';";
		$a=mysqli_fetch_array(mysqli_query($con,$stmt));
		if($a[0]!=NULL)
			return 1;
	}
	
	function getPassword($username){
		$con=connect();
		$stmt = "SELECT password from user where username='$username';";
		$a=mysqli_fetch_array(mysqli_query($con,$stmt));
		return $a[0];
	}
	
	function retrieveUsers(){
		$user = array();
		$con=connect();
		$stmt = "SELECT username from user;";
		$result = mysqli_query($con,$stmt);
		
		while($row=mysqli_fetch_assoc($result))
			$users[] = $row['username'];

		return $users;
	}
	
	function deleteUser($username){
		$con=connect();
		$stmt = "DELETE from user where username = '$username';";
		$result = mysqli_query($con,$stmt);
	}
	
?>
