<?php 
    include "functions.php";

    if (isset($_POST["delete-button"])) {
      $user_id = $_POST['user-ID'];
      deleteUser($user_id);
      header("Location:../welcomePage.php");
    }

    
    if (isset($_POST["save-button"])){
        print_r("Hello");
        include "functions.php";

        $username = $_POST['name'];
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $email = $_POST['email'];
        $provinces = $_POST['provinces'];
        $user_id = $_POST['user-ID'];

        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) == False) {
            $hasError = True;
            $message = "Email Is Not Valid.";
            array_push($listOfMessages, $message);
        }

        if (!$hasError) {
            // $username, $firstname, $lastname, $email, $provinces, $user_id
            updateUser($username,$firstname,$lastname,$email,$provinces,$user_id);
        } else {
            header("Location:../welcomePage?error=invalid-edit");
        }        
    }

?>