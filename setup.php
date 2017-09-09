<?php 

 include 'sql.php';
 $count = 0;
pagevisits($_SESSION['username']);
function pagevisits($user){
	$q = "SELECT `pagevisits` FROM `login_users` WHERE `username`='$user'";
	$result =mysql_fetch_array(mysql_query($q));
	echo "------------";
	$count = $result['pagevisits']+1;
	echo $count;
	$q2 = "UPDATE `login_users` SET `pagevisits` = '$count' WHERE `username` = '$user'";
	$result2 = mysql_query($q2);
	echo "------------";
	echo "<br><br>";
	echo "You last logged in during ";
	$q4 = "SELECT `date_last_visit` FROM `login_users` WHERE `username`='$user'";
	$result4 =mysql_fetch_array(mysql_query($q4));
	$d = $result4['date_last_visit'];
	echo $d;
	$date = date("Y-m-d");
	$q3 = "UPDATE `login_users` SET `date_last_visit` = '$date' WHERE `username` = '$user'";
	mysql_query($q3);
	
	
	}
?>