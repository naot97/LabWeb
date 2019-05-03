<?php
require_once "Crud.php";
$crud = new Crud();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$sql  = "select * from cars ORDER BY id DESC";
	$id = $crud->getData($sql)[0]['id'];

	if ($_POST['id'] == ''){
		$id = $id + 1;
		$sql = "INSERT INTO cars(id,name,year) values({$id},'{$_POST['name']}','{$_POST['year']}')";
	}
	else{
		$sql = "UPDATE cars SET name = '{$_POST['name']}', year = '{$_POST['year']}' WHERE id = {$id}";
	}

	$crud->execute($sql);
}

?>