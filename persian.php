<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
	Module Name: توسعه پارسی
	Description: بهینه سازی زبان پارسی و شمسی سازی سیستم
	Author: میلاد مالدار
	Author URI: https://miladworkshop.ir
	Version: 1.0.0
	Requires at least: 2.3.*
*/

$CI = &get_instance();

$CI->load->helper('persian/persian');

if (get_option('persian_lang') == 'Y')
{
	register_language_files('persian', ['persian']);
}

if (get_option('persian_style') == 'Y')
{
	hooks()->add_action('app_admin_head', 'persian_theme_style_persian_header');
	hooks()->add_action('app_admin_authentication_head', 'persian_theme_style_persian_header');
	hooks()->add_action('app_customers_head', 'persian_theme_style_persian_header');

	hooks()->add_action('app_admin_footer', 'persian_theme_style_persian_footer');
	hooks()->add_action('app_customers_footer', 'persian_theme_style_persian_footer');
}

if (get_option('persian_date') == 'Y')
{
	hooks()->add_filter('after_format_date', 'persian_after_format_date');
	hooks()->add_filter('after_format_datetime', 'persian_after_format_datetime');
	hooks()->add_filter('before_sql_date_format', 'persian_before_sql_date_format');
	
	hooks()->add_action('app_admin_head', 'persian_date_header');
	hooks()->add_action('app_admin_authentication_head', 'persian_date_header');
	hooks()->add_action('app_customers_head', 'persian_date_header');
	
	hooks()->add_action('app_admin_footer', 'persian_date_footer');
	hooks()->add_action('app_customers_footer', 'persian_date_footer');
}

if (get_option('persian_verify_email') == 'Y')
{
	hooks()->add_action('after_client_register', 'persian_after_client_register');
}

hooks()->add_filter('module_persian_action_links', 'module_persian_action_links');
hooks()->add_action('admin_init', 'persian_init_menu_items');

function persian_init_menu_items()
{
    if (is_admin())
	{
        $CI = &get_instance();
        /**
         * If the logged in user is administrator, add custom menu in Setup
         */
        $CI->app_menu->add_setup_menu_item('persian', [
            'href'     => admin_url('persian'),
            'name'     => "تنظیمات ماژول توسعه پارسی",
            'position' => 9999,
        ]);
    }
}

function module_persian_action_links($actions)
{
    $actions[] = '<a href="' . admin_url('persian') . '">' . _l('settings') . '</a>';

    return $actions;
}

function persian_after_format_date($date, $time = false)
{
	$timestamp 		= new DateTime($date);
	$timestamp 		= $timestamp->format('U');

	$date_format 	= (get_option('persian_date_format') == "YYYY/MM/DD") ? "Y/m/d" : "Y-m-d";
	$date_format 	= (isset($time) && $time == true) ? "{$date_format} H:i" : $date_format;

	$return_date 	= (isset($timestamp) && $timestamp > 1600000000) ? jdate($date_format, $timestamp) : $date;
	$return_date 	= (get_option('persian_number') == 'FA') ? persian_fa($return_date) : persian_en($return_date);

	return $return_date;
}

function persian_after_format_datetime($date)
{
	return persian_after_format_date($date, true);
}

function persian_before_sql_date_format($date)
{
	$date 	= str_replace("/", "-", $date);
	$date 	= persian_en($date);
	$date 	= explode("-", $date);

	if ($date[0] > 1379 && $date[0] < 1999)
	{
		$gdate 	= jalali_to_gregorian($date[0], $date[1], $date[2]);

		$gdate[1] = ($gdate[1] > 9) ? $gdate[1] : "0{$gdate[1]}";
		$gdate[2] = ($gdate[2] > 9) ? $gdate[2] : "0{$gdate[2]}";
		
		$date = "{$gdate[0]}-{$gdate[1]}-{$gdate[2]}";
	} else {
		$date = "{$date[0]}-{$date[1]}-{$date[2]}";
	}

	return $date;
}

function persian_after_client_register($clientid)
{
	$CI = &get_instance();

	$CI->db->where('id', $clientid);

	$CI->db->update(db_prefix() . 'contacts',
	[
		'email_verified_at' => date("Y-m-d H:i:s"),
	]);
}

function persian_theme_style_persian_header()
{
	echo '<link href="'. module_dir_url('persian', 'assets/css/persian.css') .'"  rel="stylesheet" type="text/css" />';
}

function persian_theme_style_persian_footer()
{
	echo '<script src="'. module_dir_url('persian', 'assets/js/persian.js') .'"></script>';
}

function persian_date_header()
{
	echo '<link href="'. module_dir_url('persian', 'assets/css/persian-datepicker.min.css') .'"  rel="stylesheet" type="text/css" />';
}

function persian_date_footer()
{
	echo '<script src="'. module_dir_url('persian', 'assets/js/persian-datepicker.min.js') .'"></script>';
}