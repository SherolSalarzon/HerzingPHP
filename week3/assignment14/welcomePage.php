<!-- Sherol Salarzon -->
<!-- Main Page After Logging IN -->

<?php
session_start();
require "scripts/functions.php";

// Connecting to the database
// Host | username | password | database

if (isset($_SESSION['loggedin']) && time() - $_SESSION['time'] <= 120){
	$conn = getConnection();
	$query = "SELECT * FROM users";
	$getResult = mysqli_query($conn, $query);
	$columns = mysqli_fetch_fields($getResult);

	if (isset($_POST['edit-button'])) {
		$getId = $_POST['user-id'];
		// header("Location:editUser/editingPage.php?id=$getId");
	}

	mysqli_close($conn);
} else {
	session_destroy();
	header("Location:loginPage.php?logout=true?cookie=timedout");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- BootStrap Styling -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 

	<title>Main Page</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<!-- <span class="navbar-brand mb-0 h1 ml-5 mx-auto" id="Title">Edit Mode</span> -->
<div class="navbar-brand mx-auto">Welcome</div>
<div class=" justify-content-end" id="navbarNav">
  <ul class=navbar-nav>
    <li class="nav-item active">
      <a href="welcomePage.php" class="nav-link disable mx-1" id="Home">
        Home
      </a>
    </li>
    <li class="nav-item active">
      <a href="scripts/logoutScript.php" class="nav-link active mx-1" id="LogOut">
        Sign Out
      </a>
    </li>
  </ul>
</div>
</nav>

<div class="container mt-5">
	<div class="col-12">
		<div class="row justify-content-center ">
			<form id="myform"  method="post">
			<div class="row-auto">
			<div class="table-responsive-sm">
				<table class='table table-bordered table-striped'>
					<thead class="thead-dark">
						<tr class="text-center">
							<th scope="col">ID</th>
							<th scope="col">username</th>
							<th scope="col">firstname</th>
							<th scope="col">lastname</th>
							<th scope="col">password</th>
							<th scope="col">province</th>
							<th scope="col">email</th>
							<th scope="col">edit</th>
						</tr>
					</thead>	
					<?php while ($row = mysqli_fetch_assoc($getResult)) { ?>
					
					<tr class="text-center">
						<td><?php echo $row['ID'] ?> </td>
						<td><?php echo $row['username'] ?> </td>
						<td><?php echo $row['firstname'] ?> </td>
						<td><?php echo $row['lastname'] ?> </td>
						<td><?php echo $row['password'] ?> </td>
						<td><?php echo $row['province'] ?> </td>
						<td><?php echo $row['email'] ?> </td>
						<!-- Delete Btn -->
						<td>
							<button type="button" id="edit" onclick="newFunctions(<?php echo $row['ID'];?>)" name="edit-button" class="btn btn-success">Edit</button>
						</td>
					</tr>
					<input type="hidden" name="user-id" value="<?php echo $row['ID'];?>">
					<?php } ?>
				</table>
			</form>
			</div>
		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function newFunctions(ID) {	
		window.location.replace("editUser/editingPage.php?id=" + ID);
	}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>