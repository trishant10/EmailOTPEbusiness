<?php
session_start();
date_default_timezone_set("Asia/Kathmandu");
$goto = "";
$error_message = "";
$user_email = "";
$user_name = "";
$otp = "";

$message = '';
$error_user_name = '';
$error_user_email = '';
$error_user_password = '';
$error_confirm_password = '';
$user_password = '';

$conn = mysqli_connect("localhost","root","","user_otp_login");

// If user click submit email
if(!empty($_POST["submit_email"])) {
    $email = $_POST['user_email'];
	$result = mysqli_query($conn,"SELECT * FROM registered_user WHERE user_email = '" . $_POST["user_email"] . "'");
	$count = mysqli_num_rows($result);
	if($count>0) {
		// generate OTP
		function random_code($length_of_string)
		{
			$str_result = '0123456789abcdefghijklnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			return substr(str_shuffle($str_result), 0, $length_of_string);
		}
		$otp = random_code(6);
		// Send OTP
		require_once("mail_function.php");
		$sendmail = sendOTP($_POST["user_email"],$otp);
		 $sendmail=1; 
		if($sendmail == 1) {
			$result = mysqli_query($conn,"INSERT INTO otpstore(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$current_id = mysqli_insert_id($conn);
			if(!empty($current_id)) {
				$info = "A verification code is sent to your email - $email";
				$_SESSION['info'] = $info;
                $_SESSION['user_email'] = $email;
                $_SESSION['otp'] = $otp;
				$goto = 1;
			}
		}
	} else {
		$error_message = "<label class='text-danger'>Email does not exist</label>";	
	}
}

//If user click send otp
if(!empty($_POST["submit_otp"])) {
	$result = mysqli_query($conn,"SELECT * FROM otpstore WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 2 MINUTE)");
	$count  = mysqli_num_rows($result);
	if(!empty($count)) {
		$result = mysqli_query($conn,"UPDATE otpstore SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$_SESSION['otp'] = $_POST["otp"];
		$goto = 2;	
	} else {
		$goto =1;
		$error_message = "<label class='text-danger'>Invalid OTP!</label>";
	}	
}

//If user click resend OTP
if(!empty($_POST["resend_otp"])) {
    $delOTP = mysqli_query($conn,"UPDATE otpstore SET is_expired = 1 WHERE otp = '" . $_SESSION['otp'] . "'");
    $email = $_SESSION['user_email'];
	$result = mysqli_query($conn,"SELECT * FROM registered_user WHERE user_email='$email'");
	$count = mysqli_num_rows($result);
	if($count>0) {
		// generate OTP
		function random_code($length_of_string)
		{
			$str_result = '0123456789abcdefghizklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			return substr(str_shuffle($str_result), 0, $length_of_string);
		}
		$otp = random_code(6);
		// Send OTP
		require_once("mail_function.php");
		$sendmail = sendOTP($email,$otp);
		 $sendmail = 1; 
		if($sendmail == 1) {
			$result = mysqli_query($conn,"INSERT INTO otpstore(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$current_id = mysqli_insert_id($conn);
			if(!empty($current_id)) {
				$info = "A verification code is sent to your email - $email";
				$_SESSION['info'] = $info;
                $_SESSION['user_email'] = $email;
                $_SESSION['otp'] = $otp;
				$goto=1;
			}
		}
	}
	else
	{
		$error_message = "<label class='text-danger'>There is error in mail!!!</label>";	
	}
}

 //if user click submit password button
    if(isset($_POST['submit_password'])){
        $email = $_SESSION['user_email'];
        $password = $_POST['user_password'];
        $check_email = "SELECT * FROM registered_user WHERE user_email = '$email'";
        $res = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['user_password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['user_email'] = $email;
                $status = $fetch['user_sendmail'];
                $goto = 3;
            }else{
            	$goto = 2;
            	$error_message = "<label class='text-danger'>*Password doesnt match!!! Please try again</label>";
            }
        }else{
        	$goto = 2;
        	$error_message = "<label class='text-danger'>Email does not exist(0)</label>";
        }
    }


//forget password

if(isset($_POST["password_register"]))
{
	$user_email = $_SESSION['user_email'];

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

	if($error_user_password == '' && $error_confirm_password == '')
	{
		$query = "UPDATE registered_user SET user_password = '$user_password' WHERE user_email = '$user_email'";
		$result = mysqli_query($conn, $query);
		$message = '<label class="text-danger">Password changed</label>';
	}
}


?>

