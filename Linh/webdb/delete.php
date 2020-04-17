<?php
	$id = $_GET['id'];
	include "dbconnection.php";
	deleteProduct($id);
	header("Location: index.php");
?>