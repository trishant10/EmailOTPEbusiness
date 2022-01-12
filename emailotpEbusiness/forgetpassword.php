<?php
require_once("function.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Email Verification using OTP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="http://code.jquery.com/jquery.js"></script>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<br />
		<div class="container">
			<br />

			<div class="row">
				<div class="col-md-3">&nbsp;</div>
				<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Forget Password</h3>
				</div>
				<div class="panel-body">
					<?php echo $message; ?>
					<form method="post">
						<div class="form-group">
							<label>Enter Your Password</label>
							<input type="password" name="user_password" class="form-control" />
							<?php echo $error_user_password; ?>
						</div>

						<div class="form-group">
							<label>Confirm Your Password</label>
							<input type="password" name="confirm_password" class="form-control" />
							<?php echo $error_confirm_password; ?>
						</div>
						<div class="form-group">
							<input type="submit" name="password_register" class="btn btn-primary" value="Change Password" />&nbsp;&nbsp;&nbsp;
						</div>
						<div align="center"><a href="index.php">Click here to login</a></div>
					</form>
				</div>
			</div>
		</div>
	</div>

		</div>
		<br />
		<br />


	</body>
</html>