<?php
	$host = "localhost";
	$user = "root";
	$pass = "";

	$database = "store";
	try {
		// connecting to the localhost server
		$connect = new mysqli($host, $user, $pass, $database);

		// sql Query to insert data to the table
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
