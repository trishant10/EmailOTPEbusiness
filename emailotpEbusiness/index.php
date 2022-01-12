<?php
	require_once("function.php");
?>

<html>
<head>
<title>Email Verification Using OTP</title>
</head>
<body>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Email Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
					<h3 class="panel-title">Login</h3>
				</div>
				<div class="panel-body">

<form method="post" action="">
		<?php 
			if($goto == 1) // Enter OTP section (goto = 1)
			{ 
		?>
			<p style="color:#31ab00;"><?php echo $_SESSION['info']; ?></p>

			<div class="form-group">
				<label>Enter One Time Password (OTP)</label>
				<input type="text" name="otp" placeholder="One Time Password" class="form-control" />
			</div>
			<?php echo $error_message; ?>

			<div class="form-group" align="right">
				<input type="submit" name="submit_otp" class="btn btn-primary" value="Next" />
				<input type="submit" name="resend_otp" id="next" class="btn btn-light" value="Resend OTP" />
			</div>
			<div align="center"><a href="index.php">Click here to login again.</a></div>

		<?php 
			}
			else if($goto == 2) //Enter password (goto = 2)
			{
		?>
			<div class="form-group">
				<label>Enter Password</label>
				<input type="password" name="user_password" id="user_password" class="form-control" />
				<span id="user_password_error" class="text-danger"></span>
				<?php echo $error_message; ?>
				</div>
				<div class="form-group" align="right">
				<input type="hidden" name="action" id="action" value="password" />
				<input type="submit" name="submit_password" id="next" class="btn btn-primary" value="Submit" />
				<div align="center"><a href="forgetpassword.php">Forget Password? Click Here</a></div>

			</div>
		<?php
		    }
		    else if ($goto == 3) //direct to home page
		    {
		    $otp = $_SESSION['otp'];
		    $result = mysqli_query($conn,"SELECT * FROM otpstore WHERE otp='".$otp."'");
			$count=mysqli_num_rows($result);
			if($count > 0)
			{
			header("Location: home.php");
			}
		?>
		<?php
			}
			else //login page
			{
		?>
			<div class="form-group" id="email_area">
				<label>Enter Email Address</label>
				<input type="text" name="user_email" id="user_email" class="form-control" />
				<span id="user_email_error" class="text-danger"></span>
				<?php echo $error_message; ?>
			</div>
			<div class="form-group" align="left">
				<input type="hidden" name="action" id="action" value="email" />
				<input type="submit" name="submit_email" id="next" class="btn btn-primary" value="Login" />
			</div>
							
			<div align="center"><a href="register.php">Not registered? Click here to register</a></div>
			</div> <!-- pannel body -->
			</div>
			</div>
			</div>
			<?php 
			}
		?>
	
</form>	
		</div>
		<br />
		<br />
	</body>
</html>

