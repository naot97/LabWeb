<?php
require_once 'Crud.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>bai 1</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<script >
	function check() {
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
		document.getElementById("form").submit();
	}
</script>
<body>
<?php
	$crud = new Crud();
	if($_SERVER['REQUEST_METHOD'] != 'POST') {
		if (isset($_GET['id'])) {
			$query = 'SELECT * FROM cars WHERE id ='.$_GET['id'];
			$car =  $crud->getData($query)[0];
			$id = $car['id'];
			$name = $car['name'];
			$year = $car['year'];
		}
		else{
			$query = 'SELECT * FROM cars';
			$list = $crud->getData($query);
			$id = (int)$list[count($list) - 1]['id'] + 1;
			$name = '';
			$year = '';
		}
?>
<form id="form" method="post"> 
  <div class="form-group">
    <label for="id">Id :</label>
    <input type="number" class="form-control" id="id" name="id" value="<?php echo $id  ?>" readonly>
  </div>
  <div class="form-group">
    <label for="name">Name :</label>
    <input class="form-control" id="name" name="name" value="<?php echo $name  ?>">
  </div>
  <div class="form-group">
    <label for="year">Year :</label>
    <input class="form-control" id="year" name="year" value="<?php echo $year  ?>">
  </div>
  <button id="button" type="button" class="btn btn-success" onclick="check()">Save</button>
</form>
<?php
	}
	else{
		$name = $_POST['name'];
		$year = $_POST['year'];
		$id = (int)$_POST['id'];
		$query = 'SELECT * FROM cars where id='.$id;
		$list = $crud->getData($query);
		if (count($list) > 0)
			$query = 'UPDATE cars SET name=\''.$name.'\', year=\''.$year.'\' WHERE id='.$id;
		else 
			$query = 'INSERT INTO cars (id,name, year) VALUES ('.$id.', \''.$name.'\',\''.$year.'\');';
		$crud->execute($query);
		header("Location: index.php");
	}
?>
</body>
</html>