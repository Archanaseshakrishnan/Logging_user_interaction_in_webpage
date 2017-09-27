<?php 
session_start();
include 'sql.php';
$query = "SELECT `pagevisits`, `username` FROM `login_users`";
$user = $_SESSION['username'];
$result = mysql_query($query);
//$len = mysql_num_rows($result);
$res = array();

	/*foreach($result as $r){
	$res[] = $r;
	}*/
while($row = mysql_fetch_assoc($result)){
	$u = $row['username'];
	$p = $row['pagevisits'];
	$res[] = '["'.$u.'",'.$p.']';
}
?>
<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div id="pie"></div>
<script type="text/javascript">
google.charts.load('current',{'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart()
	{
		var data=google.visualization.arrayToDataTable([
		['username','pagevisits'],
		<?php echo(implode(",",$res));?>
		]);
		var options = {
			title: 'Interested users'
		};
		var chart = new google.visualization.PieChart(document.getElementById('pie'));
		chart.draw(data,options);
		//alert("1");
	}
	window.setInterval(function(){drawChart()},3000);
</script>
</div>
</html>