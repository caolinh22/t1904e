<?php
	$id = $_GET['id'];
	include "dbconnection.php";
	
	$product = getProductById($id);
	var_dump($product);
	
?>