<html>
	<head>
		<title>Form PHP DEMO</title>
	</head>
	<body>
		<?php 
			session_start();
			
			include "dbconnection.php";
			
			$check_session = isset($_SESSION['user_name']) ? true : false;
			
			if($check_session) {
				header("Location: index.php");
			} else {
				$username = isset($_POST['username']) ? $_POST['username'] : "";
				$password = isset($_POST['password']) ? $_POST['password'] : "";
				
				if(login($username, $password)) {
					$_SESSION['user_name'] = $username;
					header("Location: index.php");
				} else {
					echo "Nhập thông tin username và password.";
				}	
			}
		?>
		<h2>Login</h2>
		<div>
			<form action="login.php" method="POST">
				Username: <input type="text" name="username" /><br/>
				Pass: <input type="password" name="password" /><br/>
				<input type="submit" value="Login"/>
			</form>
		</div>
	</body>
</html>