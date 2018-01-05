<?php 
	session_start();
	require 'includes/connect.php';
	require 'authentication.php';
	require 'includes/functions.php';
$msg = "";


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buy & Sell Products</title>
	<link rel="stylesheet" href="stylesheet/finalCart.css">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
	<div class = "mainWrapper">
		<header>Sajilo Krishi</header>

		<div class = "div1">
				
			<?php  
					$x = 10;
				$sql = "SELECT * FROM selecteditems JOIN cart WHERE selecteditems.ProductID = cart.pId";
				$result = mysqli_query($con, $sql);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck > 0){
					// $redirect = htmlspecialchars($_SERVER['PHP_SELF']);
					
			?>
					<table cellpadding="0" cellspacing="0">
					<form action='paymentSlip.php' method='POST' onsubmit='return confirm("Confirm Buy?")'>
						<tr>
							<th>Item</th>
							<th>Quantity</th>
							<th>Unit Price</th>
							<th>Subtotal</th>
							<th>Delivery Charge</th>
							<th>Total</th>			
						</tr>
					<?php
						$grandTotal = 0;
						while($row = mysqli_fetch_assoc($result)){
							$imax = $row['Qty'];
							$subTotal = $row['quantity']*$row['Price'];
							//let's define delivery charge as temporary variable.
							$deliveryCharge = 100;
							$total = $subTotal + $deliveryCharge;
							$grandTotal += $total;
							echo "<tr>
								<td>".$row['ProductName']."</td>
								<td>".$row['quantity']."<p>".$row['unit']."</p></td>
								<td> ".$row['Price']."</td>
								<td>".$subTotal."</td>
								<td>".$deliveryCharge."</td>
								<td>".$total."</td>
								
							</tr>";
						}
					echo "
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Grand Total:</td>
						<td>".$grandTotal."</td>

					</tr>
					"; 
					echo "<input type='hidden' name='grandTotal' value='".$grandTotal."'>";
					echo "<input type='hidden' name='p_id' value='".$p_id."'>";
					echo "<input type=\"submit\" value = 'Confirm & Pay Bill' name='payBill'><br>";
					echo "<label for='address'>Address</label><input type='text' id='address' name='address' placeholder='Street Number, City , State Number , Country' required ></span><br>";
					echo "<label for='phnNo'>Contact Number</label><input type='text' required name='contactNo'  placeholder='e.g 98XXXXXXXX or AreaCode-Number'> <br>";
					echo "</form>";
					echo "</table>";
				}else {
					echo "<h3>Your cart is currently Empty.</h3>";
				}
			?>	
			<div class="addMore"><button>Shop Again</button></div>
	</div>

		

	


	
	</div>
	
<script src ="javascript/cart.js"></script>
<script src ="javascript/main.js"></script>

</body>
</html>