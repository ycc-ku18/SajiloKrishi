<?php 
	session_start();
	require 'includes/connect.php';
	require 'authentication.php';
	require 'includes/functions.php';

	if (isset($_GET['p_id'])){
		$p_id = $_GET['p_id'];
	}else{
		header('location:eccomerce.php');
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Details</title>
	<link rel="stylesheet" href="stylesheet/main.css">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<link rel="stylesheet" href="stylesheet/productDetail.css">
</head>
<body>
	<div class = "mainWrapper">
		<div class = "firstDiv">
			<ul>
				<li>
					<h2 class = "title">Sajilo Krishi</h2>
				</li>
				<li>
					<input type="text">
					<button>SEARCH</button>
				</li>
				<?php 
					if (!isset($_SESSION['user'])){
				?>
						<li onclick = "showSignup()">SignUp</li>
						<li onclick = "showLogin()">LogIn</li>
				<?php 
					}else{
				?>	
					<li><a href='<?php echo $_SERVER['PHP_SELF']; ?>?logout=true'>Logout</a></li>
				<?php
				}
				?>
				<li><a href="finalcart.php">
				<?php
					$itemCount = 0;
					$ip = get_client_ip_env(); // getting Ip address of user.
					$sql = "SELECT * FROM cart WHERE ipAddress = '$ip'";
					$result = mysqli_query($con, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck > 0) {
						$itemCount = $resultCheck;
					}else {
						$itemCount = 0;
					}
					echo"(".$itemCount.")";
				 ?>
					
				Cart
			</a></li>
			</ul>		
		</div>
		<div class = "midDiv">
			<div class = 'div1'>
				<?php 
					$sql = "SELECT * FROM selecteditems WHERE ProductID=".$p_id;
					$res = mysqli_query($con,$sql);

					if ($res){
						while ($row = mysqli_fetch_array($res)){
				echo "
				<img src='productImage/".$row['Image']."' alt='please_reload'>
				<figcaption>".$row['ProductName']."</figcaption>
			</div>
			<div class = 'div2'>
				<h2>Product Name</h2>
				<h3>".$row['ProductName']."</h3>
				<h2>Product Description</h2>
				<h3>".$row['Description']."</h3>
				<h2>Product Quantity</h2>
				<h3>".$row['Qty']."</h3>
				<h2>Category</h2>
				<h3>".$row['category']."</h3>
				<h2>Product Seller</h2>
				<h3>".$row['fullName']."</h3>
				<h2>Product Location</h2>
				<h3>".$row['location']."</h3>
				<h2>Total Price</h2>
				<h3>".$row['Price']."</h3> 
				"; 
						}
					}else{
						header('location:eccomerce.php');
					}
				?>

				
			</div>

			<div class = "div3">
				<h4>We Provide Transportation Facility* of Products from Producers to Consumers too.</h4>
				<h6>*Extra Service Charge for transportation is required.</h6>
				<form action="addtoCart.php?value=<?php echo $p_id ?>" method="POST">
				<div class = "ticker">
					<label for="consumerLocation">Do you need transportation facility?</label><br><br>

					<p>Yes</p><input type="radio" name = "transportation" value = "Yes" id = "yesCheckBox" required>
					No <input type="radio" name = "transportation" value = "No" id = "noCheckBox" required><br>	
				</div>

				<div class = "transportationDiv" id = "transportationDivId">
					<label for="consumerLocation">Where do you want your product to be delivered?</label><br><br>
					<select name="location" id="locationID">
						<option value="">Choose Your Zone:</option>
						<option value="Mechi">Mechi</option>
						<option value="Koshi">Koshi</option>
						<option value="Sagarmatha">Sagarmatha</option>
						<option value="Janakpur">Janakpur</option>
						<option value="Narayani">Narayani</option>
						<option value="Bagmati">Bagmati</option>
						<option value="Gandaki">Gandaki</option>
						<option value="Lumbini">Lumbini</option>
						<option value="Dhawalagiri">Dhawalagiri</option>
						<option value="Rapti">Rapti</option>
						<option value="Bheri">Bheri</option>
						<option value="Seti">Seti</option>
						<option value="Karnali">Karnali</option>
						<option value="Mahakali">Mahakali</option>
					</select><br>

						<label for="charge">Estimated Delivery Charge(Rs)</label><br>
						<input type="text" readonly value = "0" id = "chargeID" name = 'deliveryCharge' required><br>
				</div>
						<input type="submit" value = "Check Out" name="addToCartSubmit">
				</form>
			</div>

		</div>
	</div>
<script src = "javascript/productDetail.js"></script>
</body>
</html>
