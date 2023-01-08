<!-- Sherol Salarzon -->
<?php
// If user click Register button
if(isset($_POST["noacc"]))
{
    header("location:registerPage.php");
}

// If the user click the Submit button
if(isset($_POST["submit"]))
{

    $userEmail = strip_tags($_POST["nameEmail"]);
    $password = strip_tags($_POST["password"]);

    require_once 'functions.php';
    $conn = getConnection("localhost","root","","store");
    loginUser($conn, $userEmail, $password);

    if (isset($_COOKIE['loggedin'])){

    }

}
?>
