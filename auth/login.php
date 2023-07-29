<?php
defined('BASEPATH') or exit('No direct script access allowed');

$auth = $data->input->post("auth");

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
					redirect(base_url("authentication/login/otp/{$otp_key}"));
					exit;
				} else {
					$auth_alert = "<div class='alert alert-danger'>خطا در ارسال کد تایید</div>";
				}
			} else {
				$auth_alert = "<div class='alert alert-danger'>خطا در ثبت اطلاعات</div>";
			}
		} else {
			redirect(base_url("authentication/register"));
			exit;
		}
	} else {
		$auth_alert = "<div class='alert alert-danger'>شماره وارد شده معتبر نیست</div>";
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
					<a href="<?php echo base_url('authentication/login'); ?>">ورود / ثبت نام</a>
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
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<script src="<?php echo module_dir_url('persian', 'assets/js/jquery.min.js'); ?>"></script>
		<script src="<?php echo module_dir_url('persian', 'assets/js/bootstrap.min.js'); ?>"></script>
	</body>
</html>