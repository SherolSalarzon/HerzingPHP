<?php

// Function to get connection to the server
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


// Checks if the user exist in the database (Requires: connection from the database, username, email)
function getIdExist($connection, $username, $email)
{
    $sql = "SELECT * FROM users WHERE (username='$username' OR email='$email');";
    $sub = mysqli_query($connection, $sql);

    if (mysqli_num_rows($sub) > 0)
    {
        $row = mysqli_fetch_assoc($sub);
        if ($email == isset($row['email']) || $username == isset($row['username'])){
            return true;
        } else {
            return false;
          }
    }

}

// adds user to the database
function createUsers($connection, $username, $firstname, $lastname, $password, $province, $email)
{   
    $sql = "INSERT INTO users (username, firstname, lastname, password, province, email) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:registerPage.php?error:stmt-fail");
    }
    // Hashing Password
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    // Binding To the Values in the sql.
    mysqli_stmt_bind_param($stmt, "ssssss" , $username, $firstname, $lastname, $hashPassword, $province, $email);
    // Execute the data to the database
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:loginPage.php?error:none");
}

// Checks if the password are the same
function passwordVerification($connection,$nameOrPass, $password)
{
    $sql = "SELECT password FROM users 
            WHERE username='$nameOrPass' OR email='$nameOrPass'";

    $result = mysqli_query($connection, $sql);


    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if ($email == isset($row['email']) || $username == isset($row['username'])
         && $password == isset($row['password']))
        {
            // check if the user has the right password
            $userPwd = $row['password'];
            $check = password_verify($password, $userPwd);
            
            if ($check == true) {
                // if the password are the same.
                return $check;
            }

        }

    } 
}

// Logs in the user to the welcomePage
function loginUser($connection, $userOrEmail, $password)
{
    $userExist = getIdExist($connection, $userOrEmail, $userOrEmail);

    $passExist = passwordVerification($connection, $userOrEmail ,$password);


    if ($passExist && $userExist) {
        // If it exist:
        // starts a cookie
        setcookie("loggedin", true, time() + 120);
        // Goes to the welcome Page.php page
        header("location:welcomePage.php?");
    } else {
        // If it does not exist
        $value = false;
        header("location:loginPage.php?error:wrong-info");
      }

}


?>
