<!-- Sherol Salarzon-->

<?php
// Including Function Script
include "../scripts/functions.php";

// Getting Connection to the database
$connect = getConnection();

if (isset($_GET['id'])) {
  // User ID
  $user_id = $_GET['id'];

  // Query
  $sql = "SELECT * FROM users WHERE id=$user_id";
  $run = mysqli_query($connect, $sql);

  // Checks if the user pressed Delete Button
  if (isset($_POST["delete-button"])) {
    deleteUser($user_id);
    header("Refresh:0");
  }

  // Saves the Data
  if (isset($_POST['save-button'])) {
    $username = $_POST['user_name'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $provinces = $_POST['provinces'];

    $EmailPreg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    if (!empty($email) && preg_match($EmailPreg, $email)) {
      echo '<div class="alert alert-danger" role="alert">' .
        "Invalid Email"
        . '</div>';
    } else if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) == False) {
      echo '<div class="alert alert-danger" role="alert">' .
        "Invalid Email"
        . '</div>';
    }


    // $username, $firstname, $lastname, $email, $provinces, $user_id
    updateUser($username, $firstname, $lastname, $email, $provinces, $user_id);
    header("Location:../welcomePage.php");
  }

?>

<!-- HTML PAGE -->
<!-- This Does Use Bootstrap Styling -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="../styles-folder/style3.css">

  <title>Document</title>
</head>

<body>
  <!-- Top Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- <span class="navbar-brand mb-0 h1 ml-5 mx-auto" id="Title">Edit Mode</span> -->
    <div class="navbar-brand mx-auto">Welcome</div>
    <div class=" justify-content-end" id="navbarNav">
      <ul class=navbar-nav>
        <li class="nav-item active">
          <a href="../welcomePage.php" class="nav-link disable mx-1" id="Home">
            Home
          </a>
        </li>
        <li class="nav-item active">
          <a href="../scripts/logoutScript.php" class="nav-link active mx-1" id="LogOut">
            Sign Out
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Container -->
  <div class="container">
    <div class="container-fluid">
      <!-- Login Form -->
      <div class="container d-flex justify-content-center mt-5">
        <?php if (mysqli_num_rows($run) > 0) {
    foreach ($run as $user) { ?>
        <form action="../scripts/editingScript.php" style="width:50vw; min-height:300px;" method="post">
          <!-- First Row (Names)-->
          <div class="row">
            <div class="col">
              <!-- Username -->
              <label class="form-label">Username:</label>
              <input type="text" class="form-control" name="name" value="<?= $user['username']; ?>">
            </div>
          </div>

          <div class="row">
            <!-- First Name -->
            <div class="col">
              <label class="form-label">Firstname:</label>
              <input type="text" class="form-control" name="fname" value="<?= $user['firstname']; ?>">
            </div>
            <!-- Last Name -->
            <div class="col">
              <label class="form-label">Lastname:</label>
              <input type="text" class="form-control" name="lname" value="<?= $user['lastname']; ?>">
            </div>
          </div>

          <div class="row">
            <div class="col">
              <!-- Email -->
              <label class="form-label">Email:</label>
              <input type="text" class="form-control" name="email" value="<?= $user['email']; ?>">
            </div>

            <div class="col">
              <!-- Province Selection -->
              <label class="form-label">Provinces:</label>

              <select name="provinces" class="form-select" aria-label="Default select example">
                <option value="None" <?= $user['province'] == 'None' ? 'selected' : ''; ?>>
                  Select
                </option>

                <option value="Alberta" <?= $user['province'] == 'Alberta' ? 'selected' : ''; ?>>Alberta
                </option>

                <option value="British-Columbia" <?= $user['province'] == 'British-Columbia' ? 'selected' : ''; ?>>British
                  Columbia
                </option>

                <option value="Manitoba" <?= $user['province'] == 'Manitoba' ? 'selected' : ''; ?>>
                  Manitoba
                </option>

                <option value="New-Brunswick" <?= $user['province'] == 'New-Brunswick' ? 'selected' : ''; ?>>
                  New Brunswick
                </option>

                <option value="N.L." <?= $user['province'] == 'N.L.' ? 'selected' : ''; ?>>
                  Newfoundland and Labrador
                </option>

                <option value="Northwest-Territories" <?= $user['province'] == 'Northwest-Territories' ? 'selected' : '';
        ?>>
                  Northwest Territories
                </option>

                <option value="Nova-Scotia" <?= $user['province'] == 'Nova-Scotia' ? 'selected' : ''; ?>>
                  Nova Scotia
                </option>

                <option value="Nunavut" <?= $user['province'] == 'Nunavut' ? 'selected' : ''; ?>>
                  Nunavut
                </option>

                <option value="Ontario" <?= $user['province'] == 'Ontario' ? 'selected' : ''; ?>>
                  Ontario
                </option>

                <option value="Quebec" <?= $user['province'] == 'Quebec' ? 'selected' : ''; ?>>
                  Quebec
                </option>

                <option value="Saskatchewan" <?= $user['province'] == 'Saskatchewan' ? 'selected' : ''; ?>>
                  Saskatchewan
                </option>

                <option value="Yukon" <?= $user['province'] == 'Yukon' ? 'selected' : ''; ?>>
                  Yukon
                </option>
              </select>

            </div>
          </div>

          <div class="row">
            <!-- Last Name -->
            <div class="col mt-3 d-flex justify-content-end ">
              <input type="hidden" name="user-ID" value="<?php echo $user_id ?>">
              <button name="save-button" class="btn btn-success btn-lg mx-1">Save</button>
              <button name="delete-button" class="btn btn-danger">Delete</button>
              <button onclick="return cancelThis()" name="cancel-button"
                class="btn btn-danger btn-lg mx-1">Cancel</button>
            </div>
          </div>
          <?php
    }
  } else {
    echo "No Record Found";
  }
} ?>

        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">

    function cancelThis() {
      window.location = "../welcomePage.php";
      return false;
    }

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>