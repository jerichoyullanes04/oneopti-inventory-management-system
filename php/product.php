<?php 
include '../includes/sidebar.php';
include '../includes/topbar.php';
include '../includes/footer.php';
?>


<!DOCTYPE html>

<head>
	<title>CRUD OPERATION</title>
	<script src=../js/script.js></script>
	
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
        top: 100px;
        width: 900px;
        height: 420px;
        margin: auto;
        margin-left: 250px;
        margin-top: 10px;
        padding: 10px 30px 10px 30px;
        background: radial-gradient(#FFFFFF,#D3D3D3);
        box-shadow: 5px 10px;
        box-shadow: 10px 10px 5px #888888				
    }

    div.scroll {
        margin:4px, 4px;
        padding:4px;
		margin-top: 15px;
        background: radial-gradient(#FFFFFF,#D3D3D3);
        width: 890px;
        height: 280px;
        overflow-x: hidden;
        overflow-y: auto;
        text-align:justify;
    }

    table {
			width: 890px;
			height: 30px;
			margin: auto;
			table-layout: fixed;
            text-align: center;
		}

		table, tr, td, th {
			border: 1px solid black;
			border-collapse: collapse;
		}

		td, th {
			width: 100px; 
			height: 40px;
			padding:5px 10px;
		}
        
        tr:hover{
	background-color: #D3D3D3;cursor: pointer 
	
	}

	.btn_add {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #FF5349;
	border: none;
	border-radius: 5px;
	text-decoration: none;
	}

	.btn_delete {
	padding: 10px;
	font-size: 15px;
	margin-left: 10px;
	color: white;
	background: #FF0000;
	border: none;
	border-radius: 5px;
	text-decoration: none;
	}

	.btn_edit {
		padding: 10px;
	font-size: 15px;
	color: white;
	background: #afe80d;
	border: none;
	border-radius: 5px;
	text-decoration: none;
	}

	.btn_add:hover{
    opacity: 0.8;
	}

	.btn_delete:hover{
    opacity: 0.7;
	}

	.btn_edit:hover{
    opacity: 0.3;
	}

    </style>

</head>

<body>
<!-- MAIN DIV -->
	<div class="mainDiv">
		<h2>List of Products</h2>

		<!-- <a class="btn_add" href="addproduct.php" role="button">New Product</a> -->
		<br>

        <!-- SCROLLABLE TABLE DIV --> 
        <div class="scroll">
            <div class="container">
                <div class="tab tab-1">
                    <table id="table" border="1">
                        <thead>
                            <tr>
                                <th>PRODUCT ID</th>
								<th>PRODUCT CODE</th>
                                <th>PRODUCT NAME</th>
                                <th>PRICE</th>
                                <th>CATEGORY</th>
                                <th>QUANTITY</th>
                            </tr>
                        </thead>
                </div>
            </div>
        </div>
			<tbody>
				<?php
				$servername="localhost";
				$username="root";
				$password="";
				$database="oneopti_db";
				
				//Create connection
				$connection = new mysqli($servername, $username, $password, $database);
				
				//Check Connection
				if($connection->connect_error){
					die("Connection Failed. ". $connection->connect_error);
				}
				
				//read all row from database table
				$sql= 'SELECT product_id, product_code, product_name, price, category_name, quantity FROM products p join category c on p.category_id=c.category_id GROUP BY product_code';
				$result=$connection->query($sql);
				
				if(!$result){
					die("Invalid query ".$connection->error);
				}
				
				//read each row
				while($row=$result->fetch_assoc()){
					echo"
					<tr>
					<td>$row[product_id]</td>
					<td>$row[product_code]</td>
					<td>$row[product_name]</td>
					<td>$row[price]</td>
					<td>$row[category_name]</td>
					<td>$row[quantity]</td>
					<td>
						<a class='btn_edit' href='editproduct.php?product_id=$row[product_id]'>Edit</a>
						<a class='btn_delete' href='deleteproduct.php?product_id=$row[product_id]'>Delete</a>
					</td>
				</tr>	
					";
				}
				?>
				
			</tbody>
	</div>

</body>

</html>