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
			$title = test_input($_POST['title']);
			$category = $_POST['Category'];
			$image = test_input($_FILES['image']['name']);
			$article = test_input($_POST['article']);
			$keyword = test_input($_POST['keyword']);
			$target = 'articleImage/'.basename($image);
			$email = $_SESSION['user'];

			if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
				$sql = "INSERT INTO article(title,category,image,regEmail,articlePost,keyword) VALUES ('$title','$category','$image','$email','$article','$keyword')";
				$res = mysqli_query($con,$sql);
					if ($res){
						$msg = "Successfully Inserted";
					}else{
						$msg = "Problem in insertion";
					}

			}else{
				$msg = "Error in uploading Image";
			}

		}else{
			$msg = "LogIn Required";
		}
	}
	//echo $msg;

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
					<input type="text">
					<button>SEARCH</button>
				</li>
				<?php 
					if (!isset($_SESSION['user'])){
						echo '
						<li onclick = "showSignup()">SignUp</li>
						<li onclick = "showLogin()">LogIn</li>
						';
				
					}else {
						echo '
							<h3>Hello,  ' .$_SESSION['fullName'] . '</h3>'  
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
						
						<label for="Product Name">Title</label><br>
						<input type="text" placeholder="Article" name="title"><br>
						<label for="Category">Category</label><br>
						<select name="Category" id="CategoryID">
							<option value="">Select Category</option>
							<option value="Agricultural">Agricultural</option>
							<option value="Home Farming">Home Farming</option>
							<option value="Data">Data</option>
							<option value="Poultry Farming">Poltry Farming</option>
							<option value="Compost Manure">Compost Manure</option>
							<option value="Fishing">Fishing</option>
						</select><br>

						<label for="Image">Image</label><br>
						<input type="file" name="image"><br>
						<label for="Description">Article</label><br>
						<textarea name="article" id="" cols="30" rows="5" placeholder="Aricle..."></textarea><br>
						<label for="Keyword">Keyword</label><br>
						<input type="text" placeholder="Keyword for you Article" name="keyword"><br>
						<input type="submit" name="submit">

					</form>	
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