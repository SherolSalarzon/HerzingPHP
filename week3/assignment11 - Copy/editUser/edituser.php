<!-- Sherol Salarzon -->
<?php
// run: editpage.php
if (isset($_POST['update'])){
    $user_id = $_POST['userID'];
    $username = $_POST['name'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $provinces = $_POST['provinces'];


    $connect = mysqli_connect("localhost", "root" ,"" , "store");

    $query = "UPDATE users SET username='$username', firstname='$firstname',
    lastname='$lastname', email='$email', province='$provinces' WHERE id='$user_id'";

    $result = mysqli_query($connect, $query);

    if($result){
        header('location: editpage.php');
    }


}



?>
