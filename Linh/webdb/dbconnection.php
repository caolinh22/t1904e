<?php
	
	
	function login($u, $p) {
		$hn = "localhost";
		$db = "T1904e_shop";
		$username = "root";
		$password = "";
	
		$conn = new mysqli($hn, $username, $password, $db);
	
		if($conn->connect_error) {
			return false;
		}
		
		$select = "select * from users where username = ? and password = ? ";
		$stmt = $conn->prepare($select);
		$stmt->bind_param("ss", $u, md5($p) );
		$stmt->execute();
		
		$result = $stmt->get_result();
		
		$num_row = $result->num_rows;
		
		if($num_row == 1) {
			return true;
		}
		return false;
	}
	
	function getAllProducts() {
		$hn = "localhost";
		$db = "T1904e_shop";
		$username = "root";
		$password = "";
	
		$conn = new mysqli($hn, $username, $password, $db);
	
		if($conn->connect_error) {
			return false;
		}
		
		$select = "select * from products";
		$result = $conn->query($select);
		
		$products = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$products[] = $row;
		}
		return $products;
	}
	
	function deleteProduct($id) {
		$hn = "localhost";
		$db = "T1904e_shop";
		$username = "root";
		$password = "";
	
		$conn = new mysqli($hn, $username, $password, $db);
	
		if($conn->connect_error) {
			return false;
		}
		$delete = "delete from products where id = ?";
		$stmt = $conn->prepare($delete);
		$stmt->bind_param("i", $id);
		$stmt->execute();
	}
	
	function addProduct($title, $price, $des) {
		$hn = "localhost";
		$db = "T1904e_shop";
		$username = "root";
		$password = "";
	
		$conn = new mysqli($hn, $username, $password, $db);
	
		if($conn->connect_error) {
			return false;
		}
		
		$insert = "insert into products(title, price, des) values(?, ?, ?)";	
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("sds", $title, $price, $des);
		$stmt->execute();
	}
	
	function getProductById($id) {
		$hn = "localhost";
		$db = "T1904e_shop";
		$username = "root";
		$password = "";
	
		$conn = new mysqli($hn, $username, $password, $db);
	
		if($conn->connect_error) {
			return false;
		}
		$delete = "select * from products where id = ? ";
		$stmt = $conn->prepare($delete);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		
		$result = $stmt->get_result();
		
		$product = $result->fetch_assoc();
		return $product;
	}

?>