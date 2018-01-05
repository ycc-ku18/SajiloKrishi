<?php 
	require 'includes/connect.php';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buy & Sell Products</title>
	<link rel="stylesheet" href="stylesheet/viewStatus.css">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
	<div class = "main">
		<header>Sajilo Krishi</header>
		<div class = "div1">

			<?php 
				$id = $_POST['tid'];
				$sql = "SELECT * FROM transaction WHERE trId = '$id'";
				$result = mysqli_query($con, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				if($resultCheck > 0) {
					$row = mysqli_fetch_assoc($result);
					$stage = $row['status'];
					if($stage === 'received') {
						$progress = 20;
						
					}
					if($stage == 'checking'){
						$progress = 40;
					

					}
					if($stage == 'packing') {
						$progress = 60;
						

					}
					if($stage == 'ontheway') {
						$progress = 80;
						

					}
					if($stage == 'delivered') {
						$progress = 100;
						

					}else {
						$progress = 0;
						$stage = 'unprocessed';
					}

					echo "<h1>Your Product Delivery is ".$progress."% completed.</h1><h3>It's in the ' ".$stage."' phase.</h3>";

				}

			 ?>
		</div>
	</div>
</body>
</html>