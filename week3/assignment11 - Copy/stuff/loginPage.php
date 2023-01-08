<!-- Sherol Salarzon -->
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
  <title>LogIn Page</title>
</head>
<body>
  <!-- Main Content -->
  <main>
    <form action="loginScript.php" method="post">
      <div class="form">
        <h2>Log In</h2>
        <!-- Basic LogIn Information -->
        <div class="field">
          <input type="text" placeholder="Username | Email " name="nameEmail">
        </div>

        <div class="field">
          <input type="password" placeholder="Password" name="password" >
        </div>

        <div class="field">
          <span>
            <input type="submit" value="submit" name='submit'>
          </span>
          <span>
            <input type="submit" value="Register" name='noacc'>
          </span>
        </div>
      </div>
    </form>
  </main>
</body>
</html>
