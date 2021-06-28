<?php
session_start();
include('../config.php');
$status = "";
if (isset($_POST['code']) && $_POST['code'] != "") {
	$code = $_POST['code'];
	$result = mysqli_query($con, "SELECT * FROM `products` WHERE `code`='$code'");
	$row = mysqli_fetch_assoc($result);
	$name = $row['name'];
	$code = $row['code'];
	$price = $row['price'];
	$image = $row['image'];

	$cartArray = array(
		$code => array(
			'name' => $name,
			'code' => $code,
			'price' => $price,
			'quantity' => 1,
			'image' => $image
		)
	);

	if (empty($_SESSION["shopping_cart"])) {
		$_SESSION["shopping_cart"] = $cartArray;
		$status = "<div class='box' style='color:green;'>Product is added to your cart!</div>";
	} else {
		$array_keys = array_keys($_SESSION["shopping_cart"]);
		if (in_array($code, $array_keys)) {
			$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";
		} else {
			$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
			$status = "<div class='box' style='color:green;'>Product is added to your cart!</div>";
		}
	}
}
?>
<html>

<head>
	<style>
		body {
			align-content: center;
			font-family: sans-serif;
			color: black;
		}
	</style>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' href='../css/products.css' type='text/css' media='all' />
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Shop Now | SuperMart</title>
</head>

<body>
	<?php include"./navigation_products.php" ?>
	<div style="width:1200px; margin:50 auto;">

		<b>
			<h1 class="text-3xl" style="align-content: center; text-align:center;">SuperMart Products</h2>
		</b>

		<div style="clear:both;"></div>
		<div class="message_box" style="margin:10px 0px;">
			<?php echo $status; ?>
		</div>

		<?php
		if (!empty($_SESSION["shopping_cart"])) {
			$cart_count = count(array_keys($_SESSION["shopping_cart"]));
		?>
			<div class="cart_div">
				<a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
			</div>
		<?php
		}

		$result = mysqli_query($con, "SELECT * FROM `products`");
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=" . $row['code'] . " />
			  <div class='image'><img height='420' width='260' src='" . $row['image'] . "' /></div>
			  <div class='text-gray-900 title-font text-lg font-medium'>" . $row['name'] . "</div>
		   	  <div class='mt-1'> ₹" . $row['price'] . "</div>
			  <button type='submit' class='text-white bg-green-500 border-0 py-1 px-3 focus:outline-none hover:bg-green-600 rounded text-lg'>Add to Cart</button>
			  </form>
		   	  </div>";
		}
		mysqli_close($con);
		?>
	</div>
	<?php include"./footer_products.php" ?>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>