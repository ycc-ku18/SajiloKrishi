<?php 
	session_start();
	require 'includes/connect.php';
$msg = "";
	if (isset($_POST['submit'])){
		$username = test_input($_POST['username']);
		$password = md5(
			test_input($_POST['password']));

		$sql = "SELECT * FROM adminlogin WHERE username='$username' and password='$password'";
		$res = mysqli_query($con,$sql);
		if ($res){
			if(mysqli_num_rows($res) == 1){
				$_SESSION['admin'] = $username;
				echo "<script>
					alert('Welcome Admin');
				</script>";
				header('refresh:0,url=adminRedirect.php');
			}else{
				$msg = "Invalid Username & Password";
			}
		}else{
			$msg = "Error in select statement";
		}
	}

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);

return $data;	
}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<link rel="stylesheet" href="stylesheet/adminLogin.css">

</head>
<body>
	<h2>Admin Login Panel</h2>
	<div class = "mainDiv">

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<input type="text" placeholder="UserName" name="username"><br>
			<input type="password" placeholder="Password" name="password"><br>
			<input type="submit" value = "Sign In" name="submit">
		</form>
		<div style="color: #fff;text-align:center;font-weight: bold; margin: 10px;"><?php echo $msg; ?></div>
	</div>
</body>
</html>