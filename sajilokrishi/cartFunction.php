<?php 


if (isset($_POST['addToCart'])){
	insertToCartTable();
}

function insertToCartTable(){

	$msg = "";
	require 'includes/connect.php';
	//variables
	$pId = $_POST['p_id'];
	$ipAddress = get_client_ip_env();
	$qty = $_POST['qty'];
	$category = $_POST['category'];
	$unit = $_POST['unit'];
	$deliveryCharge = $_POST['deliveryCharge'];
	
	$sql = "INSERT INTO cart VALUES ('$pId','$ipAddress','$qty','$unit')";
	$res = mysqli_query($con,$sql);


	if($res){
		$msg = "Successfully Added to cart";
		// header('location:category.php?value='.$category);
		header('location:ecommerce.php');
	}else{
		$msg = "Error in insertion to cart table";
	}

echo $msg;


}

function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}


?>