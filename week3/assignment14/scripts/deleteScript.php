<!-- Sherol Salarzon -->
<?php 
// Includes the Function
include 'functions.php';


try{

if (isset($_POST["delete-button"])) {
	$getId = $_POST['user-id'];
	deleteUser($getId);
	header("Refresh:0");
}
	
} catch (\Exception $e) {
	error_log($e->getMessage(), 3, "../logs/exceptions.log");
	error_log($e->getMessage(), 4, "../logs/errors.log");
	error_log($e->getMessage(), 5, "../logs/errors.log");
}


?>