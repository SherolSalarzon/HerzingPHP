<!-- Sherol Salarzon -->
<!-- Taken in assignment 14 from HTML COURSE -->


  <!-- Main Content -->
  <main>
    <form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form">
        <!-- Basic Information -->
        <div class="field">
          <input type="text" placeholder="Name" name="name">
        </div>

        <div class="field">
          <input type="text" placeholder="Username*" name="username" required>
        </div>

        <div class="field">
          <input type="password" placeholder="Password*" name="password" required>
        </div>

        <div class="field">
          <input type="password" placeholder="Confirm Password*" name="cpassword" required>
        </div>

        <div class="field">
          <input type="email" placeholder="Email" name="email">
        </div>
        

        <div class="field">
          <input type="text" placeholder="Address">
        </div>

        <div class="field">
          <input type="text" placeholder="Address 2">
        </div>

        <div class="field">
          <select name="Provinces" id="Provinces" placeholder="None">
            <option value="None">Select</option>
            <option value="Alberta">Alberta</option>
            <option value="British-Columbia">British Columbia</option>
            <option value="Manitoba">Manitoba</option>
            <option value="New-Brunswick">New Brunswick</option>
            <option value="Newfoundland-and-Labrador">Newfoundland and Labrador</option>
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
          <input type="checkbox" name="terms-and-condition" id="terms" required>
          <label for="terms">Terms and Conditions</label>
        </div>
        <div class="field">
          <span>
            <input type="button" value="Login">
          </span>
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