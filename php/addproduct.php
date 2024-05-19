<?php 

include '../includes/sidebar.php';
include '../includes/topbar.php';
include '../includes/footer.php';
include '../includes/db_connect.php';


$servername="localhost";
$username="root";
$password="";
$database="oneopti_db";
				
//Create connection
$connection = new mysqli($servername, $username, $password, $database);

$product_code="";
$product_name="";
$price="";
$category="";
$quantity="";

$errorMessage="";
$successMessage="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$product_code = $_POST["product_code"];
	$product_name = $_POST["product_name"];
	$price = $_POST["price"];
	$category = $_POST["category"];
	$quantity = $_POST["quantity"];

	// PRODUCT NAME VALIDATION
	$sql_u = "SELECT * FROM products WHERE product_name='$product_name'";
	$res_u = mysqli_query($connection, $sql_u);

	if (mysqli_num_rows($res_u) > 0) {

		echo '<script>alert("Sorry, This Product Already Added")</script>';

	} else {
		do {
			if (empty($product_name) || empty($price) || empty($category) || empty($quantity)) {

				echo '<script>alert("All fields are required")</script>';
				break;
			}

			// ADD NEW PRODUCTS TO INVENTORY
			$sql = "INSERT INTO products VALUES('','$product_code','$product_name','$price','$category','$quantity')";
			$result = $connection->query($sql);

			if (!$result) {
				$errorMessage = "Invalid query " . $connection->error;
				break;
			}

			$product_code = "";
			$product_name = "";
			$price = "";
			$category = "";
			$quantity = "";

			$successMessage = "Product added successfully";

			echo "<script> window.location.href='product.php';</script>";
			exit;

		} while (false);
	}
} ?> 

<?php
	// SAVE CATEGORY TO DATABASE FUNCTION
	$sql = "SELECT DISTINCT category_name, category_id FROM category order by category_name asc";
	$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

	$opt = "
			<option disabled selected>Select Category</option>";
	while ($row = mysqli_fetch_assoc($result)) {
		$opt .= "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
	}
	$opt .= "";
?>

<!DOCTYPE
<head>
	<title>ADD PRODUCT</title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

	<style>

body {
		background-image: url('../img/OneOpti.png');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
		background-position-x: 700px;
		z-index: 100;
	}

			.mainDiv {
        position: absolute;
        top: 70px;
        width: 900px;
        height: 480px;
        margin: auto;
        margin-left: 250px;
        margin-top: 10px;
        padding: 10px 30px 10px 30px;
        background: radial-gradient(#FFFFFF,#D3D3D3);
        box-shadow: 5px 10px;
        box-shadow: 10px 10px 5px #888888				
    }

	.input-group {
	margin: 10px 0px 10px 0px;
}

.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
	.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #FF5349;
	border: none;
	border-radius: 5px;
	text-decoration:none
}

.btn-row {
	display: flex;
	align-items: center;
	width: 150px;
	height: 40px;
	justify-content: space-between;
}

.btn:hover{
    opacity: 0.7;
}

.custom-select {
	
}

.select {
	position: relative;
	display: flex;
	width: 860px;
	height: 45px;
}


	</style>
</head>

<body>
	<div class="mainDiv">
		<h2>Add Product</h2>
			<?php
			if (!empty($errorMessage)){
				echo"
				<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					<strong>$errorMessage</strong>
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				</div>
				";		
			}	
			?>
			
			<form method="post">
				<div class="input-group">
					<label class="col-sm-3 col-form-label">Product Code</label>
					<div class="cols-sm-6">
						<input type="text" class="form-control" name="product_code" value="<?php echo(isset($product_code))?$product_code:'';?>">
					</div>	
				</div>
				<div class="input-group">
					<label class="col-sm-3 col-form-label">Product Name</label>
					<div class="cols-sm-6">
						<input type="text" class="form-control" name="product_name" value="<?php echo(isset($product_name))?$product_name:'';?>">
					</div>	
				</div>
				<div  class="input-group">
					<label class="col-sm-3 col-form-label">Price</label>
					<div class="cols-sm-6">
						<input type="number" class="form-control" name="price" value="<?php echo (isset($price))?$price:''; ?>">
					</div>	
				</div>

				<div class="custom-select" style="width:200px;">
					<div  class="input-group">
						<label class="col-sm-3 col-form-label">Category</label>
						<div class="cols-sm-6">
						<select class="select" name='category'>
							<?php
								echo $opt;
							?>
						</select>
						</div>	
					</div>
				</div>

				<div class="input-group">
					<label class="col-sm-3 col-form-label">Quantity</label>
					<div class="cols-sm-6">
						<input type="text" class="form-control" name="quantity" value="<?php echo (isset($quantity))?$quantity:''; ?>">
					</div>	
				</div>
				
				<?php
				if( !empty($successMessage)){
					echo"
					<div class='row mb-3'>
						<div class='offset-sm-3 col-sm-6'
							<div class='alert alert-success alert-dismissible fade show' role='alert'>
								<strong>$successMessage</strong>
								<button type='button class='btn-close' data-bs-dismiss='alert' aria-label='Close'</button>
							</div>
						</div>
					</div>
					";	
				}
				?>
				<div class="btn-row">
					<div class="offset-sm-3 col-sm-3 d-grid">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					<div class="col-sm-3 d-grid">
						<a class="btn btn-outline-primary" href="sales_inventory.php" role="button">Cancel</a>
					</div>
				</div>		
			</form>
	</div>			
</body>
</html>