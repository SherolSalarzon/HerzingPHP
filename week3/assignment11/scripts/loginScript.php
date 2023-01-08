<!-- Sherol Salarzon -->
<?php
if (strpos($_SERVER['REQUEST_URI'], "logout=true") !== false){
    header("location:./loginPage.php?error:none");
    exit();
}

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
        setcookie("loggedin", true, time() + 120, '/');
    }

    loginUser($conn, $userEmail, $password);

    if (isset($_COOKIE['loggedin'])){
        header("Location:../welcomePage.php");
        exit;
    }

}
?>
