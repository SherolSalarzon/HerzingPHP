<!-- Sherol Salarzon -->
<?php

// If the cookies is false ot will logout the user
if (!isset($_COOKIE['loggedin'])) {
	session_destroy();
	unset($_COOKIE['loggedin']);
	header("location:loginPage?logout.php");
} else {
	// User can pick logout or edit
	if (isset($_POST["logout"])) {
		unset($_COOKIE['loggedin']);
		header("location:loginPage.php?logout=true");
	}

	if (isset($_POST["edit"])) {
		header("location:editUser/editpage.php");
	}
}



// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
// {

// }




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		h2 {
			text-align: center;
		}

		button {
			width: 250px;
			text-align: center;
			font-size: 24px;
			height: 100px;
			margin: auto;
			display: flex;
			justify-self: center;
		}

	</style>
</head>
<body>
	<main>
		<form action="" method="post">
			<h2>Welcome Page</h2>
			<button name="edit">Edit</button>
			<button name="logout">Logout</button>
		</form>	
	</main>
</body>
</html>