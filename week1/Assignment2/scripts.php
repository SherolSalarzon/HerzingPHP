<!-- Sherol Salarzon -->
<?php
  // adds the header.php
  include "header.php";
  // puts the register form on the page
  include "index.php";

  // enters the math under the Register and shows the results
  $number1 = 36;
  $number2 = 42;
  $operator = 'a';
  $result = calculate(36, 42, 'a');

  // Shows the Math
  echo '<div>'."number 1: ". $number1.'<div>';
  echo "number 2: ". $number2;
  echo "operator: ". $operator;
  echo "Math Result: ". $result;


  // Functions for calculating
  function calculate($number1, $number2, $operator) {
    $operator = "a";
    if ($operator == "a") {
      return $number1 += $number2;
    }
    if ($operator == "s") {
      return $number1 -= $number2;
    }
    if ($operator == "m") {
      return $number1 *= $number2;
    }
    if ($operator == "d") {
      return $number1 /= $number2;
    }
  }
?>