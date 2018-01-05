<?php 
	session_start();
	require 'includes/connect.php';
	require 'authentication.php';
	require 'includes/functions.php';
// $msg = "hello world";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buy & Sell Products</title>
	<link rel="stylesheet" href="stylesheet/article.css">
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
					<input type="text">
					<button>SEARCH</button>
				</li>
				<?php 
					if (!isset($_SESSION['user'])){
				?>		
						
						<li onclick = "showSignup()" >SignUp</li>
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
					<div class = "categoryDiv">
						<ul>
			
							<li id = "li1" onclick = "change1()"><a href="article.php?articleCategory=All" >All</a></li>
							<li id = "li2"><a href = "article.php?articleCategory=Agricultural" >Agricultural</a></li>
							<li id = "li3"><a href="article.php?articleCategory=Home Farming">Home Farming</a></li>
							<li id = "li4"><a href="article.php?articleCategory=Fishing">Fishing</a></li>
							<li id = "li5"><a href="article.php?articleCategory=Poultry Farming">Poultry Farming</a></li>
						</ul>
					</div>
				<div class = "rightDiv1">
					<?php 
						if (isset($_GET['articleCategory'])){
							$value = $_GET['articleCategory'];
							// echo $value;

								if ($value === 'All'){
									$sql = "SELECT * FROM article ORDER BY article.date LIMIT 15";
									$res = mysqli_query($con,$sql);
									if ($res){
										while ($row = mysqli_fetch_array($res)){
											echo "<a href='articleDetails.php?articleId=".$row['articleId']."'><h1>" . $row['title'] .  "</h1>";
											echo "<img src= 'articleImage/".$row['image']."' alt = 'please_reload'>";
											echo "<h2>" .$row['regEmail']. "</h2>";
											echo "<h5>Category [" .$row['category']. "]</h5>";
											echo "<h6>Posted On : " .$row['date']. "</h6>";
											echo "<p>" .$row['articlePost']. "</p>";
											echo "<br><hr></a>";		
										}
									}else{
										$msg = "Error in select query for all";
									}
								}else{
									$sql = "SELECT * FROM article WHERE category='$value'";
									$res = mysqli_query($con,$sql);
									if ($res){
										if (mysqli_num_rows($res) > 0){
											while($row = mysqli_fetch_array($res)){
												echo "<a href='articleDetails.php?articleId=".$row['articleId']."'><h1>" . $row['title'] .  "</h1>";
												echo "<img src= 'articleImage/".$row['image']."' alt = 'please_reload'>";
												echo "<h2>" .$row['regEmail']. "</h2>";
												echo "<h5>Category [" .$row['category']. "]</h5>";
												echo "<h6>Posted On : " .$row['date']. "</h6>";
												echo "<p>" .$row['articlePost']. "</p>";
												echo "<br><hr></a>";	
											}
										}else{
											echo "No data to display";
										}
									}else{
										$msg = "Error in select querry for $value";
									}
								}
						}

					?>

				</div>
				<div class='rightDiv2'>
					<?php require 'includes/message.php'; ?>
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
					<input type="text" required placeholder="Email" name="email">
					
					<input type="password" required placeholder="Password" name="password">
					
					
					<input type="submit" name="login" value="LogIn" class = "submitButton">
				</form>
			</div>
		</div>
	</div>

<script src ="javascript/article.js"></script>
</body>
</html>