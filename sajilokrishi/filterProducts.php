<?php 
	session_start();
	require_once 'includes/connect.php';
	require 'includes/functions.php';


	if (!isset($_SESSION['admin'])){
		header('location:adminLogin.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filter Products</title>
	<link rel="stylesheet" href="stylesheet/filter.css">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
	<div class = "mainWrapper">
		<header>Sajilo Krishi</header>


		<div class = "div1">
			<h3>Filter Products to add or delete from our website.</h3>
		<form action="searchAdminLeft.php" method = "POST">
			<input type="text" placeholder="Product Name" name = "keyword">
			<input type="submit" value = "Search" name='searchProductProducer'>
		</form>
		<?php 
			$sql = "SELECT * from products";
			$result = mysqli_query($con, $sql);
			$resultCheck = mysqli_num_rows($result);
			echo "<table cellpadding= 0 cellspacing = 0>";
			if($resultCheck > 0) {
				echo "
					<tr>
						<th>S.NO</th>
						<th>Product Name </th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Description</th>
						<th>Category</th>
						<th>KeyWord</th>
						<th>Confirm</th>
						<th>Reject</th>


					</tr>

				";
				
				$count = 1;
				while($row = mysqli_fetch_assoc($result)){
					echo "
						<tr>
							<td>" .$count."</td>
							<td>".$row['ProductName']."</td>
							<td>".$row['Price']."</td>
							<td>".$row['Qty']."</th>
							<td>".$row['Description']."</td>
							<td>".$row['category']."</td>
							<td>".$row['keyword']."</td>";
							?>
							<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
								<input type="hidden" name="p_id" value="<?php echo $row['ProductID']; ?>">
								<td> <input type='submit' class='Add' name='add' value='Add'></td>
							</form>
							<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> ">
								<input type="hidden" name="p_id" value="<?php echo $row['ProductID']; ?>">
								<td ><input type='submit' class='Delete' name='delete' value='Delete' onclick="return confirm('Are you sure want to delete this?')" class = "delete"></td>
							</form>
							<!-- <th> <div class="addDeleteButtonStyle Add"><a href='<?php echo $_SERVER["PHP_SELF"]."?p_id=".$row['ProductID'] ?>&add=true'>Add</a></div></th>
							<th><div class="addDeleteButtonStyle Delete"><a onclick="return confirm('Are you sure want to delete this?')" href='<?php echo $_SERVER["PHP_SELF"]."?p_id=".$row['ProductID'] ?>&delete=true'>Delete</a></div></th> -->

		<?php 
					
					++$count;						
				}

				
			}
			echo "</table>";

		 ?>
		</div>

		<div class = "div2">
			<div class = "div2A">
				<h3>Product Request From Consumers.</h3>
				<form action="searchAdminRightTop.php" method = "POST">
					<input type="text" placeholder="Product Name" name = "keyword">
					<input type="submit" value = "Search" name="searchRequest">
				</form>
			<?php 
				$sql = "SELECT * FROM requestproducts;";
				$result = mysqli_query($con, $sql);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck > 0) {
						echo "<table cellspacing = '0' cellpadding = '0'>";
							echo "
								<tr>
									<th>Product Name</th>
									<th>Product Category</th>
									<th>Updated Date</th>
									<th>Demand (Units)</th>
								</tr>
			
							";
					while($row = mysqli_fetch_assoc($result)) {


							echo "
								<tr>
									<td>".$row['ProductName']."</td>
									<td>".$row['ProductCategory']."</td>
									<td>".$row['updatedDate']."</td>
									<td>".$row['Demand']."</td>
								</tr>

							";

					}
						echo"</table>";
				}

			 ?>
			</div>

			<div class = "div2B">
				<h3>Current Available Products</h3>

				<form action="searchAdminRightBottom.php" method = "POST">
					<input type="text" placeholder="Product Name" name = "keyword">
					<input type="submit" value = "Search" name="searchExistProduct">
				</form>
			<?php 
				$sql = "SELECT * FROM selecteditems";
				$result = mysqli_query($con, $sql);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck > 0) {
						echo "<table cellspacing = '0' cellpadding = '0'>";
							echo "
								<tr>
									<th>Product Name</th>
									<th>Product Category</th>
									<th>Quantity</th>
									<th>Demand (Units)</th>
								</tr>
			
							";
					while($row = mysqli_fetch_assoc($result)) {


							echo "
								<tr>
									<td>".$row['ProductName']."</td>
									<td>".$row['category']."</td>
									<td>".$row['Qty']."</td>
									<td>".$row['unit']."</td>
								</tr>

							";

					}
						echo"</table>";
				}

			 ?>
			</div>
		</div>
	</div>
</body>
</html>

