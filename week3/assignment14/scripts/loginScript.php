<!-- Sherol Salarzon -->

<?php
// If user click Register button
if(isset($_POST["noacc"]))
{
    header("Location:../registerPage.php");
    exit();
}

// If the user click the Submit button
if(isset($_POST["submit"]))
{
    require_once 'functions.php';
    $userEmail = strip_tags($_POST["nameEmail"]);
    $password = strip_tags($_POST["password"]);

    $conn = getConnection();

    if ($_POST['cookies'] === "yes") {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['time'] = time();
    }

    loginUser($conn, $userEmail, $password);
}
?>
