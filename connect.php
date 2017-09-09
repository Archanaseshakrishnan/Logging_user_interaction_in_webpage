<?php
session_start();
include 'sql.php';
if(isset($_POST['submit'])){
	$username=@mysql_real_escape_string($_POST['uname']);
	$password=@mysql_real_escape_string($_POST['pass']);
	
	SignIn($username, $password);
}
function SignIn($username, $password){
	$q = "SELECT * FROM `login_users` WHERE `username` = '$username' AND `password` = '$password'";
	$result = mysql_query($q);
	
	echo $result;
	echo mysql_num_rows($result);
	if(mysql_num_rows($result)>=1){
		echo "Welcome ";
		echo $username;
		$userid = mysql_query($id);
		$_SESSION['username'] = $username;
		
		/*$q2 = "INSERT INTO `user_activity` (`username`, `q1`, `pagevisits`, `interest`) VALUES ('$username', '0', '0', '0') ";
		$result1 = mysql_query($q2);
		echo $result1;
		https://youtu.be/HTp3qkU7rq4
		*/
		header("Location: $username.php");
	}
	else{
		echo "Try again!";
	}
}

?>