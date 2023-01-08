<?php
if(isset($_POST["noacc"]))
{
    header("location:registerPage.php");
}

if(isset($_POST["submit"]))
{
    $userEmail = $_POST["nameEmail"];
    $password = $_POST["password"];

    require_once 'functions.php';
    $conn = getConnection("localhost","root","","store");
    loginUser($conn, $userEmail, $password);
}
?>
