<?php
if(isset($_GET["product_id"])){
	$product_id=$_GET["product_id"];
	
$servername="localhost";
$username="root";
$password="";
$database="oneopti_db";
				
//Create connection
$connection = new mysqli($servername, $username, $password, $database);

$sql="DELETE FROM products WHERE product_id=$product_id";
$connection->query($sql);
}

header("location:product.php");
exit;
?>