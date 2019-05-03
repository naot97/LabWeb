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
<script >
 $('.button').click(function() {

 $.ajax({
  type: "POST",
  url: "some.php",
  data: { name: "John" }
}).done(function( msg ) {
  alert( "Data Saved: " + msg );
});    

    });
</script>

