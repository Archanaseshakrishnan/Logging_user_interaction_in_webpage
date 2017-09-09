<?php 
session_start();
 include 'sql.php';
 $count = 0;
pagevisits($_SESSION['username']);
if(isset($_POST['eventname'], $_POST['element'])){
	//echo $_POST['eventName'];
	updatedb($_SESSION['username'], $_POST['eventname'], $_POST['element']);
}

function pagevisits($user){
	$q = "SELECT `pagevisits` FROM `login_users` WHERE `username`='$user'";
	$result =mysql_fetch_array(mysql_query($q));
	echo "------------";
	$count = $result['pagevisits']+1;
	echo $count;
	$q2 = "UPDATE `login_users` SET `pagevisits` = '$count' WHERE `username` = '$user'";
	$result2 = mysql_query($q2);
	echo "------------";
	$date = date("Y-m-d");
	$q3 = "UPDATE `login_users` SET `date_last_visit` = '$date' WHERE `username` = '$user'";
	mysql_query($q3);
	}

function updatedb($user, $eventname, $element){
	$act = date("Y-m-d H:i:s");
	$q4 = "INSERT INTO `user_activity` (`username`, `element`, `event`, `time_of_action`) VALUES ('$user', '$element', '$eventname', '$act')";
	$res = mysql_query($q4);	
}
?>