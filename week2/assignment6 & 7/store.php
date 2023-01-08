<?php 
	$host = "localhost";
	$username = "root";
	$pass = "";

	$database = "store";
	try {
		$connect = new mysqli($host, $username, $pass, $database);

		$sql = "INSERT INTO users (username, firstname, lastname, password, province, email) 
											VALUES (?, ?, ?, ?, ?, ?)";

		$stmt = mysqli_stmt_init($connect);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			die(mysqli_error($connect));
		}

		mysqli_stmt_bind_param($stmt, "ssssss", $name, $firstname, $lastname, $password, $province, $email);

		$stmt->execute();

	} catch (Exception $e) {
		echo "Store.php Has An Error";
	}





 ?>