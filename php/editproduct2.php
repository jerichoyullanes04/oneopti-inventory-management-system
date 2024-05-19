<?php
include('../includes/db_connect.php');


$servername="localhost";
$username="root";
$password="";
$database="oneopti_db";
				
//Create connection
$connection = new mysqli($servername, $username, $password, $database);


    $errorMessage="";
    $successMessage="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $product_id = $_POST["product_id"];
    $product_code = $_POST["product_code"];
    $product_name = $_POST["product_name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    

    // ADD NEW PRODUCTS TO INVENTORY


    $query = 'UPDATE products SET product_code="' . $product_code . '", product_name="' . $product_name. '", price="' . $price. '", quantity="' . $quantity. '" WHERE product_id ="' . $product_id . '"';
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

} ?>	
	<script type="text/javascript">
			//alert("You've Update Product Successfully.");
			window.location = "product.php";
		</script>