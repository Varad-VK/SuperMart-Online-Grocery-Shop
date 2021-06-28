<?php
session_start();
?>


<?php
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img src="../images/grocery.png" alt="grocery" height="10" width="50" />
            <a class="navbar-brand" href="admin_login.php">SuperMart</a>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="admin_login.php">Users <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_login.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_login.php">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_login.php">Contact</a>
                </li>
            </ul>
            <p class="space-x-4" style="margin:20px; margin-left: 750px;">
                <a href="admin_login.php" style="margin:5px;" button class="btn btn-light">Login</a></button>
            </p>
        </div>
    </nav>

<?php } else { ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img src="../images/grocery.png" alt="grocery" height="10" width="50" />
            <a class="navbar-brand" href="users_admin.php">SuperMart</a>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="users_admin.php">Users <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products_admin.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feedback_admin.php">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_admin.php">Contact</a>
                </li>
            </ul>
            <a href="users_admin.php"><img src="../images/user1.png" style="margin-left: 600px;" height="40" width="30" alt="user_profile"></a>
            <p class="space-x-4" style="margin:20px; margin-left: 10px;">
                <a href="users_admin.php" style="margin:5px;" button class="btn btn-light"><b><?php echo htmlspecialchars($_SESSION["name"]); ?></b></a></button>
                <a href="admin_logout.php" button class="btn btn-warning">Sign Out</a></button>
            </p>
        </div>
    </nav>
<?php } ?>