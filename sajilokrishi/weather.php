<?php 
	error_reporting('E_WARNING');
	session_start();
	require 'includes/connect.php';
	require 'authentication.php';
	require 'includes/functions.php';

	$varForSingleSearch = false;
	if (!isset($_POST['submit'])){		
		$api_url = "https://nepal-weather-api.herokuapp.com/api/?place=all";
	}else{
		if (isset($_POST['search_input']) and !empty($_POST['search_input'])){
			//echo $_POST['search_input'];
			$api_url = "https://nepal-weather-api.herokuapp.com/api/?place=".$_POST['search_input'];
			$varForSingleSearch = true;
		}else{
			$api_url = "https://nepal-weather-api.herokuapp.com/api/?place=all";
		}
	}
	$weather_data = file_get_contents($api_url);
	$json = json_decode($weather_data, TRUE);	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buy & Sell Products</title>
	<link rel="stylesheet" href="stylesheet/main.css">
	<link rel="stylesheet" href="stylesheet/table.css">
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
					<?php 
						require 'includes/navigation.php';
					?>
				</div>
			</div>
			<div class = "rightDiv">
				
				<div class = "rightDiv1">
					<!--main ecommerce section here -->
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
						<input type="text" name="search_input" placeholder="Enter city...">
						<input type="submit" name="submit">
					</form>
					<table id="result">
					  <tr>
					    <th>Station</th>
					    <th>Maximum Temp.<br>(°C)</th>
					    <th>Minimum Temp.<br>(°C)</th>
					    <th>24 hrs Rainfall<br>(mm)</th>
					  </tr>
					  <?php 

					  if ($varForSingleSearch){
					  	if ($json['place'] == ucfirst(strtolower($_POST['search_input']))){
					  ?>
					  		
					  		<tr>
					  			<td><?php echo $json['place'] ?></td>
					  			<td><?php echo $json['max'] ?></td>
					  			<td><?php echo $json['min'] ?></td>
					  			<td><?php echo $json['rain'] ?></td>
					  		</tr>
					  <?php
				  		}else{
				  			echo '<script>alert("Searched Result not found");</script>';
				  		}
					  }else{
					  	foreach($json as $key => $value ){
					  		foreach($value as $key1 => $val ){
					   ?>
						  <tr>
						    <td><?php echo $val['place'] ?></td>
						    <td><?php echo $val['max'] ?></td>
						    <td><?php echo $val['min']?></td>
						    <td><?php echo $val['rain']?></td>
						  </tr>
					  <?php 
					  		}
					  	}
					  }
					  ?>
					</table>
					<b>Source: www.mfd.gov.np</b>
				</div>
				<div class = "rightDiv2">
					<h3>Messages</h3>
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


<script src ="javascript/main.js"></script>
</body>
</html>