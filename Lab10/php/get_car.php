<?php
require_once "Crud.php";

if (isset($_GET['carId'])){

	$crud = new Crud();

	$sql = "SELECT * from cars WHERE id = " .$_GET['carId'];
	echo json_encode($crud->getData($sql)[0]);

}

?>