<!-- Sherol Salarzon -->
<?php
// run: This File
// Connection Variable
$host = "localhost";
$username = "root";
$password = "";
$table = "store";

// Connection
$conn = mysqli_connect($host, $username, $password, $table);
if (!$conn){
	echo "delete.php did not connect";
}

// Query To select the Table
$query = 'SELECT ID, username FROM users ';
// Make a query and getting the result
$result = mysqli_query($conn, $query) or die("Error Query");

$table = "";
$table .= "<table id=\"\" name=\"\">";
$table .=  "<tr>" .
			"<td>ID</td>" .
			"<td>Username</td>" .
			"<td>Edit</td>" .
			"<td>Delete</td>" .
			"</tr>";

while($row = $result->fetch_row()){
	$table .= "<tr>";
	$table .= "<td>" . $row[0] . "</td>".
			   "<td> $row[1] </td>".
			   "<td><a href=\"editRow.php?id=" . $row[0] . "\">Edit</a></td>" .
			   "<td><a href=\"deleteRow.php?id=" . $row[0] . "\">Delete</a></td>";

	$table .= "</tr>";
}




mysqli_close($conn);
$table .= "</table>";
echo $table;
 ?>
