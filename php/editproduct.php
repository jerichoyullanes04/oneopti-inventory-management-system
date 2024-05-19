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

$product_id = "";
$product_name="";
$price="";
$category="";
$quantity="";

$errorMessage ="";
$successMessage ="";

if($_SERVER['REQUEST_METHOD']=='GET'){
	// GET method: Show the data of the product

if(!isset($_GET["product_id"])){
	header("location:product.php");
	exit;
	}
	
	$product_id=$_GET["product_id"];
	
	//read the row of the selected student from the database table
	$sql="SELECT * FROM products WHERE product_id=$product_id";
	$result = $connection->query($sql);
	$row = $result->fetch_assoc();
	
	if(!$row){
		header("location:product.php");
		exit;
	}		
	// Display the value from database to input rows
	$product_id=$row["product_id"];
    $product_code=$row["product_code"];
	$product_name=$row["product_name"];
	$price=$row["price"];
	$category_id=$row["category_id"];
	$quantity=$row["quantity"];
 }

?>

<?php
	// SAVE CATEGORY TO DATABASE FUNCTION
	$sql = "SELECT DISTINCT category_name, category_id FROM category order by category_name asc";
	$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

	$opt = "
			<option disabled selected>Select Category</option>";
	while ($row = mysqli_fetch_assoc($result)) {
		$opt .= "<option value='".$row['category_id']."' selected='selected' disabled>".$row['category_name']."</option>";
	}
	$opt .= "";
?>


<!DOCTYPE
<head>
	<title>EDIT PRODUCT</title>

	<script src=../js/script.js></script>
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

div.scroll {
        margin:4px, 4px;
        padding:4px;
		margin-top: 15px;
        background: radial-gradient(#FFFFFF,#D3D3D3);
        width: 890px;
        height: 380px;
        overflow-x: hidden;
        overflow-y: auto;
        text-align:justify;
    }

	</style>
</head>


<body>
	<div class="mainDiv">
		<h2>Edit Product</h2>
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
		<div class="scroll">
			<form action="editproduct2.php" method="post">
				<div class="input-group">
					<label class="col-sm-3 col-form-label">Product ID</label>
					<div class="cols-sm-6">
						<input type="text" class="form-control" name="product_id" value="<?php echo(isset($product_id))?$product_id:'';?>">
					</div>	
				</div>
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
						<a class="btn btn-outline-primary" href="product.php" role="button">Cancel</a>
					</div>
				</div>		
			</form>
		</div>
	</div>			
</body>
</html>
