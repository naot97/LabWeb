<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>bai5</title>
<style>
*{
	font-size: 20px;
	margin-top: 20px;
}
form{
	background: #eee;
	margin: 0px auto;
	width: 50%;
}
input{
	vertical-align: bottom;
	display: table-cell;
	width: 250px;
	height: 50px;
	margin-right: 40px;
}
button{
	margin-right: 10px;
	width: 100px;
	height: 50px;
}
</style>	
</head>

<body>
<?php 
	error_reporting(0);
	function isset_GET($name='')
	{
		if (isset($_GET[$name])) 
			return true;
		else return false;
	}
	if($_SERVER['REQUEST_METHOD'] != 'POST') {
		$result = 'RESULT';
		$number1 = 'NUMBER ONE';
		$number2 = 'NUMBER TWO';
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			try{
				$number1 = $_GET['number1'];
				$number2 = $_GET['number2'];
				if (isset_GET('add_btn')) 
					$result = $number1 + $number2;
				if (isset_GET('sub_btn')) 
					$result = $number1 - $number2;
				if (isset_GET('mul_btn')) 
					$result = $number1 * $number2;
				if (isset_GET('div_btn')) 
					$result = $number1 / $number2;
				if (isset_GET('pow_btn')) 
					$result = pow((float)$number1,(float) $number2);
			}
			catch(Exception $e){
				$result = "Error!";
				$number1 = "";
				$number2 = "";
			}
		}
?>
<div>
	<form action="">
		<input type="number" name="number1" value="<?php echo $number1 ; ?>" placeholder="NUMBER ONE">
		<input type="number" name="number2" value="<?php echo $number2 ; ?>" placeholder="NUMBER TWO">
		<div id="button-div">
			<button name="add_btn">+</button>
			<button name="sub_btn">-</button>
			<button name="mul_btn">X</button>
			<button name="div_btn">/</button>
			<button name="pow_btn">^</button>
		</div>
		<input type="text" name="result"  value="<?php echo $result ; ?>"  disabled style="color: red;">
	</form>
</div>
<?php 
	}
	else {
		echo "<pre>";
		var_dump($_POST);
		echo "</pre>";
	}
?>
</body>

</html>
