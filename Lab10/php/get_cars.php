<?php
require_once "Crud.php";

$crud = new Crud();

$sql = "SELECT * from cars";
echo json_encode($crud->getData($sql));


?>