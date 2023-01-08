<!-- Sherol Salarzon -->
<?php
$confirm = $_POST["submit"];

if (isset($confirm)){
	// Making sure the there it ignores html tags on the input tags
	$username = strip_tags($_POST["name"]);
	$firstname = strip_tags($_POST["fname"]);
	$lastname = strip_tags($_POST["lname"]);
	$password = strip_tags($_POST["password"]);
	$confirmPassword = strip_tags($_POST["cpassword"]);
	$email = strip_tags($_POST["email"]);
	$provinces = strip_tags($_POST["provinces"]);
	$tos = strip_tags($_POST["terms-and-condition"]);

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

	if (empty($password) || empty($confirmPassword)) {
		$hasError = True;
		$message = "One of the password is empty.";
		array_push($listOfMessages, $message);
	}

	// password Validation
	if (strlen($password) < 8) {
		$hasError = True;
		$message = "Password Needs to be 8 characters minimum.";
		array_push($listOfMessages, $message);
	}

	// confirm Password Validation
	if (strlen($confirmPassword) < 8) {
		$hasError = True;
		$message = "Confirm Password Needs to be 8 characters minimum.";
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
		require "functions.php";
		$connection = getConnection();

		// Validation | if the user have created with the same email as before, or the username.
		if (getIdExist($connection, $username,$email)){
			// If exist
			header("location:./loginPage?error:account-exist");
			exit();
		} else {
			// Create user if not exist (It will hash the password)
			createUsers($connection, $username, $firstname, $lastname, $password, $provinces, $email);
		 }


     }
     
} else if ($_POST['login']) {
	header("location:../loginPage.php?");
}


?>
