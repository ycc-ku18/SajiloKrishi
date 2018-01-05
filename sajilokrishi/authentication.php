<?php 
$msg = "";
//PHP code for signup
if (isset($_POST['signup'])){
	$fullName = test_input(ucwords($_POST['fullName']));
	$email = test_input($_POST['email']);
	$password = md5(test_input($_POST['password']));
	$location = test_input($_POST['select']);

	if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$msg = "Invalid Email";
	}else{
		$sql = "SELECT * FROM register where email='$email'";
		$res = mysqli_query($con,$sql);
		if (mysqli_num_rows($res)>0){
			$msg  = "Email already used";
		}else{
			$sql = "INSERT INTO register(fullName,email,password,location) VALUES('$fullName','$email','$password','$location')";
			$res = mysqli_query($con,$sql);
			if ($res){
				//Redirect here
				$msg="Signup successfull!";
				$_SESSION['loggedInEmail'] = $email;

			}else{
				$msg = "Error in signup";
			}
		}
	}

}
//PHP code for login
if(isset($_POST['login'])){
	$email = test_input($_POST['email']);
	$password = md5(test_input($_POST['password']));

	// if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
	// 	echo "Invalid Email";
	// }else{
		$sql = "SELECT * FROM register WHERE (email='$email' OR mobileNum='$email') and password='$password'";
		$res = mysqli_query($con,$sql);
		if (mysqli_num_rows($res)==1){
			$msg = "Succesfully Logged In";
			echo "<script type='text/javascript'>
					alert('$msg');
				</script>";
				$_SESSION['user'] = $email;
				while ($row = mysqli_fetch_array($res)){
					$_SESSION['fullName'] = $row['fullName'];
				}
		}else{
			echo "Invaid username & password";
		}
	// }

}

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>