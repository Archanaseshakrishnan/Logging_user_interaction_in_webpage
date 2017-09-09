<?php
session_start();
echo 'Welcome bbb';
include 'setup.php';
if(isset($_SESSION['username'])){
echo "<br><br><a href='stack.html'>Click here for Stackoverflow</a>";
}
else{
	echo 'Please login';
}
?>
