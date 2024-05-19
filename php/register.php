<?php include '../includes/functions.php'; ?>

<!DOCTYPE html>
<html>
	<head>
		<title>One Opti Inventory Management System</title>
		<link rel="stylesheet" href="../css/register.css">
		<link rel="icon" type="image/x-icon" href="../img/OneOpti.png">

	<style>
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
	</style>

	</head>
	<body>
		<div class="header">
			<h2>Register</h2>
		</div>

		<form method="post" action="register.php">

			<?php echo display_error(); ?>

			<div class="input-group">
				<label>Username</label>
				<input type="text" placeholder="Enter Username" name="username" value="<?php echo $username; ?>">
			</div>
			<div class="input-group">
				<label>Email</label>
				<input type="email" placeholder="Enter Email" name="email" value="<?php echo $email; ?>">
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" placeholder="Enter Password" name="password_1">
			</div>
			<div class="input-group">
				<label>Confirm password</label>
				<input type="password" placeholder="Enter Confirm Passowrd" name="password_2">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" >Register</button>
			</div>
			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
		</form>

		<?php
			include '../includes/footer.php';
		?> 

	</body>
</html>