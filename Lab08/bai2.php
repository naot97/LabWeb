<!DOCTYPE html>
<html>
<head>
	<title>bai2</title>
</head>
<body>
<?php
function bai2($value = 0)
{
	switch ($value % 5) {
		case 0:
			echo "Hello";
			break;
		case 1:
			echo "How are you?";
			break;
		case 2:
			echo "I'm doing well, thank you";
			break;
		case 3:
			echo "See you later";
			break;
		default:
			echo "Good-bye";
			break;
	}
}

bai2(0);
?>
</body>
</html>
