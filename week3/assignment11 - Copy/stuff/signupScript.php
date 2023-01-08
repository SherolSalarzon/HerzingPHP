<!-- Sherol Salarzon -->
<?php
$confirm = $_POST["submit"];
if (isset($confirm)){

	$username = $_POST["name"];
	$firstname = $_POST["fname"];
	$lastname = $_POST["lname"];
	$password = $_POST["password"];
	$confirmPassword = $_POST["cpassword"];
	$email = $_POST["email"];
	$provinces = $_POST["provinces"];
	$tos = $_POST["terms-and-condition"];
	// Submit and Register Button


	// Variable for holding errors to show later.
	$listOfMessages = array();
	$hasError = False;

	// Name Validation
	if (empty($username)){
		// if the username is empty, say user name is not valid
		$hasError = True;
		$message = "Name Is Not Valid.";
		array_push($listOfMessages, $message);
	}

	// First Name Validation
	if (empty($firstname)){
		// if the first name is empty, say First Name is not valid
		$hasError = True;
		$message = "First Name Is Not Valid.";
		array_push($listOfMessages, $message);
	}

	// Last Name Validation
	if (empty($lastname)){
		$hasError = True;
		$message = "Last Name Is Not Valid.";
		array_push($listOfMessages, $message);
	}

	// confirm password Validation
	if ($password !== $confirmPassword) {
		$hasError = True;
		$message = "Password does not match.";
		array_push($listOfMessages, $message);
	}

	// password Validation
	if (strlen($password) < 8) {
		$hasError = True;
		$message = "Password Needs to be 8 characters minimum.";
		array_push($listOfMessages, $message);
	}

	// email Validation
	if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) == False) {
		$hasError = True;
		$message = "Email Is Not Valid.";
		array_push($listOfMessages, $message);
	}

	// =============== Checking If the data is in the DataBase =============== //

	// terms-and-condition Validation
	if (!isset($tos)){
		$hasError = True;
		$message = "Terms and conditions are Required";
		array_push($listOfMessages, $message);
	}

	// If there is an error It will show every error that occur, else show the result.
	if ($hasError) {
		print_r($password);
		print_r($confirmPassword);
		foreach ($listOfMessages as $type => $msg) {
			echo "<div>". $msg ."</div>";
		}

	}else { //If there is no error do this:

	print_r("<div>Hello WOrld<div>");
	require "functions.php";
	$connection = getConnection("localhost", "root", "", "store");
	// Calling Create Users from the function.php
	// It will autmatically insert hashed password.

	// $connection, $username, $firstname, $lastname, $password, $province, $email
	createUsers($connection, $username, $firstname, $lastname, $password, $province, $email);
    }
}


?>
