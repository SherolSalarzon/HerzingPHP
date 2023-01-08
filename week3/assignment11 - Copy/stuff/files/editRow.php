<!-- Sherol Salarzon -->

<?php
// run: editpage.php
$server = "localhost";
$username = "root";
$password = "";
$database = "store";

// Connection to the server
$connect = mysqli_connect($server, $username, $password, $database);

// query to select
if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $run = mysqli_query($connect, $sql);
    if (mysqli_num_rows($run) > 0) {
        foreach ($run as $user) {
            ?>
            <form action="editUser.php" method="post">
                <input type="text" name="userID" value="<?= $user['ID'];?>">
                <h1 style="padding-left: 6.5em;
                           font-size: 25px">EDIT INFO</h1>
                <div class="form">
                    <!-- Basic Information -->
                    <div class="field">
                    <input type="text" value="<?= $user['username'];?>" name="name">
                    </div>

                    <div class="field">
                    <input type="text" value="<?= $user['firstname'];?>" name="fname">
                    </div>

                    <div class="field">
                    <input type="text" value="<?= $user['lastname'];?>" name="lname" >
                    </div>

                    <div class="field">
                    <input type="email" value="<?= $user['email'];?>" name="email">
                    </div> <!-- End of Information -->

                    <!-- Location -->
                    <div class="field">
                    <select name="provinces" id="Provinces">
                        <option value="None" <?= $user['province'] == 'None' ? 'selected' : '';?> >Select</option>
                        <option value="Alberta" <?= $user['province'] == 'Alberta' ? 'selected' : '';?> >Alberta</option>
                        <option value="British-Columbia" <?= $user['province'] == 'British-Columbia' ? 'selected' : '';?> >British Columbia</option>
                        <option value="Manitoba" <?= $user['province'] == 'Manitoba' ? 'selected' : '';?> >Manitoba</option>
                        <option value="New-Brunswick" <?= $user['province'] == 'New-Brunswick' ? 'selected' : '';?> >New Brunswick</option>
                        <option value="N.L." <?= $user['province'] == 'N.L.' ? 'selected' : '';?> >Newfoundland and Labrador</option>
                        <option value="Northwest-Territories" <?= $user['province'] == 'Northwest-Territories' ? 'selected' : '';?> >NorthwestTerritories</option>
                        <option value="Nova-Scotia" <?= $user['province'] == 'Nova-Scotia' ? 'selected' : '';?> >Nova Scotia</option>
                        <option value="Nunavut" <?= $user['province'] == 'Nunavut' ? 'selected' : '';?> >Nunavut</option>
                        <option value="Ontario" <?= $user['province'] == 'Ontario' ? 'selected' : '';?> >Ontario</option>
                        <option value="Quebec" <?= $user['province'] == 'Quebec' ? 'selected' : '';?> >Quebec</option>
                        <option value="Saskatchewan" <?= $user['province'] == 'Saskatchewan' ? 'selected' : '';?> >Saskatchewan</option>
                        <option value="Yukon" <?= $user['province'] == 'Yukon' ? 'selected' : '';?> >Yukon</option>
                    </select>
                    </div> <!-- End Of Location  -->

                    <div class="field">
                    <span>
                        <input type="submit" value="submit" name='update'>
                    </span>
                    <span>
                        <input type="button" value="reset">
                    </span>
                    </div> <!-- End of Terms and Condition -->
                </div>
            </form>
            <?php
        }
    } else {
        echo "No Record Found";
    }


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Link to google fonts (Roboto) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <!-- End Link -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  <title>Register Page</title>
</head>
<body>
  <!-- Main Content -->
  <main>

  </main>
  </main>
</body>
</html>
