<?php
session_start();
include 'sql.php';
$user = $_SESSION['username'];
$query = "SELECT COUNT(*) AS 'count',`event` FROM `user_activity` WHERE `username` = '$user' GROUP BY `event`";

$result = mysql_query($query);

$res = array();

	/*foreach($result as $r){
	$res[] = $r;
	}*/
while($row = mysql_fetch_assoc($result)){
	$u = $row['count'];
	$p = $row['event'];
	$res[] = '{"count": '.$u.', "event": "'.$p.'"}';
}

/*while($row = mysql_fetch_array($result)){
	$res .= "['".$row["username"]."',".$row["pagevisits"]."],";
}
$res = trim($res, ',');
*/
/*echo "['username', 'pagevisits'],";
foreach ($res as $r ){
echo "['".$r['username']."', ".$r['pagevisits']."],";
*/
echo "[";
echo(implode(",",$res));
echo "]";
//print json_encode($res);
?>