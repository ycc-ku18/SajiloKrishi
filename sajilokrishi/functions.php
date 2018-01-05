<?php 

if (isset($_GET['logout'])){
	logout();
}

function logout(){
	session_start();
	session_destroy();
	//header('location:ecommerce.php');
}

?>