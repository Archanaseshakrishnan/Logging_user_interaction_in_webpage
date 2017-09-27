<?php
session_start();
include 'sql.php';
$query = "SELECT `pagevisits`, `username` FROM `login_users`";
$user = $_SESSION['username'];
$result = mysql_query($query);
$len = mysql_num_rows($result);
$res = array();

	/*foreach($result as $r){
	$res[] = $r;
	}*/
while($row = mysql_fetch_assoc($result)){
	$u = $row['username'];
	$p = $row['pagevisits'];
	$res[] = '{"username": "'.$u.'", "pagevisits": '.$p.'}';
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