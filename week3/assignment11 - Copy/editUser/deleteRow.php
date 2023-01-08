<!-- Sherol Salarzon -->
<!-- Delete Row -->
<?php
// run: editpage.php

// Connection Information
$host = "localhost";
$username = "root";
$password = "";
$data = "store";
$rowId = -1;

if (!isset($_GET["id"]) && !$_SERVER['REQUEST_METHOD'] == 'post') {
    header("result.php");
} else {
    // If user deletes
    if(isset($_POST["confirmdelete"])){
        $rowId = $_POST["id"];
        // Delete The Record;
        $conn = mysqli_connect ($host, $username, $password, $data)
        or die("Error 404: connecting to the server.");

        // Query to delete the record
        $sql = "DELETE FROM users WHERE id = $rowId";
        $result = mysqli_query($conn, $sql);

        if ($result){
            $output = "record deleted";
            header("location:editpage.php");
        } else {
            $output = "record could not be deleted";
        }

        // close the database
        mysqli_close($conn);
    } else {
        $rowId = $_GET["id"];
        $conn = mysqli_connect($host, $username, $password, $data);

        $query = "SELECT id, firstname FROM users WHERE id = $rowId";
        $result = mysqli_query($conn, $query) or die("Error query");

        if($result){
            while($row = $result->fetch_row()){
                $output = "Delete User: " . $row[1];
            }
        }

        mysqli_close($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <p>
            <?php if ($output != "")
                echo $output;?>
        </p>
        <input type="submit" name="confirmdelete" id="confirmdelete" value = "Delete"
                <?php if (isset($_POST["confirmdelete"])) {
                    echo "style='display:none'"; }?> >
        <input type="hidden" name="id" value="<?php echo $rowId?>">
    </form>
</body>
</html>
