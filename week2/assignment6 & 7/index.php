<!-- Sherol Salarzon -->
<!-- Taken in assignment 14 from HTML COURSE -->
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
  <title>Document</title>
</head>
<body>
  <!-- Main Content -->
  <main>
    <form action="part2.php" method="post" novalidate>
      <div class="form">
        <!-- Basic Information -->
        <div class="field">
          <input type="text" placeholder="User Name" name="name">
        </div>

        <div class="field">
          <input type="text" placeholder="First Name" name="fname">
        </div>

        <div class="field">
          <input type="text" placeholder="Last Name" name="lname" >
        </div>

        <div class="field">
          <input type="password" placeholder="Password*" name="password" >
        </div>

        <div class="field">
          <input type="password" placeholder="Confirm Password*" name="cpassword" >
        </div>

        <div class="field">
          <input type="email" placeholder="Email" name="email">
        </div>
        
<!-- 
        <div class="field">
          <input type="text" placeholder="Address">
        </div>

        <div class="field">
          <input type="text" placeholder="Address 2">
        </div> -->

        <div class="field">
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
        </div> <!-- End Of Location  -->
        <!-- Terms and Condition -->
        <div class="field">
          <input type="checkbox" name="terms-and-condition" id="terms" >
          <label for="terms">Terms and Conditions</label>
        </div>
        <div class="field">
          <span>
            <input type="submit" value="submit" name='submit'>
          </span>
          <span>
            <input type="button" value="reset">
          </span>
        </div> <!-- End of Terms and Condition -->
      </div>
    </form>
  </main>
  </main>
</body>
</html>