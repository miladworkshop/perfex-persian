<?php
defined('BASEPATH') or exit('No direct script access allowed');

$code 	= $data->input->post("code");
$key 	= (isset($data->uri->segments[4]) && strlen($data->uri->segments[4]) == 13) ? strtoupper($data->uri->segments[4]) : false;

if ($key != false)
{
	$otp = $data->db->select(array('client', 'contact', 'code', 'mobile', 'broken'))->where('key', $key)->get(db_prefix() .'persian_otp')->row();

	if (isset($otp) && !empty($otp) && $otp != NULL)
	{
		if (isset($code) && $code != false)
		{
			if ($otp->broken == 0)
			{
				if ($code == $otp->code)
				{
					$data->db->where('key', $key);
					$data->db->update(db_prefix() .'persian_otp', array('broken' => '1'));

					$data->db->where('id', $otp->contact);
					$data->db->update(db_prefix() .'contacts', array('last_ip' => $data->input->ip_address(), 'last_login' => date('Y-m-d H:i:s')));

					log_activity('User Successfully Logged In [User Id: ' . $otp->client . ', Mobile: '. $otp->mobile .', Is Staff Member: No, IP: ' . $data->input->ip_address() . ']');

					$user_data = [
						'client_user_id'   => $otp->client,
						'contact_user_id'  => $otp->contact,
						'client_logged_in' => true,
					];

					$data->session->set_userdata($user_data);

					redirect(base_url());
					exit;
				} else {
					$auth_alert = "<div class='alert alert-danger'>کد وارد شده معتبر نیست</div>";
				}
			} else {
				redirect(base_url("authentication/login"));
				exit;
			}
		}
	} else {
		redirect(base_url("authentication/login"));
		exit;
	}
} else {
	redirect(base_url("authentication/login"));
	exit;
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
					<a href="">کد تایید را وارد کنید</a>
				</div>
				<div class="divider"></div>

				<?php echo $auth_alert; ?>

				<?php echo form_open($data->uri->uri_string(), ['class' => 'login-form']); ?>
					<div class="auth-credentials m-b-xxl">
						<label for="code" class="form-label">کد تایید</label>
						<input type="number" class="form-control dir-rtl" name="code" id="code" aria-describedby="auth" placeholder="کد تایید دریافت شده را وارد کنید" dir="ltr" value="<?php echo $code; ?>" required>
						<div class="desc">کاربر گرامی, کد تایید به شماره <b><?php echo $otp->mobile; ?></b> ارسال شد, لطفاً کد دریافت شده را وارد کنید.</div>
					</div>
					<div class="auth-submit d-grid gap-2">
						<button type="submit" class="btn btn-primary btn-lg">ورود</button>
						<a href="<?php echo base_url('authentication/login'); ?>">بازگشت به صفحه ورود</a>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<script src="<?php echo module_dir_url('persian', 'assets/js/jquery.min.js'); ?>"></script>
		<script src="<?php echo module_dir_url('persian', 'assets/js/bootstrap.min.js'); ?>"></script>
	</body>
</html>