<?php
defined('BASEPATH') or exit('No direct script access allowed');

$rest 					= false;
$rest_data 				= array();
$rest_data['status'] 	= 'error';
$rest_data['method'] 	= 'register';
$rest_data['message'] 	= 'وضعیت نامشخص';

$auth = $data->input->post("auth");
$auth = (isset($auth) && !empty($auth) && $auth != "") ? $auth : false;

if ($auth == false)
{
	$auth = $data->input->get("auth");
	$auth = (isset($auth) && !empty($auth) && $auth != "") ? $auth : false;

	$rest = ($auth == false) ? false : true;
}

if (isset($auth) && $auth != false)
{
	$mobile = persian_valid_mobile($auth);
	
	if($mobile != false)
	{
		$user = $data->db->select(array('id', 'userid'))->where('phonenumber', $mobile)->get(db_prefix() .'contacts')->row();

		if (isset($user->id) && $user->id > 0)
		{
			$otptime = time();
			$otpcode = rand(13579,97531);
			$otp_key = strtoupper(uniqid());

			$otp_data = array(
				'client' 	=> $user->userid,
				'contact' 	=> $user->id,
				'mobile' 	=> $mobile,
				'code' 		=> $otpcode,
				'key' 		=> $otp_key,
				'time' 		=> $otptime,
				'ip' 		=> $data->input->ip_address(),
				'broken' 	=> 0
			);

			$otp_message = "« ". get_option('companyname') ." »\n\nکد تایید : {$otpcode}";

			if ($data->db->insert(db_prefix() .'persian_otp', $otp_data) == true)
			{
				if (persian_send_sms($mobile, $otp_message) == true)
				{
					if ($rest == true)
					{
						$rest_data['status'] 	= 'success';
						$rest_data['method'] 	= 'login';
						$rest_data['message'] 	= base_url("authentication/login/otp/{$otp_key}");
					} else {
						redirect(base_url("authentication/login/otp/{$otp_key}"));
						exit;
					}
				} else {
					if ($rest == true)
					{
						$rest_data['status'] 	= 'error';
						$rest_data['message'] 	= "خطا در ارسال کد تایید";
					} else {
						$auth_alert = "خطا در ارسال کد تایید";
					}
				}
			} else {
				if ($rest == true)
				{
					$rest_data['status'] 	= 'error';
					$rest_data['message'] 	= "خطا در ثبت اطلاعات";
				} else {
					$auth_alert = "خطا در ثبت اطلاعات";
				}
			}
		} else {
			if ($rest == true)
			{
				$rest_data['status'] 	= 'success';
				$rest_data['message'] 	= base_url("authentication/register");
			} else {
				redirect(base_url("authentication/register"));
				exit;
			}
		}
	} else {
		if ($rest == true)
		{
			$rest_data['status'] 	= 'error';
			$rest_data['message'] 	= "شماره وارد شده معتبر نیست";
		} else {
			$auth_alert = "شماره وارد شده معتبر نیست";
		}
	}

	if (isset($rest) && $rest == true)
	{
		header('Content-Type: application/json');
		echo json_encode($rest_data);
		exit;
	} else {
		$auth_alert = (isset($auth_alert) && !empty($auth_alert) && $auth_alert != "") ? "<div class='alert alert-danger'>{$auth_alert}</div>" : "";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="www.miladworkshop.ir">
		<title><?php echo get_option('companyname'); ?></title>
		<link href="<?php echo module_dir_url('persian', 'assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo module_dir_url('persian', 'assets/css/auth.css'); ?>" rel="stylesheet">
	</head>
	<body style="background-color: #BDD1E7;">
		<div class="app app-auth-sign-up login-1 align-content-stretch d-flex flex-wrap justify-content-end">
			<div class="app-auth-background"></div>
			<div class="app-auth-container">
				<div class="logo">
					<a href="<?php echo base_url('authentication/login'); ?>">ورود</a>
				</div>
				<div class="divider"></div>

				<?php echo $auth_alert; ?>

				<?php echo form_open($data->uri->uri_string(), ['class' => 'login-form']); ?>
					<div class="auth-credentials m-b-xxl">
						<label for="auth" class="form-label">شماره موبایل</label>
						<input type="text" class="form-control dir-rtl" name="auth" id="auth" aria-describedby="auth" placeholder="شماره موبایل خود را وارد کنید" dir="ltr" value="<?php echo $auth; ?>" required>
						<div class="desc">کاربر گرامی, به منظور ثبت نام یا ورود به سیستم لطفاً شماره موبایل خود را وارد کنید, کد یکبار مصرف ورود به سیستم از طریق پیامک برای شما ارسال خواهد شد.</div>
					</div>
					<div class="auth-submit d-grid gap-2">
						<button type="submit" class="btn btn-primary btn-lg">ورود</button>
						<a href="<?php echo base_url('authentication/register'); ?>">ثبت نام و ایجاد اکانت جدید</a>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<script src="<?php echo module_dir_url('persian', 'assets/js/jquery.min.js'); ?>"></script>
		<script src="<?php echo module_dir_url('persian', 'assets/js/bootstrap.min.js'); ?>"></script>
	</body>
</html>