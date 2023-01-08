<!-- Sherol Salarzon -->
<!-- Main Page After Logging IN -->
<?php
session_start();
require "scripts/functions.php";

// Connecting to the database
// Host | username | password | database

if (isset($_SESSION['loggedin']) && time() - $_SESSION['time'] <= 120) {
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
				<form id="myform" method="post">
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
										<button type="button" id="edit"
											onclick="newFunctions(<?php echo $row['ID']; ?>)" name="edit-button"
											class="btn btn-success">Edit</button>
									</td>
								</tr>
								<input type="hidden" name="user-id" value="<?php echo $row['ID']; ?>">
								<?php } ?>
							</table>
						</div>
					</div>
					<div class="d-grid gap-2">
						<button class="btn btn-primary btn-secondary" onclick="editEmail()" type="button">Email</button>
					</div>
				</form>

				<!-- Feed Section -->
				<form method="post" action="">
					<div class="input-group mb-3 mt-3">
						<span class="input-group-text" id="basic-addon3">Enter feed URL</span>
						<input type="text" name="feedURL" class="form-control" id="basic-url"
							aria-describedby="basic-addon3">
						<input type="submit" value="Submit" name="submit" class="btn btn-success">
					</div>
				</form>

				<?php

                if (isset($_POST['submit'])) {
	                if (!empty($_POST['feedURL'])) {
		                $url = $_POST['feedURL'];
		                $invalid = false;
		                if (@simplexml_load_file($url)) {
			                $feeds = simplexml_load_file($url);
		                } else {
			                $invalid = true;
		                }

		                if ($invalid) {
			                echo "<span> Invalid RSS URL</span>";
		                }
	                }
                }

                $i = 0;
                // Checking if the feed is empty
                if (!empty($feeds)) {
	                $site = $feeds->channel->title;
	                $link = $feeds->channel->link;

	                foreach ($feeds->channel->item as $item) {
		                $title = $item->title;
		                $link = $item->link;
		                $desc = $item->description;
		                $date = $item->date;

		                // ======= Change =======
                		// How many feed it shows
                		if ($i >= 3) {
			                break;
		                }
		                // ======= Change =======
                ?>

				<span class="border border-secondary m-2 rounded-3">
					<div class="container border-dark rounded-3 m-3">
						<div class="post-head p-1">
							<h2><a href="<?= $link ?>"><?= $title ?></a></h2>
						</div>
						<div class="content h4">
							<?= implode(" ", array_slice(explode(" ", $desc), 0, 20)) ?>
						</div>
					</div>
				</span>

				<?php
		                $i++;
	                }
                }

                ?>

			</div>
		</div>
	</div>
	<script type="text/javascript">
		function newFunctions(ID) {
			window.location.replace("editUser/editingPage.php?id=" + ID);
		}

		function editEmail() {
			window.location.replace("editUser/contactPage.php");
		}
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>

</body>

</html>