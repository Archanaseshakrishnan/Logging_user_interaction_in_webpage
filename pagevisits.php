<?php
session_start();
include 'sql.php';
$query = "SELECT `pagevisits`, `username` FROM `login_users`";
$result = mysql_query($query);
echo mysql_num_rows($result);
$q = "SELECT COUNT(*) AS 'count',`event` FROM `user_activity` WHERE `username` = 'archana' GROUP BY `event`";
$r = mysql_query($q);
echo mysql_num_rows($r);
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
</head>
<body>
	<table>
	<tr>
	<td id="piechart" style="width: 900px; height:500px;"></td>
	<td id="barchar" style="width: 900px; height:500px;">
	
	</td>
	</tr>
	</table>
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
	
  <script type="text/javascript">
    google.charts.load("current", {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart2);
    function drawChart2() {
      var data = google.visualization.arrayToDataTable([
        ['event','count'],
		<?php
		while($ro = mysql_fetch_array($r)){
		echo "['".$ro["event"]."',".$ro["count"]."],";
		}
		?>
      ]);

      var options = {
        title: "User data",
        };
      var chart = new google.visualization.ColumnChart(document.getElementById("barchar"));
      chart.draw(data, options);
  }
  </script>
</body>
</html>