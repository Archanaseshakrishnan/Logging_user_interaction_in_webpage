<?php 
session_start();
 include 'sql.php';
 
if(isset($_POST['eventname'], $_POST['element'])){
	//echo $_POST['eventName'];
	updatescrollup($_SESSION['username'], $_POST['eventname'], $_POST['element']);
}

function updatescrollup($user, $eventname, $element){
	$act = date("Y-m-d H:i:s");
	$q4 = "INSERT INTO `user_activity` (`username`, `element`, `event`, `time_of_action`) VALUES ('$user', '$element', '$eventname', '$act')";
	$res = mysql_query($q4);	
}
?>