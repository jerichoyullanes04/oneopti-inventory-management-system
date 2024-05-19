<?php 
include '../includes/bg.php';
include '../includes/topbar.php';
include '../includes/footer.php';
include '../includes/sidebar.php';
?>
<?php 

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}



if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="/One Opti Sales and Inventory Management System/css/register.css">
	<link rel="stylesheet" type="text/css" href="/One Opti Sales and Inventory Management System/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="/One Opti Sales and Inventory Management System/css/footer.css">
</head>

<body>
	<div class="header">
		<h2>Home Page</h2>

		<style>

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

				.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}

	* { margin: 0px; padding: 0px; }
body {
	
	background: #F8F8FF;
}
.header {
	width: 40%;
	margin: 50px auto 0px;
	color: white;
	background: #FF5349;
	text-align: center;
	border: 1px solid #FF5349;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}

.form-container {
    margin-top: 90px;
}

form, .content {
	width: 40%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #FF5349;
	border-radius: 0px 0px 10px 10px;
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
#user_type {
	height: 40px;
	width: 98%;
	padding: 5px 10px;
	background: white;
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
}

.btn:hover{
    opacity: 0.7;
}

.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}
.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}
.profile_info img {
	display: inline-block; 
	width: 50px; 
	height: 50px; 
	margin: 5px;
	float: left;
}
.profile_info div {
	display: inline-block; 
	margin: 5px;
}
.profile_info:after {
	content: "";
	display: block;
	clear: both;
}

.MainDiv {
	margin-bottom: 100px;
}

		</style>

	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<h2>YOUR ACCOUNT</h2>
			<img src="/wstfinals/img/icon_profile.png">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						
                       &nbsp; <a href="../create_user.php"> + add user</a>
					</small>

				<?php endif ?><br>
				<a href="login.php?logout='1'" class="btn">logout</a>
			</div>
		</div>
	</div>

</body>
</html>

