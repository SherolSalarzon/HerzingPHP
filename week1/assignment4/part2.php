<!-- Sherol Salarzon -->
<?php
	// Variable for holding errors to show later.
	$listOfMessages = array();
	$hasError = False;

	// Name Validation
	if (empty($_POST['name'])){
		// if the user is empty say username is not valid
		$hasError = True;
		$message = "Name Is Not Valid.";
		array_push($listOfMessages, $message);
	}

	// username Validation
	if (empty($_POST['username'])){
		$hasError = True;
		$message = "Username Is Not Valid.";
		array_push($listOfMessages, $message);
	}

	// cpassword Validation
	if ($_POST['password'] !== $_POST['cpassword']) {
		$hasError = True;
		$message = "Password does not match.";
		array_push($listOfMessages, $message);
	}

	// password Validation
	if (strlen($_POST["password"]) < 8) {
		$hasError = True;
		$message = "Password Needs to be 8 characters minimum.";
		array_push($listOfMessages, $message);
	}

	// email Validation
	if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == False) {
		$hasError = True;
		$message = "Email Is Not Valid.";
		array_push($listOfMessages, $message);
	}

	// terms-and-condition Validation
	if (!isset($_POST['terms-and-condition'])){
		$hasError = True;
		$message = "Terms and conditions are Required";
		array_push($listOfMessages, $message);
	}

	// If there is an error It will show every error that occur, else show the result.
	if ($hasError) {
		
		foreach ($listOfMessages as $type => $msg) {
			echo "<div>". $msg ."</div>";
		}

	} else {
		echo "<div> WELCOME ". $_POST['name'] ."<div>";
		echo "<div> Username: ". $_POST['username'] ."<div>";
		echo "<div> name: ". $_POST['name'] ."<div>";
		echo "<div> password: ". $_POST['password'] ."<div>";
		echo "<div> cpassword: ". $_POST['cpassword'] ."<div>";
		echo "<div> email: ". $_POST['email'] ."<div>";
		echo "<div> province: ". $_POST['provinces'] ."<div>";
		echo "<div> terms: ". $_POST['terms-and-condition'] ."<div>";
	}



?>