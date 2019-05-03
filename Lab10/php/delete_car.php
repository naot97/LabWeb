<?php
require_once "Crud.php";
$crud = new Crud();
if (isset($_GET['carId'])){
	$sql = 'DELETE FROM  cars WHERE id = ' . $_GET['carId'];
	$crud->execute($sql);
}
?>