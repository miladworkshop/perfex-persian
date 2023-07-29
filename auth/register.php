<?php
defined('BASEPATH') or exit('No direct script access allowed');

$password 	= strtoupper(md5(uniqid()));
$mobile 	= $data->input->post("mobile");
$firstname 	= $data->input->post("firstname");
$lastname 	= $data->input->post("lastname");
$usertype 	= $data->input->post("usertype");
$company 	= $data->input->post("company");

if (isset($mobile) && $mobile != false)
{
	$mobile = persian_valid_mobile($mobile);

	if($mobile != false)
	{
		$user = $data->db->select(array('id'))->where('phonenumber', $mobile)->get(db_prefix() .'contacts');

		if ($user->num_rows() == 0)
		{
			$clientid = $data->clients_model->add([
				'billing_street'      => '',
				'billing_city'        => '',
				'billing_state'       => '',
				'billing_zip'         => '',
				'billing_country'     => 104,
				'firstname'           => $firstname,
				'lastname'            => $lastname,
				'email'               => '',
				'contact_phonenumber' => $mobile,
				'website'             => '',
				'title'               => '',
				'password'            => $password,
				'company'             => $company,
				'vat'                 => '',
				'phonenumber'         => $mobile,
				'country'             => 104,
				'city'                => '',
				'address'             => '',
				'zip'                 => '',
				'state'               => '',
				'custom_fields'       => [],
				'default_language'    => 'persian',
			], true);

			if ($clientid > 0)
			{
				$user = $data->db->select(array('id'))->where('phonenumber', $mobile)->get(db_prefix() .'contacts')->row();

				if (isset($user->id) && $user->id > 0)
				{
					$otptime = time();
					$otpcode = rand(13579,97531);
					$otp_key = strtoupper(uniqid());

					$otp_data = array(
						'client' 	=> $clientid,
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
					$auth_alert = "<div class='alert alert-danger'>خطا در ایجاد کاربر</div>";
				}
			} else {
				$auth_alert = "<div class='alert alert-danger'>خطا در ایجاد اکانت</div>";
			}
		} else {
			$auth_alert = "<div class='alert alert-danger'>شماره وارد شده قبلاً ثبت شده است</div>";
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
					<a href="<?php echo base_url('authentication/login'); ?>">ثبت نام</a>
				</div>
				<div class="divider"></div>

				<?php echo $auth_alert; ?>

				<?php echo form_open($data->uri->uri_string(), ['class' => 'login-form']); ?>
					<div class="row">
						<div class="auth-credentials m-b-xxl col-12">
							<label for="usertype" class="form-label">نوع اکانت</label>
							<select class="form-control dir-rtl" name="usertype" id="usertype" dir="rtl" onchange="usercompany(this)" required>
								<option value="1"<?php if(isset($usertype) && $usertype == "1") { echo "selected"; } ?>>حقیقی</option>
								<option value="2"<?php if(isset($usertype) && $usertype == "2") { echo "selected"; } ?>>حقوقی</option>
							</select>
						</div>
						<div class="auth-credentials m-b-xxl col-12">
							<label for="mobile" class="form-label">شماره موبایل</label>
							<input type="text" class="form-control dir-rtl" name="mobile" id="mobile" placeholder="شماره موبایل خود را وارد کنید" dir="ltr" value="<?php echo $mobile; ?>" required>
						</div>
						<div class="auth-credentials m-b-xxl col-md-6">
							<label for="firstname" class="form-label">نام</label>
							<input type="text" class="form-control dir-rtl" name="firstname" id="firstname" placeholder="نام خود را وارد کنید" dir="rtl" value="<?php echo $firstname; ?>" required>
						</div>
						<div class="auth-credentials m-b-xxl col-md-6">
							<label for="lastname" class="form-label">نام خانوادگی</label>
							<input type="text" class="form-control dir-rtl" name="lastname" id="lastname" placeholder="نام خانوادگی خود را وارد کنید" dir="rtl" value="<?php echo $lastname; ?>" required>
						</div>
						<div class="auth-credentials m-b-xxl col-12" id="usercompany" style="<?php if($usertype != "2") { echo "display:none;"; } ?>">
							<label for="company" class="form-label">نام شرکت</label>
							<input type="text" class="form-control dir-rtl" name="company" id="company" placeholder="نام شرکت خود را وارد کنید" dir="rtl" value="<?php echo $company; ?>">
						</div>

						<div class="auth-submit d-grid gap-2">
							<button type="submit" class="btn btn-primary btn-lg">ثبت نام</button>
						</div>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<script>
		function usercompany(element)
		{
			if (element.value == 2)
			{
				document.getElementById("usercompany").style.display = "block";
			} else {
				document.getElementById("usercompany").style.display = "none";
			}
		}
		</script>
		<script src="<?php echo module_dir_url('persian', 'assets/js/jquery.min.js'); ?>"></script>
		<script src="<?php echo module_dir_url('persian', 'assets/js/bootstrap.min.js'); ?>"></script>
	</body>
</html>