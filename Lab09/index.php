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
<style>
a{
	margin-right: 10px;
}
button{
	margin-bottom: 10px;
}
</style>	
</head>
<body>
<?php
	if( !isset($_GET['action'] )) {
		$_GET['action'] = 'list';
	}

	if ($_GET['action'] == 'list'){
		$crud = new Crud();
		$query = 'SELECT * FROM cars';
		$list = $crud->getData($query);
?>
<form action="" method="get">
	<button class="btn btn-success" name="action" value="add">Add</button>
	<table class="table table-bordred table-striped">
		<th>
			<tr>
			<td>Id</td>
			<td>Name</td>
			<td>Year</td>
			<td>Action</td>
			</tr>
		</th>
		<tbody>
	<?php
		for ($i=0; $i < count($list) ; $i++) { 
			echo "<tr>";
			echo '<td>'.$list[$i]['id'] .'</td>';
			echo '<td>'.$list[$i]['name'] .'</td>';
			echo '<td>'.$list[$i]['year'] .'</td>';
			echo '<td><a href="index.php?action=edit&id='.$list[$i]['id'] . '">Edit </a>';
			echo '<a href="index.php?action=delete&id='.$list[$i]['id'] .'" onclick="return confirm(\'Are you sure?\');">Delete</a>';
			echo "</tr>";
		}
	?>
		</tbody>
	</table>
</form>
<?php
	}
	elseif ($_GET['action'] == 'edit') {
		if (isset($_GET['id'])) {
			header('Location:'.'Form.php?id='.$_GET['id']);
		}
		else
			header("Location: Form.php");	
	}
	elseif ($_GET['action'] == 'add') {
		header("Location: Form.php");
	}
	elseif ($_GET['action'] == 'delete'){
		$crud = new Crud();
		$query = 'DELETE FROM cars where id ='.$_GET['id'];
		$crud->execute($query);
		header("Location: index.php");
	}

?>
</body>
</html>