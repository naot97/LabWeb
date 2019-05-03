<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<title>Info</title>
</head>
<body>
<script >
 function logout() {
 	sessionStorage.removeItem("username");
 	window.location = "index.php";
 }
</script>
<?php
	session_start();
	if(isset($_SESSION["username"])){
		echo "Username : ".$_SESSION["username"]."<br>";
		echo "Password : ".$_SESSION["password"]."<br>";
	}
	else{
		header('Location: login.php');
	}
?>
<button id='logout' onclick="logout()">Log out</button>
</body>
</html>






