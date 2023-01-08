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
  <link rel="stylesheet" href="styles-folder/style.css?v=<?php echo time(); ?>">
  <title>Register Page</title>
</head>
<body>
  <!-- Main Content -->
  <main>
    <form action="scripts/signupScript.php" method="post">
      <div class="form">
        <h2>Register</h2>
        <!-- Basic Information -->

        <!-- User Name -->
        <div class="field">
          <input type="text" placeholder="User Name" name="name">
        </div>

        <!-- First Name -->
        <div class="field">
          <input type="text" placeholder="First Name" name="fname">
        </div>

        <!-- Last Name -->
        <div class="field">
          <input type="text" placeholder="Last Name" name="lname" >
        </div>

        <!-- Password -->
        <div class="field">
          <input type="password" placeholder="Password*" name="password" >
        </div>

        <!-- Confirm Password -->
        <div class="field">
          <input type="password" placeholder="Confirm Password*" name="cpassword" >
        </div>

        <!-- Email -->
        <div class="field">
          <input type="email" placeholder="Email" name="email">
        </div>

        <div class="field">
          <!-- Province -->
          <select name="provinces" id="Provinces" placeholder="None" >
            <option value="None">Select</option>
            <option value="Alberta">Alberta</option>
            <option value="British-Columbia">British Columbia</option>
            <option value="Manitoba">Manitoba</option>
            <option value="New-Brunswick">New Brunswick</option>
            <option value="N.L.">Newfoundland and Labrador</option>
            <option value="Northwest-Territories">NorthwestTerritories</option>
            <option value="Nova-Scotia">Nova Scotia</option>
            <option value="Nunavut">Nunavut</option>
            <option value="Ontario">Ontario</option>
            <option value="Quebec">Quebec</option>
            <option value="Saskatchewan">Saskatchewan</option>
            <option value="Yukon">Yukon</option>
          </select>
        </div>
        <div class="field">
          <!-- term and condition -->
          <input type="checkbox" name="terms-and-condition" id="terms" >
          <label for="terms">Terms and Conditions</label>
        </div>
        <div class="field">
          <span>
            <!-- submit button / enter -->
            <input type="submit" value="submit" name='submit'>
          </span>
          <span>
            <!-- Transfer User to the Login -->
            <input type="submit" value="LogIn" name='login'>
          </span>
        </div>
      </div>
    </form>
  </main>
  </main>
</body>
</html>
