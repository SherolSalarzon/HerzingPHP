<?php
	echo "<div> ============ 1:) ARRAY ============= <div>";

	// 10 Names
	$names = array("name0", "name1","name2","name3","name4","name5", "name6","name7","name8","name9");

	echo "<div> ============Normal Order============= <div>";
	// increasing order
	foreach ($names as $pos => $value) {
			echo "<div>Name at position " . $pos . " is: " . $value ."<div>";
	}

	echo "<div> ============Reversed Order============= <div>";

	// Length Of the Array
	$lengthOfTheArray = count($names) -1;

	// Loops Through The Array 
	while($lengthOfTheArray >= 0) {
	    echo "<div>Name at position " . $lengthOfTheArray . " is: " . $names[$lengthOfTheArray] ."<div>";
	    $lengthOfTheArray--;
	}
	
	// ================== PART TWO ===================

	echo "<div> ============ 2:) RAW User Data ============= <div>";

	// Shows data that got posted from the form
	print_r($_POST);

	// if user clicked submit
	if(isset($_POST['submit'])){

		// checking for these info
		$username = $_POST['username'];
		$name = $_POST['name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$province = $_POST['provinces'];
		$tos = $_POST['terms-and-condition'];


		// Checks if the user 


		echo "<div>".
					"================= User Submitted Formatted ================"  
				."</div>";

		echo "<div>
					username: ". $username;
				"</div>";
		echo "<div>
					name: ". $name;
				"</div>";
		echo "<div>
					email: ". $email; 
				"</div>";
		echo "<div>
					province: ". $province; 
				"</div>";

		if (isset($_POST['terms-and-condition'])){
				echo "<div>
					tos: ". $tos; 
				"</div>";
		}		

	}
?>