<?php 
session_start();

try {
if (isset($_SESSION))
{
	session_destroy();
	header("Location:../loginPage.php?logout=true");
}
} catch (\Exception $e) {
	error_log($e->getMessage(), 3, "../logs/exceptions.log");
	error_log($e->getMessage(), 4, "../logs/errors.log");
	error_log($e->getMessage(), 5, "../logs/errors.log");
}



?>