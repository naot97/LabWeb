<!DOCTYPE html>
<html>
<head>
<title>Index</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<style>
a{
	margin-right: 10px;
}
a:hover{
	cursor: pointer;
}
button{
	margin-bottom: 10px;
}
</style>
</head>
<body>

<button class="btn btn-success" onclick="to_Form('Nan')" name="action" value="add">Add</button>
<table class="table table-bordred table-striped">
	<thead><tr><th>Id</th><th>Name</th><th>Year</th><th>Action</th></tr></thead>
	<tbody>
		
	</tbody>
</table>
<script >

function to_Form(carId){
	localStorage.setItem('carId', carId);
	window.location = "form.php";
}

function delete_car(carId){
	if (confirm("Are you sure ?")){
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				load_cars();
			}
		}
		xmlhttp.open("GET", "php/delete_car.php?carId=" + carId, true);
  		xmlhttp.send();
	}
}
function load_cars() {
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	  	xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
        	var doc = xmlhttp.responseText;	
        	var arr = JSON.parse(doc);
        	var n = arr.length;
        	var result = "";
        	for (var i = 0; i < n; i++) {
        		result += '<tr>'  
        		+ '<td>' + arr[i]['id'] + '</td>'
        		+ '<td>' + arr[i]['name'] + '</td>'
        		+ '<td>' + arr[i]['year'] + '</td>'
        		+ '<td><a onclick="to_Form(' + arr[i]['id'] + ')">Edit </a> <a onclick="delete_car(' + arr[i]['id'] +')">Delete </a></td>'
        		+ '</tr>';
        	};
        	document.getElementsByTagName("tbody")[0].innerHTML = result;
      	}
	}
	xmlhttp.open("GET", "php/get_cars.php", true);
  	xmlhttp.send();
}
load_cars();
</script>	
</body>
</html>