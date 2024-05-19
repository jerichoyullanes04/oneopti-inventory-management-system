<?php 
include '../includes/topbarpos.php';
include '../includes/footer.php';
include '../includes/sidebar2.php';
?>



<!DOCTYPE html>
<html>
<head>
	
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/register.css">

	<style>
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #FF5349;
	text-decoration: none;
	border: none;
	border-radius: 5px;
}

	</style>
</head>
<body>
	<div class="MainDiv">
		<div class="header">
			<h2>Home Page</h2>
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
				<img src="../img/icon_profile.png"  >
				<a class="btn" href="login.php?logout='1'" style="color: red;">logout</a>
				<div>
					<?php  if (isset($_SESSION['user'])) : ?>
						<strong><?php echo $_SESSION['user']['username']; ?></strong>

						<small>
							<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
							<br>
							
						</small>

					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>