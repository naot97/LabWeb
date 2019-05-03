<!DOCTYPE html>
<html>
<head>
	<title>bai 3</title>
</head>
<body>
<?php
	echo "By For : <br>";
	for ($i=0; $i < 101; $i++) { 
		if ($i % 2 == 1) {
			echo $i.' ';
		}
	}
	echo "<br>";
	echo "By While : <br>";	
	$i = 0;
	while ($i < 101) {
		if ($i % 2 == 1) {
			echo $i.' ';
		}
		$i = $i + 1;
	}
?>
</body>
</html>
