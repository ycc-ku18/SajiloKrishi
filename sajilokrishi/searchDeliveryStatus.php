<?php 
	session_start();
	require 'includes/connect.php';

	if (isset($_POST['updateStatus'])){
		$value = $_POST['status'];
		$trId = $_POST['tr_id'];
		$sql = "UPDATE transaction SET status='$value' WHERE trId='$trId'";
		$res = mysqli_query($con,$sql);
			if(!$res){
				echo "Error in update statement";
			}
	}

	// if (isset($_POST['submitkeyword'])){
	// 	$keyword = $_POST['keyword'];
	// }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buy & Sell Products</title>
	<link rel="stylesheet" href="stylesheet/article.css">`
	<link rel="stylesheet" href="stylesheet/deliveryStatus.css">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
	<h1>
		Sajilo Krishi
	</h1>
	<div class = "searchBoxDiv">
		<form action="searchDeliveryStatus.php" method="POST">
			<input type="text" class = 'searchBox' name="keyword" placeholder='Search Transaction Id...'>
			<input type="submit" value = "Search" class = "searchButton" name="submitkeyword">
		</form>
	</div>
	<div class = "mainDiv">

		<?php 
			if (isset($_POST['submitkeyword'])){
				$keyword = $_POST['keyword'];
				$sql = "SELECT * FROM transaction WHERE trId LIKE '%$keyword%'";
			$result = mysqli_query($con, $sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck > 0 ){
				echo "<table cellspacing=0 cellpadding=0>";
				echo "<tr>
					<th>TransactionID</th>
					<th>IP</th>
					<th>Total</th>
					<th>Address</th>
					<th>Contact</th>
					<th>Time</th>
					<th>Previous Status</th>
					<th>Updated Status</th>


				</tr>";
				while($row = mysqli_fetch_assoc($result)) {
					echo "
						<tr>
							<td>".$row['trId']."</td>
							<td>".$row['ipAddress']."</td>
							<td>".$row['total']."</td>
							<td>".$row['address']."</td>
							<td>".$row['contact']."</td>
							<td>".$row['time']."</td>
							<td>".$row['status']."</td>

							<td>
							<form action='deliveryStatus.php' method='POST'>
								<select name='status' id='statusID' onchange = 'changeStatus()'>
								<option value=''>Select</option>
								<option value='received'>received</option>
								<option value='checking'>checking</option>
								<option value='packing'>packing</option>
								<option value='ontheway'>ontheway</option>
								<option value='delivered'>delivered</option>
								</select>
								<input type='hidden' value='".$row['trId']."' name='tr_id'>
								<input type='submit' value = 'update' name='updateStatus'>
							</form>

							</td>

						</tr>

					";
				}
				echo "</table>";

			}else {
				echo "<h3>No Items to Deliver.</h3>";
			}

			}
		 ?>
	</div>

</body>
</html>

<!-- location.href = \"changeStatus.php?id=".$row['trId']."&value=5\" -->