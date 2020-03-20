<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'user_registration'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * 
		FROM earning WHERE Earning <>0';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

$avg = 'SELECT SUM(Earning) AS AVE,Date(Time) AS DTE
		FROM earning WHERE Earning <>0 GROUP BY Date(Time)';
		
$query_avg = mysqli_query($conn, $avg);

if (!$query_avg) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
	<link rel="icon" type="image/png" href="earning_icon.jpg"/>
	<link rel="icon" type="image/png" href="img/calculate.jpg"/>
	<title>Displaying Record of Earning</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
		 .button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    position: center;
    border-radius: 20px;
    float: left;
    margin-left: 20px;
}
.button:hover{
    color:#4CAF50;
    background-color: white;
}
	</style>
</head>
<body>
	<br><br>
	<h1>EARNING HISTORY</h1>
	<table class="data-table">
		<caption class="title"></caption>
		<thead>
			<tr>
				<th>S.No.</th>
				<th>Earning</th>
				<th>Time</th
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query))
		{
			$earn  = $row['Earning'] == 0 ? '' : number_format($row['Earning']);
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['Earning'].'</td>
					<td>'.$row['Time'].'</td>
				</tr>';
			$total += $row['Earning'];
			$no++;
		}?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">TOTAL</th>
				<th><?=number_format($total)?></th>
			</tr>
		</tfoot>
	</table>

	<br><br>
	<h1>DATE-WISE EARNING RECORD</h1>
	<table class="data-table">
		<caption class="title"></caption>
		<thead>
			<tr>
				<th>S.No.</th>
				<th>TOTAL $</th>
				<th>Date</th
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query_avg))
		{
			$earn  = $row['AVE'] == 0 ? '' : number_format($row['AVE']);
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['AVE'].'</td>
					<td>'.$row['DTE'].'</td>
				</tr>';
			$no++;
		}?>
		</tbody>
	</table>
	<div style="text-align:center; font-family: Comic Sans MS;">
<a href="member.php" class="button"><b>RETURN</b></a>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>