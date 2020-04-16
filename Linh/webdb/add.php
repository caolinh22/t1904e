<html>
	<head>
		<title>Form PHP DEMO</title>
	</head>
	<body>
		
		<h2>New Product</h2>
		<div>
			<form action="add.php" method="POST" enctype="multipart/form-data">
				Title: <input type="text" name="title" /><br/>
				Price: <input type="text" name="price" /><br/>
				Des: <textarea name="des"></textarea><br/>
				
				Img: <input type="file" name="file1" /><br/>
				<input type="submit" value="Add"/>
			</form>
		</div>
	</body>
</html>

<?php
	session_start();
	if(isset($_POST['title'])) {
		$file = $_FILES['file1'];
		
		if($file['error'] == 0) {
			$name = $file['name'];
			$tmp = $file['tmp_name'];			
			$currentTimeinSeconds = time();   			
			move_uploaded_file($tmp, "upload/$currentTimeinSeconds"."_"."$name");
		}
		
		//$products = $_SESSION['products'];		
		//var_dump($products);
		/*$product = array(
					'title' => $_POST['title'],
					'price' => $_POST['price'],
					'des' => $_POST['des']
				);
		$products[] = $product;
		$_SESSION['products'] = $products;*/
		
		include "dbconnection.php";
		addProduct($_POST['title'], $_POST['price'], $_POST['des']);
		header("Location: index.php");
	}
	

?>