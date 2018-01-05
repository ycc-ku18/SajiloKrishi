<?php 
error_reporting('E_WARNING');

if (isset($_GET['logout'])){
	logout();
}

function logout(){
	session_start();
	session_destroy();
	header('location:ecommerce.php');
}

if (isset($_GET['logoutAdmin'])){
	logoutAdmin();
}

function logoutAdmin(){
	session_unset('admin');
	header('location:adminLogin.php');

}

//code for adding product to selectedProducts table

if(isset($_POST['add'])){
	addProductsAsSelected();
}

function addProductsAsSelected(){
	$msg = "";
	require 'includes/connect.php';
	$p_id = $_POST['p_id'];
	$sql = "SELECT * FROM products WHERE ProductID='$p_id'";
	$res = mysqli_query($con,$sql);

	if ($res){
			while($row=mysqli_fetch_array($res)){
				$productName = $row['ProductName'];
				$price = $row['Price']*1.1;
				$qty = $row['Qty'];
				$image = $row['Image'];
				$description = $row['Description'];
				$category = $row['category'];
				$keyword = $row['keyword'];
				$unit = $row['unit'];
				$regEmail = $row['RegEmail'];

				$sql = "INSERT INTO selectedItems(ProductName,Price,Qty,Image,Description,category,keyword,unit,RegEmail) VALUES ('$productName','$price','$qty','$image','$description','$category','$keyword','$unit','$regEmail')";
				$res = mysqli_query($con,$sql);
				if ($res){
					$sql = "DELETE FROM products WHERE ProductID='$p_id'";
					$res = mysqli_query($con,$sql);

					if ($res){
					$total = $qty * $price;
					$message = "Congratulations!! Your product $productName has been selected.As per rule of the company you will recieve NRS: $total. \nPlease visit nearby Company store\nThank You!\nAgricultural Nepal Admin";
					$from = "FROM:Agricultural Nepal";
					mail("$regEmail","Agricultural Nepal: Product Selected","$message","$from");
				$msg ="Successfully added to new database and deleted in previous database";
					}else{
						$msg = "Error in delete query";
					}
					
				}else{
					$msg = "Error in insertion in selectedItem";
				}
			}
	}else{
		$msg = "Error in select statement of product in functions.php";
	}
	echo $msg;
}

//module for deleting data;
if (isset($_POST['delete'])){
		deleteProductsAsSelected();
}

function deleteProductsAsSelected(){
	$msg = "";
	require 'includes/connect.php';
	$p_id = $_POST['p_id'];

	$sql = "SELECT * FROM products WHERE ProductID = '$p_id'";
	$res = mysqli_query($con,$sql);
	if ($res){
		while($row = mysqli_fetch_array($res)){
				$productName = $row['ProductName'];
				$regEmail = $row['RegEmail'];

			$sql = "DELETE FROM products WHERE ProductID='$p_id'";
			$res = mysqli_query($con,$sql);

			if($res){
				$message = "We are sorry to inform you that your product $productName has been not selected.\nThank you!\nAgricultural Nepal admin";
				$from = "From: Agricultaral Nepal";
				mail("$regEmail","Agricultural Nepal: Product Rejected","$message","$from");
			$msg = "Successfully deleted";	
			}else{
				$msg = "Error in delete sql query";
			}				
			
		}
	}else{
		$msg = "Error in select product before delete query";
	}


echo $msg;
}


if (isset($_POST['payBill'])){
	payBill();
}

function payBill(){
	add_transaction();
	decreaseQuantity();
	remove_cart();
}

function remove_cart(){
	$ipAddress =  get_client_ip_env();
	require 'includes/connect.php';
	$sql = "DELETE FROM cart WHERE ipAddress = '$ipAddress'";
	$res = mysqli_query($con,$sql);
		if (!$res){
			echo "Error in delete query";
		}
}

function decreaseQuantity(){
	require 'includes/connect.php';

	$ipAddress = get_client_ip_env();

	$sql = "SELECT * FROM cart where ipAddress='$ipAddress'";
	$res = mysqli_query($con,$sql);
		if ($res){
			while ($row = mysqli_fetch_array($res)){
				$pId = $row['pId'];
				$qty = $row['quantity'];
				$unit = $row['unit'];
				$sql1 = "UPDATE selectedItems SET Qty=Qty-'$qty' WHERE ProductID='$pId' ";
				$res1 = mysqli_query($con,$sql1);
					if (!$res1){
							echo "Error in Update query of selectedItems";
					}
			}
		}else{
			echo 'Error in select query first';
		}
}

function add_transaction(){
	require 'includes/connect.php';
	$ipAddress = get_client_ip_env();
	$grandTotal = $_POST['grandTotal'];
	$address = $_POST['address'];
	$contact = $_POST['contactNo'];

	$sql = "INSERT INTO transaction(ipAddress,total,address,contact) VALUES ('$ipAddress','$grandTotal','$address','$contact') ";
	$res = mysqli_query($con,$sql);
		if (!$res){
			echo "Problem in insertion in transaction table";
		}
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