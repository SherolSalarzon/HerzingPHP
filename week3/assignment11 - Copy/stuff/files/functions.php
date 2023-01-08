<?php


function getConnection($host, $user, $password, $database)
{
    if($host == "" && $user == "" && $password == "" && $database == "") {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "store";
    }

    $connection = mysqli_connect($host, $user, $password, $database);
    return $connection;
}

function getIdExist($connection, $username, $email)
{
    $sql = "SELECT * FROM users WHERE username = ? or email = ?;";
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:registerPage.php");
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_execute($stmt);
    $Data = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($Data)){
        return $row;
    } else {
        return False;
    }
    mysqli_stmt_close($stmt);

}

function createUsers($connection, $username, $firstname, $lastname, $password, $province, $email)
{
    $sql = "INSERT INTO users (username, firstname, lastname, password, province, email) VALUES (?, ?, ?, ?, ?, ?));";
    $stmt = mysqli_stmt_init($connection) or header("location:registerPage.php");
    // Hashing Password
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    // Binding To the Values in the sql.
    mysqli_stmt_bind_param($stmt ,"ssssss" , $username, $firstname, $lastname, $hashPassword, $province, $email);
    // Execute the data to the database
    mysqli_stmt_execute($stmt);

    $Data = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($Data)){
        return $row;
    } else {
        $result = false;
        return $result;
    }
}

function loginUser($connection, $userOrEmail, $password)
{
    $exist = getIdExist($connection, $userOrEmail, $userOrEmail);
    $Hashedpass = $exist["password"];

    if ($exist === false) {
        header("location:loginPage.php?error:NotExist");
    }

    $check = password_verify($password, $pass);
    if($check === false){
        header("location:loginPage.php?error:wronglogin");
    } else {
        header("location:loginPage.php?error:None");
    }
}
?>
