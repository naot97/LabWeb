<!DOCTYPE html>
<html lang="en">
<head>
<title>bai 2</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
*{
	margin: 2px;
}
form{
	background: #eee;
	width: 400px;
	margin: 0px auto;
}
p{
	font-weight: bold;
}

</style>
</head>
<?php 
	if($_SERVER['REQUEST_METHOD'] != 'POST') {
		// You can also use isset($_POST)
?>
<body>
	<form action="" method="post">
		<p>First name :</p>
		<input type="text" name="f_name"  placeholder="Enter First name">

		<p>Last name :</p>
		<input type="text" name="l_name" placeholder="Enter Last name">

		<p>Email :</p>
		<input type="text" name="email" placeholder="Enter Email">

		<p>Password :</p>
		<input type="password" name="password" placeholder="Enter Password">
		
		<p>Birthday :</p>
		<select name="date">
			<option value="0">-- Date --</option>
			<script >
				for (var i = 1; i <= 31; i++) {
						document.write("<option value=\"" + i.toString() +  "\" >" + i.toString() +"</option>")
				}
			</script>	
		</select>
		<select name="month">
			<option value="0">-- Month --</option>
			<option value="1">January</option>
			<option value="2">Febuary</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
			<option value="6">June</option>
			<option value="7">July</option>
			<option value="8">August</option>
			<option value="9">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>
		<select name="year">
			<option value="0">-- Year --</option>
			<script >
				for (var i = 1965; i <= 2019; i++) {
						document.write("<option value=\"" + i.toString() +  "\" >" + i.toString() +"</option>");
				}
			</script>
		</select>
		
		<p>Gender :</p>
		<input type="radio" name="gender" value="male" checked="checked"> Male<br>
		<input type="radio" name="gender" value="female"> Female<br>
		<input type="radio" name="gender" value="other"> Other
		
		<p>Country :</p>
		<select name="country">
			<option >Vietnamese</option>
			<option >Australia</option>
			<option>United States</option>
			<option>India</option>
			<option>Other</option>
		</select>

		<p>About :</p>
		<textarea maxlength="10000" name="about"></textarea>
		
		<div>
			<button name="submit_btn" >Submit</button>
			<button name="reset_btn" type="reset">Reset</button>
		</div>
	</form>
<?php
	}
	else{
		$fname = $_POST['f_name'];
		$lname= $_POST['l_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$date = $_POST['date'];
		$month = $_POST['month'];
		$year = $_POST['year'];

		$result = "";
		if ( !in_array(strlen($fname), range(2,30)) ){
			$result = $result . "First name 's wrong.<br>";
		}
		if ( !in_array(strlen($lname), range(2,30)) ){
			$result = $result . "Last name 's wrong.<br>";
		}
		if ( !in_array(strlen($password), range(2,30)) ){
			$result = $result . "Password 's wrong.<br>";
		}
		if ( !in_array(strlen($email), range(2,30)) or !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
			$result = $result . "Email 's wrong.<br>";
		}
		if ($date == 0 or $month == 0 or $year == 0 ) {
			$result = $result . "Birthday 's wrong.<br>";
		}
		if ($result == "")
			$result = "Completed!";
		echo $result;
	}
?>
</body>
</html>




