<!DOCTYPE html>
<html>
<head>
<title>bai 4</title>
<style >
table{
	background: yellow;
	border-collapse: collapse;
}
td{
	text-align: center; 
	width: 25px;
	height: 25px;
	border: 1px solid black;
}
</style>
</head>
<body>
<table>
<th></th>
<tbody>
<?php
for ($i=1; $i <= 7; $i++) { 
	echo "<tr>";
	for ($j=1; $j <= 7; $j++) { 
		echo "<td>";
		echo $i*$j;
		echo "</td>";
	}
	echo "</tr>";
}
?>
</tbody>
</table>
</body>
</html>

