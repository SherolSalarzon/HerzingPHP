<?php 
include 'functions.php';



if (isset($_POST["delete-button"])) {
	$getId = $_POST['user-id'];
	deleteUser($getId);
	header("Refresh:0");
}




?>