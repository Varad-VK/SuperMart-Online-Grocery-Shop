<?php
//session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
	<nav class="navbar navbar-expand-lg navbar-light bg-white">
		<a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
			<img src="../images/grocery.png" alt="grocery" height="10" width="50" />
			<a class="navbar-brand" href="../index.php">SuperMart</a>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="products.php">Services</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../contact.php">contact</a>
				</li>
				<li class="nav-item">
					<a class="nav-link mr-1" href="../about.php">About us</a>
				</li>
			</ul>
			<p class="space-x-4" style="margin:20px; margin-left: 600px;">
				<a href="../login.php" style="margin:5px;" button class="btn btn-light">Login</a></button>
				<a href="../register.php" button class="btn btn-light">SignUp</a></button>
			</p>
		</div>
	</nav>

<?php } else { ?>
	<nav class="navbar navbar-expand-lg navbar-light bg-white">
		<a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
			<img src="../images/grocery.png" alt="grocery" height="10" width="50" />
			<a class="navbar-brand" href="index.php">SuperMart</a>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="products.php">Services</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../contact.php">Contact</a>
				</li>
				<li class="nav-item">
					<a class="nav-link mr-1" href="../feedback.php">Feedback</a>
				</li>
				<li class="nav-item">
					<a class="nav-link mr-1" href="../about.php">About us</a>
				</li>
			</ul>
			<a href="../account.php"><img src="../images/user1.png" style="margin-left: 450px;" height="40" width="30" alt="user_profile"></a>
            <p class="space-x-4" style="margin:20px; margin-left: 10px;">
				<a href="../account.php" style="margin:5px;" button class="btn btn-light"><b><?php echo htmlspecialchars($_SESSION["name"]); ?></b></a></button>
				<a href="../logout.php" button class="btn btn-warning">Sign Out</a></button>
			</p>
		</div>
	</nav>
<?php } ?>