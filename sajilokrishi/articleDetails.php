<?php 
	session_start();
	require 'includes/connect.php';
	require 'authentication.php';
	require 'includes/functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buy & Sell Products</title>
	<link rel="stylesheet" href="stylesheet/article.css">
	<link rel="stylesheet" href="stylesheet/main.css">
	<link rel="stylesheet" href="stylesheet/articleDetails.css">
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
				<li>Cart</li>
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

						if (isset($_GET['articleId'])){
							$articleId = $_GET['articleId'];
							$sql = "SELECT * FROM article WHERE articleId='$articleId'";
							$res = mysqli_query($con,$sql);

							if ($res){
								if (mysqli_num_rows($res)>0){
									while($row = mysqli_fetch_array($res)){
									echo "
										<div class='view_article'>
											<div class='view_article_image'>
												<img src='articleImage/".$row['image']."' style='width:100%;height:auto;'>
											</div>
											<div = 'view_article_content'>
												<div class='view_article_content_title'>
													".$row['title']."
												</div>
												<div class='view_article_content_author'>
													".$row['regEmail']."
												</div>
												<div class='view_article_content_time'>
													Posted On:<span style='color: #888;font-size: 14px;font-style: italic;'>".$row['date']."</span>
												</div>
												<div class='view_article_content_post'>
													".$row['articlePost']."
												</div>
												

											</div>
										</div>
								";
									}
								}else{
									echo "num of rows matched is zero";
								}
							}else{
								echo "Error in sql code";
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