<!DOCTYPE html>
<html>
<head>
<title>form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<script>


function load_car(){
	var carId = localStorage.getItem('carId');
	if (!isNaN(carId)) {
		var xmlhttp;
		if (window.XMLHttpRequest){
		  	xmlhttp=new XMLHttpRequest();
		}
		else{
		  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
	        	var doc = xmlhttp.responseText;	
	        	var car = JSON.parse(doc);
	        	document.getElementById('id').value = car['id'];
	        	document.getElementById('name').value = car['name'];
	        	document.getElementById('year').value = car['year'];
	      	}
		}
		xmlhttp.open("GET", "php/get_car.php?carId=" + carId , true);
	  	xmlhttp.send();
	}
}

function save_car(){
	var carId = document.getElementById('id').value;
	var name = document.getElementById('name').value;
	var year = document.getElementById('year').value;
	name =  document.getElementById('name').value;
		year = document.getElementById('year').value;
		if (name.length < 5 || name.length > 40){
			alert('Name \'s too short or too long!');
			return;
		}
		try{
			year = Number(year);
			if (year < 1990 || year > 2015) 
				throw "wrong";
		}
		catch(err){
			alert('Year \'s not number in range (1990, 2015)');
			return;
		}
	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
     		alert('Save success!');
     		window.location = "index.php";
    	}
  	};
  	xhttp.open("POST", "php/save_car.php", true);
  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send("id=" + carId  + "&name=" + name + "&year=" + year);
} 

load_car();
</script>
<form id="form" method="post"> 
  <div class="form-group">
    <label for="id">Id :</label>
    <input type="number" class="form-control" id="id" name="id" readonly>
  </div>
  <div class="form-group">
    <label for="name">Name :</label>
    <input class="form-control" id="name" name="name" >
  </div>
  <div class="form-group">
    <label for="year">Year :</label>
    <input class="form-control" id="year" name="year" >
  </div>
  <button id="button" type="button"  class="btn btn-success" onclick="save_car()">Save</button>
</form>
</body>
</html>