<?php 
	session_start();
	include_once 'includes/connect.php';
	include_once 'authentication.php';

	if (!isset($_SESSION['user'])){
		echo "<script>
			alert('LogIn first to continue...');
		</script>";
	}

$msg = "";
	if (isset($_POST['submit'])){
		if (isset($_SESSION['user'])){
			$productName = test_input(ucfirst(strtolower($_POST['ProductName'])));
			$price = test_input($_POST['Price']);
			$qty = test_input($_POST['Quantity']);
			$image = $_FILES['image']['name'];
			$email = $_SESSION['user'];
			$description = test_input($_POST['Description']);
			$target = 'ProductImage/'.basename($image);
			$category = $_POST['Category'];
			$keyword = $_POST['keyword'];
			$unit = $_POST['unitField'];

		
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
				$sql = "INSERT INTO products(ProductName,Price,Qty,RegEmail,image,Description,category,keyword,unit) VALUES ('$productName','$price','$qty','$email','$image','$description','$category','$keyword','$unit')";
				$res = mysqli_query($con,$sql);
				if ($res){
					$msg = "Successfully Inserted";
				}else{
					$msg = "Error in Insertion";
				}	
			}else{
				$msg = "Fail in uploading";
			}

		}else{
			$msg = "LogIn Required";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buy & Sell Products</title>
	<link rel="stylesheet" href="stylesheet/main.css">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<link rel="stylesheet" href="stylesheet/postProduct.css">
</head>
<body>
	<div class = "mainWrapper">
		
		<div class = "firstDiv">
			<ul>
				<li>
					<h2 class = "title">Agriculture Nepal</h2>
				</li>
				<li>
					<?php require_once 'includes/searchBarProducts.php'; ?>				
				</li>
				<?php 
					if (!isset($_SESSION['user'])){
						echo '
						<li onclick = "showSignup()">SignUp</li>
						<li onclick = "showLogin()">LogIn</li>
						';
				
					}else {
						echo '
							<h3>Hello, ' .$_SESSION['fullName'] . '</h3>'  
						;
					}
				?>

				<li><a href="finalcart.php">Cart</a></li>
			</ul>
		</div>

		<div class = "secondDiv">
			<div class = "leftDiv">
				<h3>Categories</h3>
				<div class = "leftDiv1">
<!-- include for navigation	 -->
					<?php require 'includes/navigation.php'; ?>  
				</div>
			</div>
			<div class = "rightDiv">
				
				<div class = "rightDiv1">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">	
						<label for="Product Name">Product Name:</label><br>
						<input type="text" placeholder="Eg. Potato" name="ProductName"><br>
						<label for="Category">Category</label><br>
						<select name="Category" id="CategoryID">
							<option value="">Select Category</option>
							<option value="Fruits">Fruits</option>
							<option value="Vegetables">Vegetables</option>
							<option value="Machinery">Machinery</option>
							<option value="Fertilizers">Fertilizers</option>
							<option value="Land">Land</option>
							<option value="Tools">Tools</option>
						</select><br>

						<label for="Price">Price:</label><br>
						<input type="text" placeholder="Price in Rupees" name="Price"><br>
						<label for="Quantity">Quantity</label><br>
						<input type="text" placeholder="Quantity in Numbers" class = "quantityField" name="Quantity"> <input type="text" id = "unitFieldID" class = "unitField" placeholder="Unit" readonly name="unitField"><br>
						<label for="Keyword">Keyword</label><br>
						<input type="text" placeholder="Keyword for you Product" name="keyword"><br>
						<label for="Image">Image</label><br>
						<input type="file" name="image"><br>
						<label for="Description">Description</label><br>
						<textarea name="Description" id="" cols="30" rows="5" placeholder="Product Description"></textarea><br>
						<input type="submit" name="submit">

					</form>	
				</div>
				<div class = "rightDiv2">
					
				</div>
			</div>

		</div>


	</div>
	<div class = "fakeWrapper" id = "fakeWrapperID"></div>
		<div class = "signupBox" id = "signupBoxID">
			<div class = "signup" id = "signupID">
				<div class = "signupBoxHeading">
					<ul>
						<li>SignUp</li>
						<img src="images/cross.png" alt="please_reload" id = "signupCross">
					</ul>
				</div>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
					<input type="text" required placeholder="Full Name" name="fullName">
					<input type="email" required placeholder="Email" name="email">
					<input type="password" required placeholder="Password" id = "password" name="password">
					<input type="password" required placeholder="Verify My Password" id = "verifyPasswordID" name="re_password">
					<p id = "p"></p>
					
					<select name="select" id="selectLocation">
						<option value="">Your Location</option>
						<option value="Kathmandu">Kathmandu</option>
						<option value="Lalitpur">Lalitpur</option>
						<option value="Bhaktapur">Bhaktapur</option>
						<option value="Sikkim">Sikkim</option>
					</select><br>
					<input type="submit" name="signup" value="SignUp" class = "submitButton">
				</form>
				<div class="error_design"><?php echo $msg; ?></div>

			</div>

			<div class = "login" id = "loginID">
				<div class = "signupBoxHeading">
					<ul>
						<li>Login</li>
						<img src="images/cross.png" alt="please_reload" id = "loginCross">
					</ul>
				</div>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
					<input type="text" required placeholder="Email" name="email">
					
					<input type="password" required placeholder="Password" name="password">
					
					
					<input type="submit" name="login" value="LogIn" class = "submitButton">
				</form>
				<div class="error_design"><?php echo $msg; ?></div>
			</div>
		</div>
	</div>


<script src ="javascript/main.js"></script>
</body>
</html>