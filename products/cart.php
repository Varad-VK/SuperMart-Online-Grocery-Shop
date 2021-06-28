<?php
session_start();
$status = "";
if (isset($_POST['action']) && $_POST['action'] == "remove") {
	if (!empty($_SESSION["shopping_cart"])) {
		foreach ($_SESSION["shopping_cart"] as $key => $value) {
			if ($_POST["code"] == $key) {
				unset($_SESSION["shopping_cart"][$key]);
				$status = "<div class='box' style='color:green;'>
		Product is removed from your cart!</div>";
			}
			if (empty($_SESSION["shopping_cart"]))
				unset($_SESSION["shopping_cart"]);
		}
	}
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
	foreach ($_SESSION["shopping_cart"] as &$value) {
		if ($value['code'] === $_POST["code"]) {
			$value['quantity'] = $_POST["quantity"];
			break; // Stop loop as found the product
		}
	}
}
?>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="icon" href="./images/grocery.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Shop Now | SuperMart</title>
	<link rel='stylesheet' href='./css/style.css' type='text/css' media='all' />
	<style>
		body {
			font-family: sans-serif;
		}

		h3 {
			text-align: center;
		}
	</style>
</head>

<body>
	<?php include "./navigation_products.php" ?>
	<div style="width:700px; margin:50 auto;">

		<h2 style="text-align:center;">SuperMart Checkout</h2>

		<?php
		if (!empty($_SESSION["shopping_cart"])) {
			$cart_count = count(array_keys($_SESSION["shopping_cart"]));
		?>
			<div style="align-content: center;" class="cart_div">
				<a href="cart.php">
					<img src="cart-icon.png" /> Cart
					<span><?php echo $cart_count; ?></span></a>
			</div>
		<?php
		}
		?>

		<div class="cart">
			<?php
			if (isset($_SESSION["shopping_cart"])) {
				$total_price = 0;
			?>
				<table class="table table-striped table-borderless table-hover">
					<tbody>
						<tr>
							<td></td>
							<td><b>ITEM NAME</b></td>
							<td><b>QUANTITY</b></td>
							<td><b>UNIT PRICE</b></td>
							<td><b>ITEMS TOTAL</b></td>
						</tr>
						<?php
						foreach ($_SESSION["shopping_cart"] as $product) {
						?>
							<tr>
								<td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
								<td><?php echo $product["name"]; ?><br />
									<form method='post' action=''>
										<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
										<input type='hidden' name='action' value="remove" />
										<button type='submit' class='remove'>Remove Item</button>
									</form>
								</td>
								<td>
									<form method='post' action=''>
										<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
										<input type='hidden' name='action' value="change" />
										<select name='quantity' class='quantity' onchange="this.form.submit()">
											<option <?php if ($product["quantity"] == 1) echo "selected"; ?> value="1">1</option>
											<option <?php if ($product["quantity"] == 2) echo "selected"; ?> value="2">2</option>
											<option <?php if ($product["quantity"] == 3) echo "selected"; ?> value="3">3</option>
											<option <?php if ($product["quantity"] == 4) echo "selected"; ?> value="4">4</option>
											<option <?php if ($product["quantity"] == 5) echo "selected"; ?> value="5">5</option>
										</select>
									</form>
								</td>
								<td><?php echo "₹" . $product["price"]; ?></td>
								<td><?php echo "₹" . $product["price"] * $product["quantity"]; ?></td>
							</tr>
						<?php
							$total_price += ($product["price"] * $product["quantity"]);
						}
						?>
						<tr>
							<td colspan="5">
								<strong>TOTAL: <?php echo "₹" . $total_price; ?></strong>
							</td>
						</tr>
					</tbody>
				</table>
			<?php
			} else {
				echo "<h3>Your cart is empty!</h3>";
			}
			?>
		</div>

		<div style="clear:both;"></div>

		<div class="message_box" style="margin:10px 0px;">
			<?php echo $status; ?>
		</div>


		<br /><br />
	</div>
	<?php include "./footer_products.php" ?>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>