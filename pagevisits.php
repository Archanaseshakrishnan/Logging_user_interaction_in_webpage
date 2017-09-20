<?php
session_start();
include 'sql.php';
$query = "SELECT `pagevisits`, `username` FROM `login_users`";
$result = mysql_query($query);
echo mysql_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
</head>
<body>
	<div id="piechart" style="width: 900px; height:500px;"></div>
	<script type="text/javascript">
	google.charts.load('current',{'packages':['corechart']})
	google.charts.setOnLoadCallback(drawChart);
	function drawChart()
	{
		var data=google.visualization.arrayToDataTable([
		['username','pagevisits'],
		<?php
		while($row = mysql_fetch_array($result)){
		echo "['".$row["username"]."',".$row["pagevisits"]."],";
		}
		?>
		]);
		var options = {
			title: 'Interested users'
		};
		var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		chart.draw(data,options);
	}
	</script>
</body>
</html>