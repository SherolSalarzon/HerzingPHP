<!-- Sherol Salarzon -->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Water Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Basic Calculator</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter amount">
            </div>
            <div class="form-group">
                <label for="to-currency">To</label>
                <select name="currencyType" class="form-control" id="from-currency">
                    <option value="USD">USD</option>
                    <option value="CAD">CAD</option>
                </select>
            </div>
            <button name="Submit" type="submit" class="btn btn-primary mt-2">Convert</button>
        </form>
        <?php
        if (isset($_POST["Submit"]) && isset($_POST['currencyType'])) {
            $amount = $_POST["amount"];
            $to = $_POST["currencyType"];

            strip_tags($amount);
            addslashes($amount);

            // Allows example:
            // 564
            // 244,412
            // 231.32
            // 244,412.32
        
            $regex = "/^[0-9]+(?:\.[0-9]+)?$/";

            if (empty($amount) || !preg_match($regex, $amount)) {
                $message = "Amount Is Invalid";
                echo "<span class='fs-4 p-2'>" . $message . "</span>";
                exit;
            }

            if ($to == "USD") {
                $total = $amount * 1.36;
                $total = round($total, 2);

                $message = "USD: $" . $total;
                echo "<span class='fs-4 p-2'>" . $message . "</span>";
            }

            if ($to == "CAD") {
                $total = $amount * 0.74;
                $total = round($total, 2);
                $message = "CAD: $" . $total;
                echo "<span class='fs-4 p-2'>" . $message . "</span>";
            }


        }

        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>