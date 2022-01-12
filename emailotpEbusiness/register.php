<?php
session_start();

$conn = mysqli_connect("localhost","root","","user_otp_login");

$message = '';
$error_user_name = '';
$error_user_email = '';
$error_user_password = '';
$error_confirm_password = '';
$user_name = '';
$user_email = '';
$user_password = '';


if(isset($_POST["register"]))
{
	if(empty($_POST["user_name"]))
	{
		$error_user_name = "<label class='text-danger'>Enter Name</label>";
	}
	else
	{
		$user_name = trim($_POST["user_name"]);
		$user_name = htmlentities($user_name);
	}

	if(empty($_POST["user_email"]))
	{
		$error_user_email = '<label class="text-danger">Enter Email Address</label>';
	}
	else
	{
		$user_email = trim($_POST["user_email"]);
		if(!filter_var($user_email, FILTER_VALIDATE_EMAIL))
		{
			$error_user_email = '<label class="text-danger">Enter Valid Email Address</label>';
		}
	}


	if($_POST["user_password"] !== $_POST["confirm_password"])
		{
        $error_confirm_password = '<label class="text-danger">Password Not Matched</label>';
    	}
	if(empty($_POST["user_password"]))
	{
		
		$error_user_password = '<label class="text-danger">Enter Password</label>';
	}
	else
	{
		$user_password = trim($_POST["user_password"]);
		$user_password = password_hash($user_password, PASSWORD_DEFAULT);
	}

	if($error_user_name == '' && $error_user_email == '' && $error_user_password == '' && $error_confirm_password =='')
	{
		$query = "SELECT * FROM registered_user WHERE user_email = '$user_email'";
    	$run_Sql = mysqli_query($conn, $query);
    		if($run_Sql){
	        $fetch_info = mysqli_fetch_assoc($run_Sql);
	        $existing_email = $fetch_info['user_email'];
	        }

		if( $existing_email== $user_email)
		{
			$message = '<label class="text-danger">Email Already Register</label>';
		}	
		else
		{
		$query = "
		INSERT INTO registered_user (user_name, user_email, user_password)
		SELECT * FROM (SELECT '$user_name', '$user_email', '$user_password') AS tmp
		WHERE NOT EXISTS ( SELECT user_email FROM registered_user WHERE user_email = '$user_email') LIMIT 1";
		$result = mysqli_query($conn, $query);
			echo "<script>
			alert('Register success. Directing to login page');
			window.location.href='index.php';
			</script>";
		}

	}
}

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
					<h3 class="panel-title">Registration</h3>
				</div>
				<div class="panel-body">
					<?php echo $message; ?>
					<form method="post">
						<div class="form-group">
							<label>Enter Your Name</label>
							<input type="text" name="user_name" class="form-control" />
							<?php echo $error_user_name; ?>
						</div>
						<div class="form-group">
							<label>Enter Your Email</label>
							<input type="text" name="user_email" class="form-control" />
							<?php echo $error_user_email; ?>
						</div>
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
							<input type="submit" name="register" class="btn btn-primary" value="Click to Register" />&nbsp;&nbsp;&nbsp;
						</div>
						<div align="center"><a href="index.php">Already registered? Click here to login</a></div>
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