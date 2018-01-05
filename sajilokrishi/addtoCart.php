<?php 
	session_start();
	require 'includes/connect.php';
	require 'includes/functions.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cart</title>
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<link rel="stylesheet" href="stylesheet/addtoCart.css">
</head>
<body>
	<header>Confirm Your Order</header>
	<div class = "div1">
		<?php  
			$p_id = $_GET['value'];
			if (isset($_POST['deliveryCharge'])){
			$deliveryCharge = $_POST['deliveryCharge'];
			}else{
				header('location:productDetail.php?p_id='.$p_id);
			}
			$productID = $p_id;
			if(isset($totalPrice)) {

			}
			$sql = "SELECT * FROM selecteditems WHERE ProductID = '$p_id'";
			$result = mysqli_query($con, $sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck > 0){
				// $redirect = htmlspecialchars($_SERVER['PHP_SELF']);
				echo "<table cellspacing=0 cellpadding=0>";
				?>
				<form action='cartFunction.php' method='POST'>
					<tr>
						<th>Item</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Subtotal</th>
						<th>Delivery Charge</th>
						<th>Total</th>			
					</tr>
				<?php
					while($row = mysqli_fetch_assoc($result)){
						$imax = $row['Qty'];

						echo "<tr>
							<td><input type=\"text\" value = '".$row['ProductName']."' name = 'Item'></td>
							<td>  <select name= 'qty' id= 'selectedList' onClick = 'show()'>";

								for ($i=1; $i <= $imax ; $i++) { 
									echo "<option value='" .$i. "'>" .$i. "</option>";
								}

							echo "</select>
							<span>".$row['unit']." </span>
							</td>
							<td> <input type=\"text\" value='".$row['Price']."' id = 'unitPrice'></td>
							<td><input type=\"text\" value = '".$row['Price']."' id = 'subtotalPrice'readonly></td>
							<td><input type=\"text\" value = '".$deliveryCharge."' readonly id = 'deliveryCharge'></td>
							<td><input type=\"text\" value = '' id = 'totalPrice'readonly></td>
							<input type='hidden' name='unit' value='".$row['unit']."' >
							<input type='hidden' value='".$row['category']."' name='category'>
						</tr>";
					}
				echo "<input type='hidden' name='deliveryCharge' value='".$deliveryCharge."'>";	
				echo "<input type='hidden' name='p_id' value='".$p_id."'>";
				echo "<input type=\"submit\" value = 'Add to Cart' name='addToCart'>";
				echo "</form>";
				echo "</table>";
			}else {
				echo "<h3>Your cart is Empty.</h3>";
			}
		?>
	</div>
<script src= "javascript/cart.js"></script>
</body>
</html>