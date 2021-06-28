<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		body {
			align-content: center;
			align-self: center;
		}
		.card {
			margin-left: 100px;
		}
	</style>
	<title>My Account | SuperMart</title>
	<link rel="icon" href="./images/grocery.png" type="image/x-icon">
</head>

<body>
	<?php include("./components/header.php"); ?>
	<section class="text-black-600 body-font">
		<div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
			<div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
				<img class="object-cover object-center rounded" alt="hero" src="./images/undraw_personal_info_0okl.svg">
			</div>
			<div class="card" style="width: 25rem;">

				<div class="card-body">
					<h3 class="card-title">User Details</h3>
					<p class="card-text" style="margin:5px;"><b>Name: </b><?php echo htmlspecialchars($_SESSION["name"]); ?></p>
					<p class="card-text" style="margin:5px;"><b>Email: </b><?php echo htmlspecialchars($_SESSION["username"]); ?></p>
					<p class="card-text" style="margin:5px;"><b>Birth Date: </b><?php echo htmlspecialchars($_SESSION["birth_date"]); ?></p>
					<p class="card-text" style="margin:5px;"><b>Phone no: </b><?php echo htmlspecialchars($_SESSION["phone"]); ?></p>
					<p class="card-text" style="margin:5px;"><b>Address: </b><?php echo htmlspecialchars($_SESSION["address"]); ?></p>
					<p class="card-text" style="margin:5px;"><b>City: </b><?php echo htmlspecialchars($_SESSION["city"]); ?></p>
					<p class="card-text" style="margin:5px;"><b>State: </b><?php echo htmlspecialchars($_SESSION["state"]); ?></p>
					<a href="reset-password.php" style="margin-bottom: 10px; margin-left: 100px;" button class="btn btn-danger">Reset Password</a></button>
				</div>
			</div>
		</div>
		</div>
		</div>
	</section>




	<?php include "./components/footer.php" ?>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>