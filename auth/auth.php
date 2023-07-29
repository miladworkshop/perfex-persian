<?php
defined('BASEPATH') or exit('No direct script access allowed');


$auth_alert 	= "";
$auth_method 	= false;
$auth_method 	= ($auth_method == false && isset($data->uri->segments[3]) && !empty($data->uri->segments[3]) && strtolower($data->uri->segments[3]) == "otp") 		? "otp" 								: false;
$auth_method 	= ($auth_method == false && isset($data->uri->segments[3]) && !empty($data->uri->segments[3]) && strtolower($data->uri->segments[3]) == "logout") 	? "logout" 								: $auth_method;
$auth_method 	= ($auth_method == false &&isset($data->uri->segments[2]) && !empty($data->uri->segments[2])) 														? strtolower($data->uri->segments[2]) 	: $auth_method;
$auth_method 	= ($auth_method == false) 																															? "login" 								: $auth_method;

if ($auth_method == "logout")
{
	$data->load->model('authentication_model');
	$data->authentication_model->logout(false);
	hooks()->do_action('after_client_logout');
	redirect(site_url('authentication/login'));
	exit;
} else {
	if (is_client_logged_in())
	{
		redirect(site_url());
		exit;
	}

	switch ($auth_method)
	{
		case "otp":
			require_once("otp.php");
			break;
		case "register":
			require_once("register.php");
			break;
		default:
			require_once("login.php");
	}
}
?>