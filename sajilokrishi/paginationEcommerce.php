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
	<link rel="stylesheet" href="stylesheet/main.css">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
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
				<li><a href="finalcart.php">Cart</a></li>
			</ul>
		</div>

		<div class = "secondDiv">
			<div class = "leftDiv">
				<h3>Categories</h3>
				<div class = "leftDiv1">
					<?php require 'includes/navigation.php'; ?>
				</div>
			</div>
			<div class = "rightDiv">
				
				<div class = "rightDiv1">
					<!--main ecommerce section here -->
					<h3>Recent Store Products</h3>
						<?php 
							if (isset($_GET['page'])){
								$pgNo = $_GET['page'];
									if ($pgNo=="" || $pgNo=="1"){
										$limit = 0;
									}else{
										$limit = ($pgNo*12)-12;
									}
							}else{
								header('location:ecommerce.php');
							}

							$counter = 0;
							$sql = "SELECT * FROM  selecteditems ORDER BY ProductID DESC LIMIT $limit,12";
							$result = mysqli_query($con, $sql);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0) {
								while($row = mysqli_fetch_assoc($result)) {
										if($counter == 0){
											echo "<br><ul>";
										}
										$p_id = $row['ProductID'];
										echo "<li> <a href = 'productDetail.php?p_id=".$p_id."'>";
										echo "<img src = 'productImage/".$row['Image']. "'>";
										echo "<h3>";
											echo $row['ProductName']; echo"<br>";
										echo "</h3>";

										echo "<b>Category</b> : ".$row['categoryf']."<br>";
										echo "<b>Location</b>: ".$row['Qty']."<br>";
										echo "<b>Price</b> Rs. " . $row['Price'];
										echo "</a></li>";
										$counter++;
										if($counter == 4) {
											echo "</ul>";
											$counter = 0;
										}

								}
							}else{
								echo "error";	
							}
							
	 					?>
	 					<div class="pagination" style="width:800px; margin:0 auto;">
	 							<?php 
	 								$sql = "SELECT * FROM selecteditems";
	 								$res = mysqli_query($con,$sql);
	 								$count = mysqli_num_rows($res);
	 								// echo $count;
	 								$num = $count/12;
	 								$num = ceil($num);
	 								// echo $num

	 								for ($pageNo=1;$pageNo<=$num;++$pageNo){
	 							?>
	 								<a href="ecommerce.php?page=<?php echo $pageNo;?>" style="text-decoration:none"><?php echo $pageNo." "; ?></a>
	 							<?php
	 								}
	 							?>

	 					</div>
				</div>
				<div class = "rightDiv2">
					<?php 
					require 'includes/message.php';
						// echo $msg;
					 ?>
					
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
				
			</div>

			<div class = "login" id = "loginID">
				<div class = "signupBoxHeading">
					<ul>
						<li>Login</li>
						<img src="images/cross.png" alt="please_reload" id = "loginCross">
					</ul>
				</div>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
					<input type="text" required placeholder="Email OR Contact" name="email">
					
					<input type="password" required placeholder="Password" name="password">
					
					
					<input type="submit" name="login" value="LogIn" class = "submitButton">
				</form>
			</div>
		</div>
	</div>


<script src ="javascript/main.js"></script>
</body>
</html>